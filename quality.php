<?php
$page_title = 'Quality & Certifications';
include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-inner">
            <div class="page-hero-breadcrumb">
                <a href="index.php" class="breadcrumb-item">Home</a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-item current">Quality</span>
            </div>
            <h1 class="page-hero-title">Quality Without<br>Compromise</h1>
            <p class="page-hero-sub">From raw material intake to final shipment, every step in our process is governed by documented quality systems, third-party verification, and international standards compliance.</p>
        </div>
    </div>
</section>

<!-- QUALITY PHILOSOPHY -->
<section class="quality-page">
    <div class="container">

        <div class="quality-philosophy-grid">
            <div class="reveal">
                <div class="eyebrow"><span class="label">Our Philosophy</span></div>
                <h2 style="font-size:clamp(2rem,3vw,3rem);margin-bottom:1.5rem;">Quality is our<br>fundamental promise</h2>
                <p style="font-size:.95rem;color:var(--text-mid);line-height:1.85;margin-bottom:1.25rem;">At BhattiZinc, quality is not a department — it is a discipline that permeates every level of our organisation. Our Quality Management System is built on the ISO 9001:2015 framework and reinforced by dedicated laboratory infrastructure, trained personnel, and continuous improvement protocols.</p>
                <p style="font-size:.95rem;color:var(--text-mid);line-height:1.85;margin-bottom:1.25rem;">We believe that our clients should never have to question what they are receiving. Every shipment is accompanied by a full Certificate of Analysis and, where required, a third-party SGS inspection report — giving buyers complete confidence in specification conformance.</p>
                <p style="font-size:.95rem;color:var(--text-mid);line-height:1.85;">Our metallurgical laboratory operates 24 hours per day, testing every production run before release to the finished goods warehouse. No batch leaves our facility without meeting its published specification in full.</p>
            </div>
            <div class="reveal reveal-delay-2" style="background:var(--black);border-radius:var(--radius-lg);padding:48px;position:relative;overflow:hidden;">
                <div style="position:absolute;top:-40px;right:-40px;width:200px;height:200px;background:radial-gradient(circle,rgba(184,151,43,.12) 0%,transparent 70%);pointer-events:none;"></div>
                <div class="label" style="color:#ffffff;margin-bottom:32px;">Quality By Numbers</div>
                <?php
                $qStats = [
                    ['99.995%','Maximum SHG Zinc purity achieved'],
                    ['12+','Parameters tested per batch'],
                    ['100%','Batches with CoA on shipment'],
                    ['24/7','Laboratory operation hours'],
                    ['< 0.1%','Non-conformance rate (3-year avg.)'],
                    ['2003','Year of first SGS partnership'],
                ];
                foreach($qStats as $qs): ?>
                <div style="display:flex;align-items:center;gap:20px;padding:16px 0;border-bottom:1px solid rgba(255, 0, 0, 0.06);">
                    <div style="font-family:var(--font-display);font-size:1.6rem;font-weight:300;color:#ffffff;min-width:110px;line-height:1;"><?php echo $qs[0]; ?></div>
                    <div style="font-size:.82rem;color:rgba(255,255,255,.45);line-height:1.5;"><?php echo $qs[1]; ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Quality Process Steps -->
        <div class="reveal" style="margin-bottom:60px;">
            <div class="eyebrow"><span class="label">Quality Process</span></div>
            <h3 style="font-size:2rem;font-weight:400;max-width:500px;">Eight stages of quality control</h3>
        </div>

        <div class="quality-process-grid">
            <?php
            $qSteps = [
                ['Stage 01','Raw Material Incoming Inspection','All incoming zinc ore, scrap, and secondary feedstock is sampled and tested before acceptance. Non-conforming materials are rejected and returned to supplier.'],
                ['Stage 02','Pre-Process Verification','Feed composition is verified against target alloy chemistry before furnace charging. Process parameters — temperature, duration, and flux additions — are logged in real time.'],
                ['Stage 03','In-Process Sampling','Samples are drawn from molten metal at regular intervals during smelting and refining. Spectrometric analysis results are reviewed against process control limits before continuing.'],
                ['Stage 04','Final Product Analysis','Prior to casting or packing, every production batch is subjected to full spectrometric analysis across all regulated elements. Results are compared against product specification and LME requirements.'],
                ['Stage 05','Dimensional &amp; Physical Check','Cast ingots, sheets, and wire are checked for dimensional conformance, surface finish, and visual defects. Substandard units are segregated for remelting.'],
                ['Stage 06','Packing &amp; Labelling Audit','Finished goods packing is audited for correct product identification, weight accuracy, and ISPM-15 compliance. Pallet labels are verified against the Certificate of Analysis.'],
                ['Stage 07','Pre-Shipment Inspection','For orders requiring SGS inspection, our team coordinates a third-party survey covering quality, quantity, packing, and weight. The SGS report is issued before vessel loading.'],
                ['Stage 08','Document Quality Review','Before release of shipping documents, our quality team cross-checks all export documents for consistency — ensuring the CoA, invoice, packing list, and BL all describe the same consignment.'],
                ['Stage 09','Post-Delivery Review','Customer feedback is formally captured on receipt. Any non-conformity claims are investigated within 48 hours, with corrective and preventive actions (CAPA) documented in our QMS.'],
            ];
            foreach($qSteps as $i=>$step): ?>
            <div class="quality-process-card reveal reveal-delay-<?php echo min($i%3+1,3); ?>">
                <div class="qp-step"><?php echo $step[0]; ?></div>
                <div class="qp-title"><?php echo $step[1]; ?></div>
                <p class="qp-text"><?php echo $step[2]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- CERTIFICATIONS DETAIL -->
