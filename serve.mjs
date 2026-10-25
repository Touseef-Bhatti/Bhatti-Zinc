import { createReadStream, existsSync, statSync } from 'node:fs';
import { createServer } from 'node:http';
import { extname, resolve, sep } from 'node:path';
import { fileURLToPath } from 'node:url';

const root = resolve(fileURLToPath(new URL('.', import.meta.url)));
const port = Number(process.env.PORT || 8090);
const productSlugs = new Set([
    'apcd-zinc-ash-50-60', 'iranian-zinc-ingots', 'secondary-zinc-ingots',
    'shg-zinc-ingots', 'zinc-alloy-92-94', 'zinc-ash-65-70',
    'zinc-die-cast-scrap', 'zinc-dross-94-97', 'zinc-oxide-99-99',
    'zinc-skimming-30-40',
]);
const rootPages = new Set([
    'about', 'careers', 'contact', 'privacy-policy', 'quality', 'terms-of-sale', 'trade',
]);
const mimeTypes = {
    '.css': 'text/css; charset=utf-8',
    '.html': 'text/html; charset=utf-8',
    '.ico': 'image/x-icon',
    '.jpeg': 'image/jpeg',
    '.jpg': 'image/jpeg',
    '.js': 'text/javascript; charset=utf-8',
    '.json': 'application/json; charset=utf-8',
    '.mp4': 'video/mp4',
    '.pdf': 'application/pdf',
    '.png': 'image/png',
    '.svg': 'image/svg+xml',
    '.txt': 'text/plain; charset=utf-8',
    '.webmanifest': 'application/manifest+json',
    '.webp': 'image/webp',
    '.xml': 'application/xml; charset=utf-8',
};

const server = createServer((request, response) => {
    let pathname;
    let requestUrl;
    try {
        requestUrl = new URL(request.url, 'http://localhost');
        pathname = decodeURIComponent(requestUrl.pathname);
    } catch {
        response.writeHead(400).end('Bad request');
        return;
    }

    const redirect = (location) => {
        response.writeHead(301, { Location: location + requestUrl.search });
        response.end();
    };
    if (pathname === '/products') return redirect('/products/');
    if (pathname === '/products.html') return redirect('/products/');
    if (pathname === '/index' || pathname === '/index.html') return redirect('/');

    if (pathname === '/product.php') {
        const slug = requestUrl.searchParams.get('p');
        if (productSlugs.has(slug)) return redirect(`/products/${slug}`);
    }
    if (/^\/(products\/)?[a-z0-9-]+\.php$/i.test(pathname)) {
        const slug = pathname.split('/').pop().replace(/\.php$/i, '');
        if (productSlugs.has(slug)) return redirect(`/products/${slug}`);
        if (rootPages.has(slug)) return redirect(`/${slug}`);
    }

    const oldProduct = pathname.match(/^\/([a-z0-9-]+)(?:\.html)?$/i);
    if (oldProduct && productSlugs.has(oldProduct[1])) {
        return redirect(`/products/${oldProduct[1]}`);
    }
    const productHtml = pathname.match(/^\/products\/([a-z0-9-]+)\.html$/i);
    if (productHtml && productSlugs.has(productHtml[1])) {
        return redirect(`/products/${productHtml[1]}`);
    }
    if (pathname === '/products/index.html') return redirect('/products/');
    const rootHtml = pathname.match(/^\/([a-z0-9-]+)\.html$/i);
    if (rootHtml && rootPages.has(rootHtml[1])) return redirect(`/${rootHtml[1]}`);

    let file = resolve(root, `.${pathname}`);
    if (file !== root && !file.startsWith(root + sep)) {
        response.writeHead(403).end('Forbidden');
        return;
    }

    if (pathname.endsWith('/')) file = resolve(file, 'index.html');
    if (!existsSync(file) && !extname(file) && existsSync(`${file}.html`)) file += '.html';

    if (!existsSync(file) || !statSync(file).isFile()) {
        response.writeHead(404, { 'Content-Type': 'text/plain; charset=utf-8' }).end('Not found');
        return;
    }

    response.writeHead(200, {
        'Content-Type': mimeTypes[extname(file).toLowerCase()] || 'application/octet-stream',
        'X-Content-Type-Options': 'nosniff',
    });
    if (request.method === 'HEAD') response.end();
    else createReadStream(file).pipe(response);
});

server.listen(port, '127.0.0.1', () => {
    console.log(`BhattiZinc static preview: http://127.0.0.1:${port}`);
    console.log('Press Ctrl+C to stop.');
});
