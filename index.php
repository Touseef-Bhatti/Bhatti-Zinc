<?php
require_once 'includes/products-data.php';
$featured = getFeaturedProducts($products);
$homeFeaturedSlugs = ['shg-zinc-ingots', 'zinc-oxide-99-99', 'secondary-zinc-ingots', 'zinc-alloy-92-94'];
$featured = array_values(array_filter($products, fn($p) => in_array($p['slug'], $homeFeaturedSlugs, true)));
$featuredOrder = array_flip($homeFeaturedSlugs);
usort($featured, fn($a, $b) => $featuredOrder[$a['slug']] <=> $featuredOrder[$b['slug']]);
$page_title = 'BhattiZinc — Global Zinc Solutions';
include 'includes/header.php';
?>

<!-- HERO -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-texture"></div>

    <div class="hero-inner">
        <div class="hero-tag">Leading Zinc Manufacturer &amp; Exporter — in  <span class="hero-tag-highlight"> Pakistan</span></div>
        <h1 class="hero-title">
            <span class="hero-highlight">BHATTI ZINC</span><br>
            products for <em>global</em> industries.
        </h1>
        <p class="hero-subtitle" id="typewriter-text" data-text="Since 1998, delivering premium zinc products to industries worldwide."></p>
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
                    const boldEnd = 'Since 1998,'.length;
                    let i = 0;
                    let output = '';
                    function type() {
                        if (i < text.length) {
                            output += text.charAt(i);
                            if (i < boldEnd) {
                                el.innerHTML = '<strong>' + output + '</strong>';
                            } else {
                                el.innerHTML = '<strong>' + text.substring(0, boldEnd) + '</strong>' + output.substring(boldEnd);
                            }
                            i++;
                            setTimeout(type, 30);
                        }
                    }
                    setTimeout(type, 800);
                }
            });
        </script>

        <div class="hero-cta">
            <a href="products" class="btn btn--luxury-solid">Explore Products</a>
            <a href="contact" class="btn btn--luxury-outline">Request a Quote</a>
        </div>
    </div>

    <!-- Hero Image (right side) -->
    <div class="hero-feature-image">
        <img src="assets/images/site/zinc_first_page.png" alt="Bhatti Zinc — Premium Zinc Products" loading="eager">
    </div>

</section>




