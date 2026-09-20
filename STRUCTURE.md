# BhattiZinc sitemap

Production sitemap: https://bhattizinc.com/sitemap.xml

## Coverage

- Company and catalog: `/`, `/about`, `/products`, `/quality`, `/trade`, `/contact`, `/careers`.
- Legal: `/privacy-policy`, `/terms-of-sale`.
- Products: all 10 slugs in `includes/products-data.php`, each with its existing primary product image.
- Total: 19 unique page URLs and 10 image references (9 distinct image files).

## Conventions

The UTF-8 XML uses the Sitemaps 0.9 namespace and Google image extension. All URLs use the production HTTPS host, clean extensionless routes, and encoded image paths. Only the homepage has a trailing slash.

The sitemap excludes duplicate `/index`, `.php` URLs, query parameters, fragments, template files, verification files, internal tooling and standalone lab PDFs. Reports remain discoverable through their product pages.

`lastmod` is deliberately omitted: local file timestamps can reflect a checkout or deployment, not a substantive content change. Add it only when a reliable publication workflow records real content updates. `priority` and `changefreq` are omitted because Google ignores them.

No alternate-language annotations are included because this project contains only English pages. International audiences do not require invented country or language variants.

## Maintenance and deployment

1. Update `sitemap.xml` whenever a public route or catalog slug is added, removed or changed. Keep product-image URLs aligned with `includes/products-data.php`.
2. Deploy `sitemap.xml` and `robots.txt` to the production document root. No PHP or Apache rewrite changes are needed to serve these static files.
3. Confirm the sitemap and each listed URL return HTTP 200 on production, without redirects, noindex directives or authentication. Confirm each page canonical points to the corresponding sitemap URL; the current shared header does not emit canonical tags, so that remains a separate SEO follow-up.
4. Submit `https://bhattizinc.com/sitemap.xml` in Google Search Console and Bing Webmaster Tools. Submission and production deployment are not performed by this change.
5. Keep the existing root robots.txt rules when merging into a server with a different robots.txt. Robots directives are not access controls.

## Search and AI discovery

The sitemap helps participating search engines discover the same public pages used for search and AI-grounded answers. It does not guarantee indexing, rankings or AI citations, and there is no separate GEO sitemap protocol.

References: [Google sitemap guidance](https://developers.google.com/search/docs/crawling-indexing/sitemaps/build-sitemap), [Google image sitemaps](https://developers.google.com/search/docs/crawling-indexing/sitemaps/image-sitemaps), [Bing AI search discovery](https://blogs.bing.com/webmaster/July-2025/Keeping-Content-Discoverable-with-Sitemaps-in-AI-Powered-Search).
