# BhattiZinc static website

This project is a static website built with HTML, CSS and JavaScript. It has no PHP runtime, database or server-side page templates.

## Pages

- `index.html` is the home page.
- Company pages: `about.html`, `careers.html`, `contact.html`, `quality.html` and `trade.html`.
- `products/index.html` is the product catalog.
- Product detail pages are in `products/` and use `/products/<slug>` public URLs.
- Legal pages: `privacy-policy.html` and `terms-of-sale.html`.

Apache serves `index.html` at the site root. The `.htaccess` rules keep the existing extensionless public URLs and map them to the matching `.html` files. Previous `.php` page URLs redirect to their clean routes.

## Shared HTML components

- `assets/js/analytics.js` contains the single Google Analytics setup and is loaded from the `<head>` of each page. It exits before loading Google Analytics on localhost and loopback addresses.
- `assets/components/site-shell.html` contains the site loader, desktop header, and mobile navigation.
- `assets/components/footer.html` contains the shared footer.
- `assets/components/product-inquiry-form.html` contains the shared product enquiry form used by product detail pages. Each page supplies its own product name through the mount point.
- Each page includes `data-site-shell` and `data-site-footer` mount points. `assets/js/components.js` loads the shared fragments, fills the page-specific product name, selects the current page navigation state, and then signals `site:components-ready`.
- `assets/js/main.js` starts after the shared shell is ready. This keeps the HTML pages static and lets the header, footer, and loader be edited in one place.

The pages need to be served over HTTP for `fetch()` to load the shared fragments. Use the included Node.js preview server or an HTTP web host; opening an HTML file directly with `file://` will not load components.

## Assets and behavior

- `assets/css/` contains the existing stylesheets.
- `assets/js/main.js` handles site navigation and page interactions.
- `assets/js/contact-submit.js` validates the contact and career forms, then offers WhatsApp and email delivery.
- Images, videos, PDF lab reports, favicon files, `robots.txt` and `sitemap.xml` remain under their existing paths.

## Deployment

Upload the project files to an Apache document root with `mod_rewrite` enabled. Hosting without `.htaccess` support needs equivalent clean URL rewrites or links updated to use the `.html` filenames.

## Local preview

Run `node serve.mjs` from the project folder, then open `http://127.0.0.1:8090`. The local preview serves clean routes, redirects old flat product URLs, and maps product routes to their `.html` files. Set the `PORT` environment variable to select another port.
