<?php
$page_title = 'Products';
require_once 'includes/products-data.php';
include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-inner">
            <div class="page-hero-breadcrumb">
                <a href="index.php" class="breadcrumb-item">Home</a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-item current">Products</span>
            </div>
            <h1 class="page-hero-title">Our Product Range</h1>
            <p class="page-hero-sub">Ten families of zinc products — from 99.995% SHG ingots to recycled ash and die-cast scrap — supplied to industrial and recycling markets.</p>
        </div>
    </div>
</section>

<!-- CATEGORY OVERVIEW -->
<section style="padding:60px 0 0;background:var(--white);">
    <div class="container">
        <div class="category-overview-grid reveal">
            <?php
            $categories = [
                ['Primary &amp; Imported Metals','SHG zinc, secondary ingots and imported Iranian ingots for galvanizing and alloy production.','3 Products'],
                ['Alloys &amp; Chemicals','Zinc alloys and zinc oxide for die casting, rubber, ceramics and industrial applications.','2 Products'],
                ['Recycling &amp; By-Products','Zinc ash, APCD dust, dross and die-cast scrap for recovery and secondary production.','5 Products'],
            ];
            $catColors = ['#f4f1eb','#fafaf7','#f4f1eb'];
            foreach($categories as $i=>$cat): ?>
            <div style="background:<?php echo $catColors[$i]; ?>;padding:36px 32px;">
                <div class="label" style="margin-bottom:12px;color:var(--gold);"><?php echo $cat[0]; ?></div>
                <p style="font-size:0.85rem;color:var(--text-mid);line-height:1.7;margin-bottom:12px;"><?php echo $cat[1]; ?></p>
                <span style="font-family:var(--font-label);font-size:0.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-xs);"><?php echo $cat[2]; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PRODUCTS LIST -->
<section style="padding:60px 0 120px;background:var(--white);">
    <div class="container">

        <!-- Filter Bar -->
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:40px;flex-wrap:wrap;gap:16px;" class="reveal">
            <div class="filter-bar">
                <button class="filter-btn active" data-filter="all">All Products</button>
                <?php
                $catList = [];
                foreach ($products as $p) {
                    if (!in_array($p['category'], $catList)) $catList[] = $p['category'];
                }
                foreach ($catList as $cat): ?>
                <button class="filter-btn" data-filter="<?php echo htmlspecialchars($cat); ?>"><?php echo htmlspecialchars($cat); ?></button>
                <?php endforeach; ?>
            </div>
            <span style="font-family:var(--font-label);font-size:0.65rem;letter-spacing:.1em;text-transform:uppercase;color:var(--text-xs);"><?php echo count($products); ?> Products</span>
        </div>

        <!-- Products Grid -->
        <div class="products-list-grid" id="products-grid">
            <?php foreach($products as $i=>$product): ?>
            <div class="product-card reveal reveal-delay-<?php echo min($i%3+1,3); ?>" data-category="<?php echo htmlspecialchars($product['category']); ?>" style="transition:opacity .25s ease, transform .25s ease;">
                <div class="product-card-image">
                    <?php if(file_exists($product['image'])): ?>
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" loading="lazy">
                    <?php else: ?>
                    <div class="product-placeholder" data-abbr="<?php echo htmlspecialchars(strtoupper(substr(str_replace(' ','',$product['short_name']),0,3))); ?>"></div>
                    <?php endif; ?>
                    <span class="product-card-grade"><?php echo htmlspecialchars($product['grade']); ?></span>
                </div>
                <div class="product-card-body">
                    <div class="product-card-cat"><?php echo htmlspecialchars($product['category']); ?></div>
                    <div class="product-card-name"><?php echo htmlspecialchars($product['name']); ?></div>
                    <p class="product-card-desc"><?php echo htmlspecialchars($product['description']); ?></p>
                    <div style="margin-bottom:16px;">
                        <div style="font-family:var(--font-label);font-size:0.6rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-xs);margin-bottom:6px;">Standard</div>
                        <div style="font-size:0.8rem;color:var(--text-mid);"><?php echo htmlspecialchars($product['standard']); ?></div>
                    </div>
                    <div class="product-card-footer">
                        <span class="product-card-purity"><?php echo htmlspecialchars($product['purity']); ?></span>
                        <a href="product.php?p=<?php echo urlencode($product['slug']); ?>" class="product-card-link">Full Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- PACKAGING & SHIPPING NOTE -->
<section style="padding:80px 0;background:var(--cream);border-top:1px solid var(--border);">
    <div class="container">
        <div class="packaging-grid reveal">
            <div>
                <div class="eyebrow"><span class="label">Packaging &amp; Shipping</span></div>
                <h3 style="font-size:2rem;font-weight:400;margin-bottom:1rem;">Packed for every trade route</h3>
                <p style="font-size:0.88rem;color:var(--text-mid);line-height:1.8;">We offer flexible packaging and container load configurations for every product, optimised for cost efficiency and cargo safety.</p>
            </div>
            <div class="packaging-cards-grid">
                <?php
                $pkgItems = [
                    ['FCL 20ft','Standard container — 18–22 MT depending on product and packing format.'],
                    ['FCL 40ft','Full 40-foot container — up to 26 MT for bulk or high-volume orders.'],
                    ['LCL Shipment','Less-than-container-load for smaller orders. Minimum order quantities apply.'],
                    ['Bulk Vessel','Break-bulk and bulk vessel cargo for large-volume SHG zinc orders.'],
                    ['Air Freight','Expedited air freight available for urgent samples and small consignments.'],
                    ['ISPM-15','All wooden pallets and packaging meet international phytosanitary standards.'],
                ];
                foreach($pkgItems as $j=>$pkg): ?>
                <div class="trade-card reveal reveal-delay-<?php echo min($j%3+1,3); ?>" style="padding:24px;">
                    <div class="trade-card-title" style="font-size:1rem;margin-bottom:8px;"><?php echo $pkg[0]; ?></div>
                    <p class="trade-card-text"><?php echo $pkg[1]; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-banner">
    <div class="container">
        <div class="cta-inner reveal">
            <div class="eyebrow"><span class="label">Inquire Now</span></div>
            <h2 class="cta-title">Need a specific<br><em>grade or form</em>?</h2>
            <p class="cta-sub">Our technical team can advise on the right zinc product, grade, and packaging for your application and supply chain.</p>
            <div class="cta-actions">
                <a href="contact.php" class="btn btn--luxury-outline ">Request a Quote</a>
                <a href="trade.php" class="btn btn--luxury-solid">Trade Information</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