<!-- INTRO / ABOUT -->
<section class="intro-section">
    <div class="container">
        <div class="intro-grid">
            <div class="intro-content reveal">
                <div class="eyebrow">
                    <span class="label">About Bhatti Zinc</span>
                </div>
                <h2 class="intro-heading intro-heading--underline">
                    <span id="intro-typewriter"></span>
                </h2>
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const el = document.getElementById('intro-typewriter');
                        if (!el) return;
                        const text = 'Building strength in the\nZinc Industry....';
                        let i = 0;
                        let hasScrolled = false;
                        window.addEventListener('scroll', () => { hasScrolled = true; }, { once: true });
                        function typeIntro() {
                            if (i < text.length) {
                                if (text.charAt(i) === '\n') {
                                    el.innerHTML += '<br>';
                                } else {
                                    el.innerHTML += text.charAt(i);
                                }
                                i++;
                                setTimeout(typeIntro, 40);
                            }
                        }
                        const observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting && hasScrolled && i === 0) {
                                    setTimeout(typeIntro, 200);
                                    observer.disconnect();
                                }
                            });
                        }, { threshold: 0.5, rootMargin: '0px 0px -80px 0px' });
                        observer.observe(el.closest('.intro-section'));
                    });
                </script>
                <p class="intro-text">
                    Founded in Gujranwala, Pakistan, Bhatti Zinc has grown from a local trading business into a trusted manufacturer, importer, exporter, recycler, and supplier of premium zinc products — backed by consistent quality, competitive pricing, and dependable supply chains.
                </p>
                <div style="margin-top:1.5rem;">
                    <a href="about" class="btn btn--luxury-dark">Our Full Story</a>
                </div>
            </div>

            <div class="intro-visual reveal reveal-delay-2">
                <div class="intro-image-main">
                    <img src="assets/images/site/zinc-ingot-stock.png" alt="BhattiZinc Warehouse — Gujranwala, Pakistan" loading="lazy" style="width:100%; height:100%; object-fit:cover; border-radius:inherit;">
                </div>
                <div class="intro-image-badge">
                    <div class="intro-image-badge-num"><strong>25+</strong></div>
                    <div class="intro-image-badge-text">Years of Expertise</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="products-section">
    <div class="container">
        <div class="section-header reveal">
            <div>
                <div class="eyebrow">
                    <span class="label">Product Range</span>
                </div>
                <h2 class="section-title"><b>BHATTI ZINC</b> in every form industry demands.</h2>
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
                   
                </div>
                <div class="product-card-body">
                   
                    <div class="product-card-name"><?php echo htmlspecialchars($product['name']); ?></div>
                    <p class="product-card-desc"><?php echo preg_replace('/(\d[\d.,–\-]*%)/u', '<strong>$1</strong>', htmlspecialchars($product['description'])); ?></p>
                    <div class="product-card-footer">
                        <span class="product-card-purity"><?php echo htmlspecialchars($product['purity']); ?></span>
                        <a href="<?php echo htmlspecialchars($product['slug']); ?>" class="product-card-link">View Details</a>
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
            <h2 style="max-width:600px;margin:0 auto;">From sourcing to<br>your facility</h2>
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
                    <h3 class="process-step-title">Sourcing &amp; Production</h3>
                    <p class="process-step-desc">We source, manufacture, and recycle zinc to deliver the exact grades our customers need.</p>
                </div>
            </div>

            <div class="process-node reveal reveal-delay-1">
                <div class="node-marker">
                    <div class="node-dot"></div>
                    <div class="node-pulse"></div>
                </div>
                <div class="process-card">
                    <div class="process-bg-num">02</div>
                    <h3 class="process-step-title">Grade Verification</h3>
                    <p class="process-step-desc">Every order verified for zinc content, form, and application to match production needs.</p>
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
                    <p class="process-step-desc">Prepared in bags, bundles, pallets, or bulk — with full shipment planning.</p>
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
                    <p class="process-step-desc">All commercial documents and shipment details arranged for smooth delivery.</p>
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
                    <span class="label">Global Presence</span>
                </div>
                <h2 class="global-title">Serving local &amp;<br>international markets</h2>
                <p class="global-subtitle">From Gujranwala, Pakistan — supplying zinc to domestic and international markets with flexible order support.</p>
            </div>

            <div class="regions-grid reveal">
                <div class="region-card">
                    <div class="region-name">Domestic Supply</div>
                    <div class="region-countries">
                        <span class="region-country highlight">Gujranwala</span>
                        <span class="region-country highlight">Pakistan</span>
                        <span class="region-country">Industrial Buyers</span>
                        <span class="region-country">Bulk Orders</span>
                    </div>
                </div>
                <div class="region-card">
                    <div class="region-name">International Trade</div>
                    <div class="region-countries">
                        <span class="region-country highlight">Export Supply</span>
                        <span class="region-country highlight">Import Supply</span>
                        <span class="region-country">Documentation</span>
                        <span class="region-country">Logistics Support</span>
                    </div>
                </div>
                <div class="region-card">
                    <div class="region-name">Manufacturing Sectors</div>
                    <div class="region-countries">
                        <span class="region-country highlight">Galvanizing</span>
                        <span class="region-country highlight">Alloys</span>
                        <span class="region-country">Foundries</span>
                        <span class="region-country">Chemicals</span>
                    </div>
                </div>
                <div class="region-card">
                    <div class="region-name">Recycling Markets</div>
                    <div class="region-countries">
                        <span class="region-country highlight">Zinc Ash</span>
                        <span class="region-country highlight">Zinc Dross</span>
                        <span class="region-country">Secondary Zinc</span>
                        <span class="region-country">Metal Recovery</span>
                    </div>
                </div>
                <div class="region-card">
                    <div class="region-name">Core Products</div>
                    <div class="region-countries">
                        <span class="region-country highlight">SHG Zinc</span>
                        <span class="region-country highlight">Zinc Oxide</span>
                        <span class="region-country">Zinc Alloy</span>
                        <span class="region-country">Secondary Ingots</span>
                    </div>
                </div>
            </div>

            <div class="global-numbers reveal">
                <div class="global-num-card">
                    <div class="global-num"><span data-count="25" data-suffix="">25</span>+</div>
                    <div class="global-num-label">Years Experience</div>
                </div>
                <div class="global-num-card">
                    <div class="global-num"><span data-count="10" data-suffix="">10</span>+</div>
                    <div class="global-num-label">Product Categories</div>
                </div>
                <div class="global-num-card">
                    <div class="global-num"><span data-count="1998" data-suffix="">1998</span></div>
                    <div class="global-num-label">Established Since</div>
                </div>
                <div class="global-num-card">
                    <div class="global-num"><span data-count="3" data-suffix="">3</span></div>
                    <div class="global-num-label">Manufacturer Importer Exporter</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
