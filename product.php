<?php
require_once 'includes/products-data.php';

$slug = isset($_GET['p']) ? trim($_GET['p']) : '';
$product = getProductBySlug($slug, $products);

if (!$product) {
    header('Location: products.php');
    exit;
}

$page_title = $product['name'];
$meta_description = $product['meta_description'] ?? $product['description'];
$meta_keywords = isset($product['seo_keywords']) ? implode(', ', $product['seo_keywords']) : 'zinc products, zinc supplier, zinc manufacturer Pakistan';
$heroSeo = $product['hero_seo'] ?? [
    'title' => $product['name'],
    'body' => $product['long_desc'],
    'highlights' => $product['applications'],
];
$seoBlog = $product['seo_blog'] ?? null;
$labReportFile = trim($product['lab_report_image'] ?? $product['lab_report_pdf'] ?? '');

// Get related products: prefer same category, then fill with random others — limit to 3
$relatedSame = array_values(array_filter($products, function($p) use ($product) {
    return $p['category'] === $product['category'] && $p['id'] !== $product['id'];
}));

$relatedOther = array_values(array_filter($products, function($p) use ($product) {
    return $p['id'] !== $product['id'] && $p['category'] !== $product['category'];
}));

// Shuffle pools for randomness
if (!empty($relatedSame)) shuffle($relatedSame);
if (!empty($relatedOther)) shuffle($relatedOther);

$related = [];
if (count($relatedSame) >= 3) {
    $related = array_slice($relatedSame, 0, 3);
} else {
    $related = $relatedSame;
    $needed = 3 - count($related);
    if ($needed > 0) {
        $related = array_merge($related, array_slice($relatedOther, 0, $needed));
    }
}

include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero product-page-hero" style="padding-bottom:48px;">
    <div class="container">
        <div class="page-hero-inner">
            <div class="page-hero-breadcrumb">
                <a href="index" class="breadcrumb-item">Home</a>
                <span class="breadcrumb-sep">/</span>
                <a href="products" class="breadcrumb-item">Products</a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-item current"><?php echo htmlspecialchars($product['name']); ?></span>
            </div>
            <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
                <div class="product-detail-cat" style="color:var(--gold-light);margin-bottom:0;"><?php echo htmlspecialchars($product['category']); ?></div>
                <span style="color:rgba(255,255,255,.15);">|</span>
                <div style="font-family:var(--font-label);font-size:.65rem;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.3);"><?php echo htmlspecialchars($product['standard']); ?></div>
            </div>
            <div class="product-hero-copy reveal">
                <h1><?php echo htmlspecialchars($heroSeo['title']); ?></h1>
                <p class="product-hero-type" data-typewriter-text="<?php echo htmlspecialchars($heroSeo['body']); ?>"><?php echo htmlspecialchars($heroSeo['body']); ?></p>
                <?php if (!empty($heroSeo['highlights'])): ?>
                <div class="product-hero-keywords">
                    <?php foreach(array_slice($heroSeo['highlights'], 0, 4) as $highlight): ?>
                    <span><?php echo htmlspecialchars($highlight); ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- PRODUCT DETAIL -->
