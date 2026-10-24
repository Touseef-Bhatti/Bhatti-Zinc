# BhattiZinc static website

This project is a static website built with HTML, CSS and JavaScript. It has no PHP runtime, database or server-side page templates.

## Pages

- `index.html` is the home page.
- Company pages: `about.html`, `careers.html`, `contact.html`, `quality.html` and `trade.html`.
- Catalog page: `products.html`.
- Product detail pages are static HTML files named for each product slug.
- Legal pages: `privacy-policy.html` and `terms-of-sale.html`.

Apache serves `index.html` at the site root. The `.htaccess` rules keep the existing extensionless public URLs and map them to the matching `.html` files. Previous `.php` page URLs redirect to their clean routes.

## Assets and behavior

- `assets/css/` contains the existing stylesheets.
- `assets/js/main.js` handles site navigation and page interactions.
- `assets/js/contact-submit.js` validates the contact and career forms, then offers WhatsApp and email delivery.
- Images, videos, PDF lab reports, favicon files, `robots.txt` and `sitemap.xml` remain under their existing paths.

## Deployment

Upload the project files to an Apache document root with `mod_rewrite` enabled. Hosting without `.htaccess` support needs equivalent clean URL rewrites or links updated to use the `.html` filenames.

## Local preview

Run `node serve.mjs` from the project folder, then open `http://127.0.0.1:8090`. The local preview serves static files and maps clean page URLs to their `.html` files.
