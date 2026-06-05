<?php
require_once 'includes/products-data.php';
$featured = getFeaturedProducts($products);
$page_title = 'BhattiZinc — Global Zinc Solutions';
include 'includes/header.php';
?>

<!-- HERO -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-texture"></div>

    <div class="hero-inner">
        <div class="hero-tag">Premier Zinc Manufacturer &amp; Global Exporter</div>
        <h1 class="hero-title">
            Zinc refined<br>
            to <em>international</em><br>
            perfection
        </h1>
        <p class="hero-subtitle" id="typewriter-text" data-text="Delivering LME-standard zinc products to leading manufacturers worldwide."></p>
        <style>
            #typewriter-text::after {
                content: '|';
                animation: blink 0.8s infinite;
                color: var(--gold, #d4af37);
            }
            @keyframes blink {
                0%, 100% { opacity: 1; }
                50% { opacity: 0; }
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const el = document.getElementById('typewriter-text');
                if (el) {
                    const text = el.getAttribute('data-text');
                    let i = 0;
                    function type() {
                        if (i < text.length) {
                            el.textContent += text.charAt(i);
                            i++;
                            setTimeout(type, 30);
                        }
                    }
                    setTimeout(type, 800);
                }
            });
        </script>
        <div class="hero-cta" style="margin-bottom: 6rem;">
            <a href="products.php" class="btn btn--luxury-solid">Explore Products</a>
            <a href="contact.php" class="btn btn--luxury-outline">Request a Quote</a>
        </div>
    </div>

    <div class="hero-scroll">
        <div class="hero-scroll-line"></div>
        <span class="hero-scroll-label">Scroll</span>
    </div>

    <div class="hero-stats">
        <div class="hero-stats-bar">
            <div class="hero-stat" >
                <div class="hero-stat-num"><span data-count="25" data-suffix="+">25+</span></div>
                <div class="hero-stat-label">Years of Operation</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num"><span data-count="45" data-suffix="+">45+</span></div>
                <div class="hero-stat-label">Export Destinations</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num"><span data-count="99.995" data-suffix="%" data-decimals="3">99.995%</span></div>
                <div class="hero-stat-label">SHG Zinc Purity</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num"><span data-count="10" data-suffix="">10</span></div>
                <div class="hero-stat-label">Product Families</div>
            </div>
        </div>
    </div>
</section>

<!-- TICKER -->
<div class="ticker-section">
    <div class="ticker-track">
        <div class="ticker-item"><span>SHG Zinc 99.995%</span><div class="ticker-dot"></div></div>
        <div class="ticker-item"><span>Zinc Oxide 99.7%+</span><div class="ticker-dot"></div></div>
        <div class="ticker-item"><span>Zinc Ingots LME Grade A</span><div class="ticker-dot"></div></div>
        <div class="ticker-item"><span>Zamak Alloys</span><div class="ticker-dot"></div></div>
        <div class="ticker-item"><span>Zinc Dust ASTM D520</span><div class="ticker-dot"></div></div>
        <div class="ticker-item"><span>Zinc Sulfate Monohydrate</span><div class="ticker-dot"></div></div>
        <div class="ticker-item"><span>Zinc Sheets EN 988</span><div class="ticker-dot"></div></div>
        <div class="ticker-item"><span>Thermal Spray Wire</span><div class="ticker-dot"></div></div>
        <div class="ticker-item"><span>ISO 9001:2015 Certified</span><div class="ticker-dot"></div></div>
        <div class="ticker-item"><span>Global Export Since 1998</span><div class="ticker-dot"></div></div>
    </div>
</div>

<!-- INTRO / ABOUT -->
<section class="intro-section">
    <div class="container">
        <div class="intro-grid">
            <div class="intro-content reveal">
                <div class="eyebrow">
                    <span class="label">About BhattiZinc</span>
                </div>
                <h2 class="intro-heading">
                    Zinc expertise,<br>
                    globally trusted
                </h2>
                <p class="intro-text">
                    Established in 1998, BhattiZinc has grown from a regional manufacturer to one of South Asia's leading zinc producers and exporters. Our state-of-the-art facility in Gujranwala produces the full spectrum of zinc products — from primary metals to specialty chemicals — serving galvanizers, die-casters, chemical manufacturers, and construction industries worldwide.
                </p>
                <p class="intro-text">
                    We hold LME registration, ISO 9001:2015 certification, and maintain rigorous quality systems that ensure every shipment meets the exacting standards of our international clients.
                </p>
                <div class="intro-values">
                    <div class="intro-value reveal reveal-delay-1">
                        <div class="intro-value-icon">Q</div>
                        <div class="intro-value-text">
                            <strong>Uncompromising Quality</strong>
                            Spectrometric analysis on every batch, full certificates of analysis provided.
                        </div>
                    </div>
                    <div class="intro-value reveal reveal-delay-2">
                        <div class="intro-value-icon">R</div>
                        <div class="intro-value-text">
                            <strong>Reliable Supply</strong>
                            Strategic inventory management ensures on-time delivery worldwide.
                        </div>
                    </div>
                    <div class="intro-value reveal reveal-delay-3">
                        <div class="intro-value-icon">G</div>
                        <div class="intro-value-text">
                            <strong>Global Compliance</strong>
                            REACH-compliant, with full export documentation for all markets.
                        </div>
                    </div>
                    <div class="intro-value reveal reveal-delay-4">
                        <div class="intro-value-icon">C</div>
                        <div class="intro-value-text">
                            <strong>Custom Solutions</strong>
                            Tailored alloy grades, packaging formats, and labelling to spec.
                        </div>
                    </div>
                </div>
                <div style="margin-top:2.5rem;">
                    <a href="about.php" class="btn btn--luxury-dark">Our Full Story</a>
                </div>
            </div>

            <div class="intro-visual reveal reveal-delay-2">
                <div class="intro-image-main">
                    <div class="product-placeholder" data-abbr="BZ" style="aspect-ratio:4/5; background:linear-gradient(145deg,#f0ede5 0%,#e8e4da 100%);"></div>
                </div>
                <div class="intro-image-badge">
                    <div class="intro-image-badge-num">25+</div>
                    <div class="intro-image-badge-text">Years of Expertise</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- QUALITY STRIP -->