<section style="padding:80px 0 120px;background:var(--warm-white);border-top:1px solid var(--border);">
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:60px;">
            <div class="eyebrow" style="justify-content:center;"><span class="label">Our Certifications</span></div>
            <h2 style="max-width:600px;margin:0 auto;">Internationally recognised<br>credentials</h2>
        </div>

        <div class="cert-cards-grid">
            <?php
            $certs = [
                [
                    '<path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                    'ISO 9001:2015',
                    'Quality Management System',
                    'Certified since 2002. Our QMS covers all production, quality control, customer service, and logistics processes across the entire BhattiZinc facility.'
                ],
                [
                    '<path d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>',
                    'LME Registered',
                    'London Metal Exchange',
                    'BhattiZinc SHG Zinc is a registered brand on the London Metal Exchange, confirming consistent achievement of 99.995% minimum purity and LME specification compliance.'
                ],
                [
                    '<path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>',
                    'SGS Inspected',
                    'Third-Party Verification',
                    'We partner with SGS, the world\'s leading inspection and testing company, for pre-shipment inspection, weight surveys, and independent quality verification.'
                ],
                [
                    '<path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                    'REACH Compliant',
                    'EU Chemical Regulation',
                    'All BhattiZinc products meet EC No 1907/2006 REACH regulation requirements, enabling unrestricted import and sale within the European Economic Area.'
                ],
                [
                    '<path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                    'Halal Certified',
                    'Islamic Certification',
                    'BhattiZinc Zinc Oxide and Zinc Sulfate hold Halal certification, enabling supply to pharmaceutical, cosmetic, and food-contact applications in Muslim-majority markets.'
                ],
                [
                    '<path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>',
                    'ASTM / EN Standards',
                    'Product Standards',
                    'Products are manufactured to ASTM B6, ASTM B86, EN 988, EN 12844, and ISO 3549, with test reports available confirming compliance on each production run.'
                ],
                [
                    '<path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
                    'ISPM-15 Compliance',
                    'Phytosanitary Standard',
                    'All wooden packaging materials used for BhattiZinc exports are treated and marked in accordance with ISPM-15, the international standard for phytosanitary measures.'
                ],
                [
                    '<path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
                    'GHS / SDS',
                    'Safety Data Sheets',
                    'Safety Data Sheets for all BhattiZinc chemical products are prepared in accordance with the UN Globally Harmonised System (GHS) of Classification and Labelling of Chemicals.'
                ],
            ];
            foreach($certs as $i=>$cert): ?>
            <div class="cert-full-card reveal reveal-delay-<?php echo min($i%4+1,4); ?>">
                <div class="cert-full-icon">
                    <svg viewBox="0 0 24 24"><?php echo $cert[0]; ?></svg>
                </div>
                <div class="cert-full-title"><?php echo $cert[1]; ?></div>
                <div style="font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);margin-bottom:10px;"><?php echo $cert[2]; ?></div>
                <p class="cert-full-sub"><?php echo $cert[3]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- LAB CAPABILITIES -->
