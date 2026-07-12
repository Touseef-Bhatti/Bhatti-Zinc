<?php
$current_page = basename($_SERVER['SCRIPT_NAME'] ?? $_SERVER['PHP_SELF'] ?? '', '.php');
if (!isset($assetBase)) {
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? $_SERVER['PHP_SELF'] ?? '');
    $basePath = trim(dirname($scriptName), '/');
    $assetBase = ($basePath === '' || $basePath === '.') ? '/assets/' : '/' . $basePath . '/assets/';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G38KKD9WCS"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-G38KKD9WCS');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($meta_description)): ?>
    <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <?php endif; ?>
    <?php if (isset($meta_keywords)): ?>
    <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords); ?>">
    <?php endif; ?>
    <?php if (isset($page_title)): ?>
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title . ' - BhattiZinc'); ?>">
    <?php endif; ?>
    <?php if (!isset($meta_description)): ?>
    <meta name="description" content="BhattiZinc — Premium zinc products manufacturer and global exporter. SHG Zinc, Zinc Oxide, Zinc Alloys, and specialty zinc chemicals.">
    <meta name="keywords" content="zinc ingots, zinc oxide, SHG zinc, zinc alloys, zinc exporter, zinc manufacturer Pakistan">
    <meta property="og:title" content="BhattiZinc — Global Zinc Solutions">
    <?php endif; ?>
    <meta property="og:description" content="<?php echo htmlspecialchars($og_description ?? $meta_description ?? 'Premium zinc products for global industry. LME-grade quality, international delivery.'); ?>">
    <title><?php echo isset($page_title) ? $page_title . ' — BhattiZinc' : 'BhattiZinc — Global Zinc Solutions'; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500&family=Barlow:ital,wght@0,300;0,400;0,500;0,600;1,300&family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($assetBase); ?>css/main.css">
</head>
<body>

<!-- Site Loader -->
<div id="site-loader">
    <div class="loader-inner">
        <div class="loader-logo">BhattiZinc</div>
        <div class="loader-bar"><span></span></div>
    </div>
</div>

<!-- Header -->
<header id="site-header" class="<?php echo $current_page === 'index' ? 'header--transparent' : 'header--solid'; ?>">
    <div class="header-inner">

        <a href="index" class="header-logo">
            <span class="logo-mark">BZ</span>
            <span class="logo-text">
                <span class="logo-name">BhattiZinc</span>
                <span class="logo-tagline">Global Zinc Solutions</span>
            </span>
        </a>

        <nav class="header-nav" id="main-nav" aria-label="Main navigation">
            <ul class="nav-list">
                <li class="<?php echo $current_page === 'index' ? 'active' : ''; ?>">
                    <a href="index">Home</a>
                </li>
                <li class="<?php echo $current_page === 'about' ? 'active' : ''; ?>">
                    <a href="about">About</a>
                </li>
                <li class="has-dropdown <?php echo in_array($current_page, ['products','product']) ? 'active' : ''; ?>">
                    <a href="products" aria-haspopup="true">Products <span class="nav-arrow">&#8964;</span></a>
                    <div class="mega-dropdown" role="menu">
                        <div class="mega-inner">
                            <div class="mega-col mega-col--label">
                                <span class="mega-label">Our Product Range</span>
                                <p class="mega-sub">Premium zinc in every form your industry demands</p>
                                <a href="products" class="mega-all-link ">View All Products &rarr;</a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-group">Primary &amp; Imported Metals</span>
                                <a href="shg-zinc-ingots">SHG Zinc Ingots</a>
                                
                                <a href="iranian-zinc-ingots">Iranian Zinc Ingots</a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-group">Alloys &amp; Chemicals</span>
                                <a href="zinc-alloy-92-94">Zinc Alloy </a>
                                <a href="secondary-zinc-ingots">Secondary Zinc Ingots</a>
                                <a href="zinc-oxide-99-99">Zinc Oxide</a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-group">Recycling &amp; Scrap</span>
                                <a href="zinc-ash-65-70">Zinc Ash </a>
                                <a href="zinc-skimming-30-40">Low-Grade Zinc Ash </a>
                                <a href="apcd-zinc-ash-50-60">APCD Zinc Ash </a>
                                <a href="zinc-dross-94-97">Zinc Dross</a>
                                <a href="zinc-die-cast-scrap">Zinc Die Cast Scrap</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="<?php echo $current_page === 'trade' ? 'active' : ''; ?>">
                    <a href="trade">Trade &amp; Export</a>
                </li>
                <li class="has-dropdown <?php echo $current_page === 'quality' ? 'active' : ''; ?>">
                    <a href="quality" aria-haspopup="true">Manufacturing <span class="nav-arrow">&#8964;</span></a>
                    <div class="mega-dropdown mega-dropdown--compact" role="menu">
                        <div class="mega-inner mega-inner--compact">
                            <div class="mega-col mega-col--label">
                                <span class="mega-label">Recycling &amp; Manufacturing</span>
                                <p class="mega-sub">Zinc recovery, oxide production, and controlled release for industrial supply</p>
                                <a href="quality" class="mega-all-link ">View Overview &rarr;</a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-group">Core Sections</span>
                                <a href="quality#zinc-metal-ash-recycling">Zinc Metal &amp; Ash Recycling</a>
                                <a href="quality#zinc-oxide-manufacturing">Zinc Oxide Manufacturing</a>
                                <a href="quality#quality-control">Quality Control</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="<?php echo $current_page === 'contact' ? 'active' : ''; ?>">
                    <a href="contact">Contact</a>
                </li>
                <li class="<?php echo $current_page === 'careers' ? 'active' : ''; ?>">
                    <a href="careers">Careers</a>
                </li>
            </ul>
        </nav>

        <div class="header-actions">
            <a href="tel:+923094530100" class="btn-call-now" id="btn-call-header">
                <span class="call-pulse"></span>
                <svg class="call-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <span class="call-text">Call Now &nbsp;+92 309 4530100</span>
            </a>
            <button class="nav-toggle" id="nav-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-overlay">
                <span></span><span></span><span></span>
            </button>
        </div>

    </div>