<div class="quality-strip">
    <div class="container">
        <div class="quality-inner">
            <div class="quality-left reveal">
                <h3>Certified for<br>Global Trade</h3>
                <p>Every product leaves our facility with full certification documentation, compliant with international import requirements.</p>
            </div>
            <div class="quality-divider"></div>
            <div class="quality-certs reveal reveal-delay-1">
                <div class="cert-item">
                    <div class="cert-icon">
                        <svg viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <span class="cert-name">ISO 9001:2015</span>
                </div>
                <div class="cert-item">
                    <div class="cert-icon">
                        <svg viewBox="0 0 24 24"><path d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                    </div>
                    <span class="cert-name">LME Registered</span>
                </div>
                <div class="cert-item">
                    <div class="cert-icon">
                        <svg viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                    <span class="cert-name">SGS Inspected</span>
                </div>
                <div class="cert-item">
                    <div class="cert-icon">
                        <svg viewBox="0 0 24 24"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <span class="cert-name">REACH Compliant</span>
                </div>
                <div class="cert-item">
                    <div class="cert-icon">
                        <svg viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <span class="cert-name">Halal Certified</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FEATURED PRODUCTS -->
<section class="products-section">
    <div class="container">
        <div class="section-header reveal">
            <div>
                <div class="eyebrow">
                    <span class="label">Product Range</span>
                </div>
                <h2 class="section-title">Zinc in every form<br>industry demands</h2>
            </div>
            <a href="products.php" class="btn btn--luxury-solid">View All Products</a>
        </div>

        <div class="products-grid">
            <?php foreach($featured as $product): ?>
            <div class="product-card reveal">
                <div class="product-card-image">
                    <?php if(file_exists($product['image'])): ?>
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" loading="lazy">
                    <?php else: ?>
                    <div class="product-placeholder" data-abbr="<?php echo htmlspecialchars(substr($product['short_name'],0,2)); ?>"></div>
                    <?php endif; ?>
                    <span class="product-card-grade"><?php echo htmlspecialchars($product['grade']); ?></span>
                </div>
                <div class="product-card-body">
                    <div class="product-card-cat"><?php echo htmlspecialchars($product['category']); ?></div>
                    <div class="product-card-name"><?php echo htmlspecialchars($product['name']); ?></div>
                    <p class="product-card-desc"><?php echo htmlspecialchars($product['description']); ?></p>
                    <div class="product-card-footer">
                        <span class="product-card-purity"><?php echo htmlspecialchars($product['purity']); ?></span>
                        <a href="product.php?p=<?php echo urlencode($product['slug']); ?>" class="product-card-link">View Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PROCESS -->