<section class="product-detail">
    <div class="container">
        <div class="product-detail-grid">

            <!-- Media Column -->
            <div class="product-detail-media reveal">
                <div class="product-main-image" style="transition:all .3s ease;">
                    <?php if(file_exists($product['image'])): ?>
                    <img id="main-product-img" src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <?php else: ?>
                    <div class="product-placeholder" data-abbr="<?php echo htmlspecialchars(strtoupper(substr(str_replace(' ','',$product['short_name']),0,3))); ?>" style="width:100%;height:100%;aspect-ratio:4/3;"></div>
                    <?php endif; ?>
                </div>
                <div class="product-thumbnails">
                    <div class="product-thumb active" title="Main View">
                        <div style="width:100%;height:100%;background:var(--surface);display:flex;align-items:center;justify-content:center;">
                            <span style="font-family:var(--font-label);font-size:.6rem;color:var(--text-xs);">01</span>
                        </div>
                    </div>
                    <div class="product-thumb" title="Detail View">
                        <div style="width:100%;height:100%;background:var(--warm-white);display:flex;align-items:center;justify-content:center;">
                            <span style="font-family:var(--font-label);font-size:.6rem;color:var(--text-xs);">02</span>
                        </div>
                    </div>
                    <div class="product-thumb" title="Packaging">
                        <div style="width:100%;height:100%;background:var(--cream);display:flex;align-items:center;justify-content:center;">
                            <span style="font-family:var(--font-label);font-size:.6rem;color:var(--text-xs);">03</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Facts Panel -->
                <div style="margin-top:24px;background:var(--cream);border:1px solid var(--border);border-radius:var(--radius-lg);padding:28px;">
                    <div class="label" style="margin-bottom:20px;color:var(--text-xs);">At a Glance</div>
                    <table style="width:100%;border-collapse:collapse;">
                        <tr style="border-bottom:1px solid var(--border-light);">
                            <td style="padding:10px 0;font-family:var(--font-label);font-size:.65rem;letter-spacing:.08em;text-transform:uppercase;color:var(--text-xs);">Form</td>
                            <td style="padding:10px 0;font-size:.85rem;color:var(--text);text-align:right;font-weight:500;"><?php echo htmlspecialchars($product['form']); ?></td>
                        </tr>
                        <tr style="border-bottom:1px solid var(--border-light);">
                            <td style="padding:10px 0;font-family:var(--font-label);font-size:.65rem;letter-spacing:.08em;text-transform:uppercase;color:var(--text-xs);">Purity</td>
                            <td style="padding:10px 0;font-size:.85rem;color:var(--gold-dark);text-align:right;font-weight:600;font-family:var(--font-label);"><?php echo htmlspecialchars($product['purity']); ?></td>
                        </tr>
                        <tr style="border-bottom:1px solid var(--border-light);">
                            <td style="padding:10px 0;font-family:var(--font-label);font-size:.65rem;letter-spacing:.08em;text-transform:uppercase;color:var(--text-xs);">Standard</td>
                            <td style="padding:10px 0;font-size:.85rem;color:var(--text);text-align:right;"><?php echo htmlspecialchars($product['standard']); ?></td>
                        </tr>
                        <tr>
                            <td style="padding:10px 0 0;font-family:var(--font-label);font-size:.65rem;letter-spacing:.08em;text-transform:uppercase;color:var(--text-xs);">Packaging</td>
                            <td style="padding:10px 0 0;font-size:.82rem;color:var(--text-mid);text-align:right;line-height:1.5;"><?php echo htmlspecialchars($product['packaging']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Info Column -->
            <div class="product-detail-info reveal reveal-delay-1">
                <div class="product-detail-cat"><?php echo htmlspecialchars($product['category']); ?></div>
                <h1 class="product-detail-name"><?php echo htmlspecialchars($product['name']); ?></h1>
                <div class="product-detail-tagline"><?php echo htmlspecialchars($product['tagline']); ?></div>


                <p class="product-detail-desc"><?php echo htmlspecialchars($product['long_desc']); ?></p>

                <!-- Certifications -->
                <div class="product-certs">
                    <?php foreach($product['certificates'] as $cert): ?>
                    <span class="product-cert-badge"><?php echo htmlspecialchars($cert); ?></span>
                    <?php endforeach; ?>
                </div>

                <!-- Applications -->
                <div style="margin-bottom:32px;">
                    <div class="label" style="margin-bottom:16px;color:var(--text-xs);">Key Applications</div>
                    <div style="display:flex;flex-wrap:wrap;gap:8px;">
                        <?php foreach($product['applications'] as $app): ?>
                        <span style="font-family:var(--font-label);font-size:.68rem;font-weight:500;letter-spacing:.08em;text-transform:uppercase;padding:7px 14px;background:var(--cream);border:1px solid var(--border-light);border-radius:100px;color:var(--text-mid);"><?php echo htmlspecialchars($app); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                    <div class="product-actions">
                    <a href="contact.php?product=<?php echo urlencode($product['name']); ?>" class="btn btn--luxury-solid">Request a Quote</a>
                    <button type="button" class="btn btn--product-report" data-lab-report-open>View Lab Report</button>
                    <a href="contact.php?product=<?php echo urlencode($product['name']); ?>&type=sample" class="btn btn--product-sample">Request Sample</a>
                    <a href="trade.php" class="btn btn--product-trade">Trade &amp; Shipping</a>
                </div>

                <!-- Trade Notice -->
                <div style="margin-top:24px;padding:16px 20px;background:var(--gold-pale);border-radius:var(--radius);border-left:3px solid var(--gold);">
                    <p style="font-size:.8rem;color:var(--gold-dark);line-height:1.65;"><strong>Minimum Order:</strong> Quantities and lead times vary by destination. Contact our export team for current availability, pricing, and MOQ details.</p>
                </div>
            </div>
        </div>

        <!-- Specifications & Applications -->
        <div class="product-specs-section reveal">
            <h3 style="margin-bottom:8px;font-size:2rem;font-weight:400;">Technical Specifications</h3>
            <p style="font-size:.88rem;color:var(--text-mid);margin-bottom:0;">Typical values based on production standards. Certificate of Analysis provided with each shipment.</p>

            <div class="specs-grid">
                <!-- Chemical Composition Table -->
                <div>
                    <div class="label" style="margin-bottom:20px;color:var(--text-xs);">Chemical Composition</div>
                    <table class="specs-table">
                        <thead>
                            <tr>
                                <th>Element / Parameter</th>
                                <th style="text-align:right;">Specification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($product['specs'] as $param=>$value): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($param); ?></td>
                                <td><?php echo htmlspecialchars($value); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Applications List -->
                <div>
                    <div class="label" style="margin-bottom:20px;color:var(--text-xs);">Industry Applications</div>
                    <ul class="applications-list">
                        <?php foreach($product['applications'] as $app): ?>
                        <li><?php echo htmlspecialchars($app); ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <div style="margin-top:32px;padding:24px;background:var(--cream);border-radius:var(--radius);border:1px solid var(--border-light);">
                        <div class="label" style="margin-bottom:12px;color:var(--text-xs);">Packaging &amp; Container Details</div>
                        <p style="font-size:.85rem;color:var(--text-mid);line-height:1.7;"><?php echo htmlspecialchars($product['packaging']); ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- INQUIRY FORM -->
<section class="inquiry-section" id="inquiry">
    <div class="container">
        <div class="inquiry-grid">
            <div class="inquiry-info reveal">
                <div class="eyebrow"><span class="label">Product Inquiry</span></div>
                <h3>Request Pricing<br>or Sample</h3>
                <p>Complete the form to receive a quotation, technical datasheet, or product sample for <?php echo htmlspecialchars($product['name']); ?>. Our export team responds within one business day.</p>
                <div class="inquiry-contact-list">
                    <div class="inquiry-contact-item">
                        <div class="inquiry-contact-icon">
                            <svg viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <div class="inquiry-contact-item-label">Email</div>
                            <a href="mailto:export@bhattizinc.com" class="inquiry-contact-item-text">export@bhattizinc.com</a>
                        </div>
                    </div>
                    <div class="inquiry-contact-item">
                        <div class="inquiry-contact-icon">
                            <svg viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <div class="inquiry-contact-item-label">Export Desk</div>
                            <a href="tel:+923094530100" class="inquiry-contact-item-text">+92 309 4530100</a>
                        </div>
                    </div>
                    <div class="inquiry-contact-item">
                        <div class="inquiry-contact-icon">
                            <svg viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <div class="inquiry-contact-item-label">Response Time</div>
                            <span class="inquiry-contact-item-text">Within 1 Business Day</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-card reveal reveal-delay-1">
                <form method="POST" action="contact.php" data-validate id="contact-form">
                    <input type="hidden" name="product" value="<?php echo htmlspecialchars($product['name']); ?>">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="name">Full Name <span style="color:var(--gold)">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="company">Company Name <span style="color:var(--gold)">*</span></label>
                            <input type="text" id="company" name="company" class="form-control" placeholder="Your company" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="email">Email Address <span style="color:var(--gold)">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="email@company.com" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone">Phone / WhatsApp</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="+1 234 567 8900">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="country">Country <span style="color:var(--gold)">*</span></label>
                            <input type="text" id="country" name="country" class="form-control" placeholder="Your country" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="inquiry-type">Request Type</label>
                            <select id="inquiry-type" name="inquiry_type" class="form-control">
                                <option value="quote">Price Quotation</option>
                                <option value="sample">Sample Request</option>
                                <option value="spec">Technical Specification</option>
                                <option value="general">General Inquiry</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="quantity">Estimated Quantity</label>
                        <input type="text" id="quantity" name="quantity" class="form-control" placeholder="e.g. 20 MT / month, 1 x 20ft FCL">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="message">Message / Requirements</label>
                        <textarea id="message" name="message" class="form-control" rows="4" placeholder="Describe your requirements, destination port, preferred Incoterms, or any technical questions..."></textarea>
                    </div>
                    <div class="form-submit-row">
                        <span class="form-disclaimer">Your information is kept confidential and used only to respond to your inquiry.</span>
                        <button type="submit" class="btn btn--gold">Send Inquiry</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- RELATED PRODUCTS -->
<?php if (!empty($related)): ?>
<section style="padding:80px 0 120px;background:var(--white);">
    <div class="container">
        <div class="section-header reveal">
            <div>
                <div class="eyebrow"><span class="label">Related Products</span></div>
                <h3 style="font-size:2rem;font-weight:400;">You may also need</h3>
            </div>
            <a href="products" class="btn-arrow">All Products</a>
        </div>
        <div class="products-list-grid" style="margin-top: 0;">
            <?php foreach($related as $rp): ?>
            <div class="product-card reveal">
                <div class="product-card-image">
                    <?php if(file_exists($rp['image'])): ?>
                    <img src="<?php echo htmlspecialchars($rp['image']); ?>" alt="<?php echo htmlspecialchars($rp['name']); ?>">
                    <?php else: ?>
                    <div class="product-placeholder" data-abbr="<?php echo htmlspecialchars(strtoupper(substr(str_replace(' ','',$rp['short_name']),0,3))); ?>"></div>
                    <?php endif; ?>

                </div>
                <div class="product-card-body">
                    <div class="product-card-cat"><?php echo htmlspecialchars($rp['category']); ?></div>
                    <div class="product-card-name"><?php echo htmlspecialchars($rp['name']); ?></div>
                    <p class="product-card-desc"><?php echo htmlspecialchars(substr($rp['description'],0,100)).'...'; ?></p>
                    <div class="product-card-footer">
                        <span class="product-card-purity"><?php echo htmlspecialchars($rp['purity']); ?></span>
                        <a href="<?php echo htmlspecialchars($rp['slug']); ?>" class="product-card-link">View Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
$productInsightImages = [
    'zinc-oxide-99-99' => 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?auto=format&fit=crop&w=1400&q=82',
    'zinc-ash-65-70' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1400&q=82',
    'zinc-skimming-30-40' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1400&q=82',
    'apcd-zinc-ash-50-60' => 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?auto=format&fit=crop&w=1400&q=82',
    'zinc-die-cast-scrap' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1400&q=82',
];
$productInsightImage = $productInsightImages[$product['slug']] ?? 'https://images.unsplash.com/photo-1586864387967-d02ef85d93e8?auto=format&fit=crop&w=1400&q=82';
$productName = $product['name'];
$productCategory = strtolower($product['category']);
$marketPosition = 'supplier and exporter in Pakistan';
if (strpos($productCategory, 'imported') !== false) {
    $marketPosition = 'importer, supplier and exporter in Pakistan';
} elseif (strpos($productCategory, 'recycling') !== false || strpos($productCategory, 'scrap') !== false) {
    $marketPosition = 'recycler, recovery supplier and exporter in Pakistan';
} elseif (strpos($productCategory, 'chemical') !== false || strpos($productCategory, 'alloy') !== false) {
    $marketPosition = 'manufacturer, supplier and exporter in Pakistan';
}
$reportAnswer = $labReportFile !== ''
    ? 'A product lab report is available on this page for review, and the full document can be opened from the report viewer.'
    : 'A product-specific lab report can be requested from the BhattiZinc team with your quotation or sample enquiry.';
?>

<!-- PRODUCT SEO & GEO PROFILE -->
<section class="product-geo-section" aria-labelledby="product-market-profile">
    <div class="container">
        <div class="product-geo-grid">
            <div class="product-geo-copy reveal">
                <div class="eyebrow"><span class="label">Pakistan product profile</span></div>
                <h2 id="product-market-profile"><?php echo htmlspecialchars($productName); ?> in Pakistan: <?php echo htmlspecialchars(ucwords($marketPosition)); ?></h2>
                <p><strong><?php echo htmlspecialchars($productName); ?></strong> is listed by BhattiZinc for industrial buyers comparing product quality, availability and documentation in Pakistan. We provide practical support for procurement teams looking for a dependable <?php echo htmlspecialchars($product['category']); ?> <?php echo htmlspecialchars(strtolower($product['short_name'])); ?> source, including specifications, packaging, quantity planning and export coordination.</p>
                <p>For customers in Pakistan and international markets, BhattiZinc connects product supply with manufacturing, importing, exporting and recycling expertise across the zinc value chain. Availability, grade and commercial terms depend on the requested <?php echo htmlspecialchars(strtolower($product['form'])); ?>, <?php echo htmlspecialchars(strtolower($product['purity'])); ?> requirement, destination and batch documentation.</p>
                <div class="product-geo-facts">
                    <span><strong>Product:</strong> <?php echo htmlspecialchars($productName); ?></span>
                    <span><strong>Grade:</strong> <?php echo htmlspecialchars($product['grade']); ?></span>
                    <span><strong>Form:</strong> <?php echo htmlspecialchars($product['form']); ?></span>
                    <span><strong>Market:</strong> Pakistan and export destinations</span>
                </div>
            </div>
            <figure class="product-geo-media reveal reveal-delay-1">
                <img src="<?php echo htmlspecialchars($productInsightImage); ?>" alt="<?php echo htmlspecialchars($productName); ?> industrial supply and handling in Pakistan" loading="lazy" width="1400" height="900">
                <figcaption><?php echo htmlspecialchars($productName); ?> supply, handling and quality context</figcaption>
            </figure>
        </div>
    </div>
</section>

<!-- PRODUCT INSIGHT -->
<?php if (!empty($seoBlog)): ?>
<section class="product-blog-section">
    <div class="container">
        <article class="product-blog reveal">
            <div class="product-blog-header">
                <div class="eyebrow"><span class="label">Material Insight</span></div>
                <h2><?php echo htmlspecialchars($seoBlog['title']); ?></h2>
                <p><?php echo htmlspecialchars($seoBlog['intro']); ?></p>
            </div>
            <div class="product-blog-grid">
                <?php foreach($seoBlog['sections'] as $section): ?>
                <div class="product-blog-block">
                    <h3><?php echo htmlspecialchars($section['heading']); ?></h3>
                    <p><?php echo htmlspecialchars($section['body']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php if (!empty($seoBlog['faq'])): ?>
            <div class="product-blog-faq">
                <div class="label">Procurement Notes</div>
                <div class="product-blog-faq-grid">
                    <?php foreach($seoBlog['faq'] as $faq): ?>
                    <div class="product-blog-faq-item">
                        <h3><?php echo htmlspecialchars($faq['question']); ?></h3>
                        <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </article>
    </div>
</section>
<?php endif; ?>

<!-- PRODUCT FAQ -->
<section class="faq-section product-faq-section" id="product-faq">
    <div class="container">
        <div class="faq-intro reveal">
            <div class="eyebrow"><span class="label">Product questions</span></div>
            <h2><?php echo htmlspecialchars($productName); ?> supplier and buyer FAQ</h2>
            <p>Clear answers for buyers researching <?php echo htmlspecialchars(strtolower($productName)); ?> in Pakistan, including applications, supply, export support, quality documents and ordering.</p>
        </div>
        <div class="faq-list">
            <details class="faq-item reveal" open>
                <summary>What is <?php echo htmlspecialchars($productName); ?> used for?</summary>
                <div class="faq-answer"><p><?php echo htmlspecialchars($product['description']); ?> Common applications include <?php echo htmlspecialchars(implode(', ', array_slice($product['applications'], 0, 4))); ?>.</p></div>
            </details>
            <details class="faq-item reveal reveal-delay-1">
                <summary>Can I buy <?php echo htmlspecialchars($productName); ?> from a supplier in Pakistan?</summary>
                <div class="faq-answer"><p>Yes. BhattiZinc supports industrial buyers seeking <?php echo htmlspecialchars(strtolower($productName)); ?> supply in Pakistan. Share your required quantity, specification, packing and delivery location so the team can confirm current availability and commercial terms.</p></div>
            </details>
            <details class="faq-item reveal reveal-delay-2">
                <summary>Does BhattiZinc manufacture, import, recycle or export <?php echo htmlspecialchars($productName); ?>?</summary>
                <div class="faq-answer"><p>BhattiZinc operates across the zinc value chain as a <?php echo htmlspecialchars($marketPosition); ?> Product handling depends on the material category and requested batch, with support for technical specifications, commercial documentation and shipment coordination.</p></div>
            </details>
            <details class="faq-item reveal">
                <summary>Can I request a lab report or Certificate of Analysis?</summary>
                <div class="faq-answer"><p><?php echo htmlspecialchars($reportAnswer); ?> Buyers can also request product specifications and shipment documentation before confirming an order.</p></div>
            </details>
            <details class="faq-item reveal reveal-delay-1">
                <summary>How do I request a quote or sample for <?php echo htmlspecialchars($productName); ?>?</summary>
                <div class="faq-answer"><p>Use the Request a Quote or Request Sample button on this page and include your quantity, destination, application, grade, packing preference and target delivery schedule. The export team can then advise on availability, pricing and next steps.</p></div>
            </details>
        </div>
    </div>
</section>

<!-- LAB REPORT MODAL -->
<div class="lab-report-modal" id="lab-report-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="lab-report-title">
    <button type="button" class="lab-report-modal-backdrop" data-lab-report-close aria-label="Close lab report"></button>
    <div class="lab-report-modal-panel">
        <div class="lab-report-modal-head">
            <div>
                <div class="label">Quality Document</div>
                <h3 id="lab-report-title">Lab Report &mdash; <?php echo htmlspecialchars($product['name']); ?></h3>
            </div>
            <?php if ($labReportFile !== ''): ?>
            <a href="<?php echo htmlspecialchars($labReportFile); ?>" class="lab-report-open-link" target="_blank" rel="noopener" aria-label="Open the full lab report for <?php echo htmlspecialchars($product['name']); ?>">Open full report</a>
            <?php endif; ?>
            <button type="button" class="lab-report-modal-close" data-lab-report-close aria-label="Close lab report">&times;</button>
        </div>
        <?php if ($labReportFile !== ''): ?>
        <div class="lab-report-image-shell lab-report-frame-shell">
            <iframe src="<?php echo htmlspecialchars($labReportFile); ?>#toolbar=1&amp;navpanes=0&amp;scrollbar=1" title="Lab Report for <?php echo htmlspecialchars($product['name']); ?>" class="lab-report-iframe" loading="lazy"></iframe>
        </div>
        <?php else: ?>
        <div class="lab-report-request-state">
            <div class="label">Quality document</div>
            <h4>Lab report available on request</h4>
            <p>The current report for <?php echo htmlspecialchars($product['name']); ?> is available from our quality team. Contact BhattiZinc with your required batch, quantity and destination.</p>
            <a href="contact.php?product=<?php echo urlencode($product['name']); ?>&type=lab-report" class="btn btn--luxury-solid">Request this report</a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