<section style="padding:80px 0 120px;background:var(--white);">
    <div class="container">
        <div class="lab-grid">
            <div class="reveal">
                <div class="eyebrow"><span class="label">Laboratory</span></div>
                <h3 style="font-size:2rem;font-weight:400;margin-bottom:1.5rem;">State-of-the-art<br>metallurgical testing</h3>
                <p style="font-size:.95rem;color:var(--text-mid);line-height:1.85;margin-bottom:1.25rem;">Our ISO-accredited metallurgical laboratory houses an inductively coupled plasma optical emission spectrometer (ICP-OES), X-ray fluorescence (XRF) analyser, and classical wet chemistry equipment for comprehensive elemental analysis.</p>
                <p style="font-size:.95rem;color:var(--text-mid);line-height:1.85;margin-bottom:2rem;">Testing capabilities include full elemental composition analysis, physical property testing (particle size, apparent density, oil absorption for zinc oxide and dust), and dimensional inspection for rolled products.</p>
                <a href="contact.php" class="btn btn--luxury-solid">Request a Test Report Sample</a>
            </div>
            <div class="reveal reveal-delay-1">
                <div class="label" style="margin-bottom:24px;color:var(--text-xs);">Testing Equipment &amp; Capabilities</div>
                <?php
                $lab = [
                    ['ICP-OES Spectrometer','Full elemental analysis to ppb levels for primary metals and chemical products'],
                    ['XRF Analyser','Rapid non-destructive elemental screening for process control'],
                    ['Wet Chemistry Suite','Classical titrimetric and gravimetric methods for certification purposes'],
                    ['Particle Size Analyser','Laser diffraction for zinc dust and oxide particle size distribution (d10, d50, d90)'],
                    ['Hardness Testing','Brinell and Vickers hardness measurement for alloy products'],
                    ['Tensile Testing','Tensile strength and elongation for zinc wire per AWS C2.25'],
                    ['Density Measurement','Apparent density for zinc dust per ASTM D520'],
                    ['pH &amp; Conductivity','Aqueous solution testing for zinc sulfate and zinc oxide grades'],
                ];
                foreach($lab as $j=>$item): ?>
                <div style="display:flex;align-items:flex-start;gap:16px;padding:16px 0;border-bottom:1px solid var(--border-light);" class="reveal reveal-delay-<?php echo min($j%4+1,4); ?>">
                    <div style="width:8px;height:8px;background:var(--gold);border-radius:50%;flex-shrink:0;margin-top:6px;"></div>
                    <div>
                        <div style="font-size:.88rem;font-weight:500;color:var(--text);margin-bottom:4px;"><?php echo $item[0]; ?></div>
                        <div style="font-size:.78rem;color:var(--text-sm);line-height:1.6;"><?php echo $item[1]; ?></div>
                    </div>
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
            <div class="eyebrow"><span class="label">Quality Assurance</span></div>
            <h2 class="cta-title">Every shipment,<br><em>guaranteed quality</em></h2>
            <p class="cta-sub">Request a copy of our ISO certificate, recent Certificate of Analysis, or SGS inspection report to review our quality credentials before your first order.</p>
            <div class="cta-actions">
                <a href="contact.php" class="btn btn--luxury-outline ">Request Quality Documents</a>
                <a href="products.php" class="btn btn--luxury-solid">View Products</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