<section class="process-section">
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:0;">
            <div class="eyebrow" style="justify-content:center;"><span class="label">How We Work</span></div>
            <h2 style="max-width:600px;margin:0 auto;">From refinery to<br>your facility</h2>
        </div>
        <div class="process-timeline" style="margin-top:80px;">
            <div class="timeline-progress-bar"></div>
            
            <div class="process-node reveal">
                <div class="node-marker">
                    <div class="node-dot"></div>
                    <div class="node-pulse"></div>
                </div>
                <div class="process-card">
                    <div class="process-bg-num">01</div>
                    <h3 class="process-step-title">Sourcing &amp; Smelting</h3>
                    <p class="process-step-desc">We source primary zinc ore and secondary zinc feedstock from verified global suppliers, processed through our electrolytic refinery to achieve target purity grades.</p>
                </div>
            </div>

            <div class="process-node reveal reveal-delay-1">
                <div class="node-marker">
                    <div class="node-dot"></div>
                    <div class="node-pulse"></div>
                </div>
                <div class="process-card">
                    <div class="process-bg-num">02</div>
                    <h3 class="process-step-title">Quality Analysis</h3>
                    <p class="process-step-desc">Every production batch undergoes spectrometric analysis across 12+ elemental parameters. Certificates of Analysis (CoA) are issued before shipment and shared digitally.</p>
                </div>
            </div>

            <div class="process-node reveal reveal-delay-2">
                <div class="node-marker">
                    <div class="node-dot"></div>
                    <div class="node-pulse"></div>
                </div>
                <div class="process-card">
                    <div class="process-bg-num">03</div>
                    <h3 class="process-step-title">Packing &amp; Logistics</h3>
                    <p class="process-step-desc">Products are packed to international standards on heat-treated wooden pallets, with full ISPM-15 compliance. We handle FCL, LCL, and bulk shipment logistics.</p>
                </div>
            </div>

            <div class="process-node reveal reveal-delay-3">
                <div class="node-marker">
                    <div class="node-dot"></div>
                    <div class="node-pulse"></div>
                </div>
                <div class="process-card">
                    <div class="process-bg-num">04</div>
                    <h3 class="process-step-title">Documentation &amp; Delivery</h3>
                    <p class="process-step-desc">Full export documentation — commercial invoice, packing list, certificate of origin, CoA, SGS inspection report — provided to every customer, every time.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GLOBAL REACH -->
<section class="global-section">
    <div class="container">
        <div class="global-inner">
            <div class="global-header reveal">
                <div class="eyebrow">
                    <span class="label" style="color:rgba(255,255,255,0.4);">Global Presence</span>
                </div>
                <h2 class="global-title">Delivered to<br>four continents</h2>
                <p class="global-subtitle">Regular shipping schedules to major ports across Asia, Europe, the Middle East, and Africa, with flexible Incoterms to match your supply chain.</p>
            </div>

            <div class="regions-grid reveal">
                <div class="region-card">
                    <div class="region-name">Middle East</div>
                    <div class="region-countries">
                        <span class="region-country highlight">UAE</span>
                        <span class="region-country highlight">Saudi Arabia</span>
                        <span class="region-country">Qatar</span>
                        <span class="region-country">Kuwait</span>
                        <span class="region-country">Oman</span>
                        <span class="region-country">Bahrain</span>
                    </div>
                </div>
                <div class="region-card">
                    <div class="region-name">South Asia</div>
                    <div class="region-countries">
                        <span class="region-country highlight">Bangladesh</span>
                        <span class="region-country highlight">Sri Lanka</span>
                        <span class="region-country">India</span>
                        <span class="region-country">Nepal</span>
                        <span class="region-country">Pakistan</span>
                    </div>
                </div>
                <div class="region-card">
                    <div class="region-name">Southeast Asia</div>
                    <div class="region-countries">
                        <span class="region-country highlight">Malaysia</span>
                        <span class="region-country highlight">Vietnam</span>
                        <span class="region-country">Indonesia</span>
                        <span class="region-country">Thailand</span>
                        <span class="region-country">Philippines</span>
                    </div>
                </div>
                <div class="region-card">
                    <div class="region-name">Africa</div>
                    <div class="region-countries">
                        <span class="region-country highlight">Nigeria</span>
                        <span class="region-country highlight">Kenya</span>
                        <span class="region-country">Ghana</span>
                        <span class="region-country">Tanzania</span>
                        <span class="region-country">Ethiopia</span>
                    </div>
                </div>
                <div class="region-card">
                    <div class="region-name">Europe</div>
                    <div class="region-countries">
                        <span class="region-country highlight">Turkey</span>
                        <span class="region-country highlight">Greece</span>
                        <span class="region-country">Netherlands</span>
                        <span class="region-country">Belgium</span>
                        <span class="region-country">Germany</span>
                    </div>
                </div>
            </div>

            <div class="global-numbers reveal">
                <div class="global-num-card">
                    <div class="global-num"><span data-count="45" data-suffix="">45</span>+</div>
                    <div class="global-num-label">Export Destinations</div>
                </div>
                <div class="global-num-card">
                    <div class="global-num"><span data-count="3" data-suffix="">3</span>+</div>
                    <div class="global-num-label">Weekly Departures</div>
                </div>
                <div class="global-num-card">
                    <div class="global-num"><span data-count="500" data-suffix="">500</span>+</div>
                    <div class="global-num-label">Active Trade Partners</div>
                </div>
                <div class="global-num-card">
                    <div class="global-num"><span data-count="50" data-suffix="">50</span>k+</div>
                    <div class="global-num-label">MT Exported Annually</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA BANNER -->
<section class="cta-banner">
    <div class="container">
        <div class="cta-inner reveal">
            <div class="eyebrow">
                <span class="label">Get Started</span>
            </div>
            <h2 class="cta-title">
                Ready to source<br><em>premium zinc</em>?
            </h2>
            <p class="cta-sub">
                Contact our trade team for pricing, availability, technical specifications, and sample requests.
            </p>
            <div class="cta-actions">
                <a href="contact.php" class="btn btn--luxury-outline">Request a Quote</a>
                <a href="trade.php" class="btn btn--luxury-solid">Trade Information</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