</header>

<!-- Mobile Nav Overlay -->
<div class="mobile-nav-overlay" id="mobile-overlay" role="dialog" aria-modal="true" aria-label="Site navigation">
    <div class="mobile-nav-inner">
        <div class="mobile-nav-logo">BhattiZinc</div>
        <ul class="mobile-nav-list">
            <li><a href="index">Home</a></li>
            <li><a href="about">About</a></li>
            <li class="mobile-has-sub">
                <button class="mobile-sub-toggle" aria-expanded="false">Products <span aria-hidden="true">+</span></button>
                <ul class="mobile-sub" aria-label="Products submenu">
                    <li><a href="products">All Products</a></li>
                    <li><a href="shg-zinc-ingots">SHG Zinc Ingots</a></li>
                    <li><a href="secondary-zinc-ingots">Secondary Zinc Ingots</a></li>
                    <li><a href="zinc-alloy-92-94">Zinc Alloy (92–94% Zn)</a></li>
                    <li><a href="iranian-zinc-ingots">Iranian Zinc Ingots</a></li>
                    <li><a href="zinc-oxide-99-99">Zinc Oxide</a></li>
                    <li><a href="zinc-ash-65-70">Zinc Ash (65–70% Zn)</a></li>
                    <li><a href="zinc-skimming-30-40">Low-Grade Zinc Ash (30–40% Zn)</a></li>
                    <li><a href="apcd-zinc-ash-50-60">APCD Zinc Ash (50–60% Zn)</a></li>
                    <li><a href="zinc-dross-94-97">Zinc Dross</a></li>
                    <li><a href="zinc-die-cast-scrap">Zinc Die Cast Scrap</a></li>
                </ul>
            </li>
            <li><a href="trade">Trade &amp; Export</a></li>
            <li class="mobile-has-sub">
                <button class="mobile-sub-toggle" aria-expanded="false">Manufacturing <span aria-hidden="true">+</span></button>
                <ul class="mobile-sub" aria-label="Manufacturing submenu">
                    <li><a href="quality">Overview</a></li>
                    <li><a href="quality#zinc-metal-ash-recycling">Zinc Metal &amp; Ash Recycling</a></li>
                    <li><a href="quality#zinc-oxide-manufacturing">Zinc Oxide Manufacturing</a></li>
                    <li><a href="quality#quality-control">Quality Control</a></li>
                </ul>
            </li>
            <li><a href="contact">Contact</a></li>
            <li><a href="careers">Careers</a></li>
        </ul>
        <div class="mobile-nav-footer">
            <a href="tel:+923094530100" class="btn-call-now btn-call-now--mobile" id="btn-call-mobile">
                <span class="call-pulse"></span>
                <svg class="call-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <span class="call-text">Call Now &nbsp;+92 309 4530100</span>
            </a>
        </div>
    </div>
</div>
