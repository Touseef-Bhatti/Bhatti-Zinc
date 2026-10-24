import { createReadStream, existsSync, statSync } from 'node:fs';
import { createServer } from 'node:http';
import { extname, resolve, sep } from 'node:path';
import { fileURLToPath } from 'node:url';

const root = resolve(fileURLToPath(new URL('.', import.meta.url)));
const port = Number(process.env.PORT || 8090);
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
    try {
        pathname = decodeURIComponent(new URL(request.url, 'http://localhost').pathname);
    } catch {
        response.writeHead(400).end('Bad request');
        return;
    }

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
