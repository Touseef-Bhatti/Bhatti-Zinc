<?php
$page_title = 'Recycling & Manufacturing';
$meta_description = 'BhattiZinc recycling and manufacturing capabilities for zinc metal recovery, zinc ash processing, zinc oxide production, and documented quality control.';
$meta_keywords = 'zinc recycling Pakistan, zinc ash recycling, zinc metal recycling, zinc oxide manufacturing, BhattiZinc manufacturing';
include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-inner">
            <div class="page-hero-breadcrumb">
                <a href="index" class="breadcrumb-item">Home</a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-item current">Recycling &amp; Manufacturing</span>
            </div>
            <h1 class="page-hero-title">Recycling &amp;<br>Manufacturing</h1>
            <p class="page-hero-sub">Integrated zinc recovery, refining, oxide manufacturing, and quality control for industrial buyers who need reliable material performance from feedstock to final shipment.</p>
        </div>
    </div>
</section>

<!-- OVERVIEW -->
<section class="quality-page">
    <div class="container">

        <div class="quality-philosophy-grid">
            <div class="reveal">
                <div class="eyebrow"><span class="label">Industrial Capability</span></div>
                <h2 style="font-size:clamp(2rem,3vw,3rem);margin-bottom:1.5rem;">From recovered zinc<br>to controlled output</h2>
                <p style="font-size:.95rem;color:var(--text-mid);line-height:1.85;margin-bottom:1.25rem;">BhattiZinc combines zinc-bearing material recycling with dedicated manufacturing lines for refined zinc products and zinc oxide. Our process is built for practical industrial supply: controlled sourcing, careful sorting, monitored processing, batch testing, and clear shipment documentation.</p>
                <p style="font-size:.95rem;color:var(--text-mid);line-height:1.85;margin-bottom:1.25rem;">The facility handles zinc metal, zinc ash, zinc dross, secondary ingots, and oxide production with a focus on recovery value, stable chemistry, and repeatable quality. Each lot is reviewed by production and quality teams before release.</p>
                <p style="font-size:.95rem;color:var(--text-mid);line-height:1.85;">This page outlines the major operating areas behind our supply: zinc metal and ash recycling, zinc oxide manufacturing, and the quality control system that keeps each shipment aligned with buyer requirements.</p>
            </div>
            <div class="reveal reveal-delay-2" style="background:var(--black);border-radius:var(--radius-lg);padding:48px;position:relative;overflow:hidden;">
                <div style="position:absolute;top:-40px;right:-40px;width:200px;height:200px;background:radial-gradient(circle,rgba(184,151,43,.12) 0%,transparent 70%);pointer-events:none;"></div>
                <div class="label" style="color:#ffffff;margin-bottom:32px;">Process Areas</div>
                <?php
                $capabilities = [
                    ['01','Zinc metal recovery and refining'],
                    ['02','Zinc ash and dross processing'],
                    ['03','Secondary zinc ingot production'],
                    ['04','Zinc oxide manufacturing'],
                    ['05','Batch sampling and chemistry checks'],
                    ['06','Packing, labeling, and export documentation'],
                ];
                foreach($capabilities as $capability): ?>
                <div style="display:flex;align-items:center;gap:20px;padding:16px 0;border-bottom:1px solid rgba(255,255,255,0.08);">
                    <div style="font-family:var(--font-display);font-size:1.6rem;font-weight:300;color:#ffffff;min-width:56px;line-height:1;"><?php echo $capability[0]; ?></div>
                    <div style="font-size:.82rem;color:rgba(255,255,255,.55);line-height:1.5;"><?php echo $capability[1]; ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="reveal" style="margin-bottom:60px;">
            <div class="eyebrow"><span class="label">Operating Flow</span></div>
            <h3 style="font-size:2rem;font-weight:400;max-width:560px;">A controlled route from incoming material to dispatch-ready product</h3>
        </div>

        <div class="quality-process-grid">
            <?php
            $processSteps = [
                ['Stage 01','Material Receiving','Zinc-bearing material is checked on arrival for source, physical condition, moisture, attachments, and visible contamination before processing.'],
                ['Stage 02','Sorting &amp; Preparation','Metal, ash, dross, and mixed zinc residues are separated into workable streams so each batch can be processed with the correct recovery route.'],
                ['Stage 03','Smelting &amp; Recovery','Prepared material is charged under controlled operating conditions to recover usable zinc metal and reduce avoidable process loss.'],
                ['Stage 04','Refining &amp; Casting','Recovered zinc is refined toward the required chemistry, then cast or prepared for downstream manufacturing depending on buyer specification.'],
                ['Stage 05','Oxide Production','Selected zinc feed is converted through a dedicated zinc oxide manufacturing route with attention to appearance, purity, and consistency.'],
                ['Stage 06','Quality Release','Representative samples are reviewed before packing, with batch records and shipment documents aligned to the final product description.'],
            ];
            foreach($processSteps as $i=>$step): ?>
            <div class="quality-process-card reveal reveal-delay-<?php echo min($i%3+1,3); ?>">
                <div class="qp-step"><?php echo $step[0]; ?></div>
                <div class="qp-title"><?php echo $step[1]; ?></div>
                <p class="qp-text"><?php echo $step[2]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- RECYCLING SECTIONS -->
<section id="zinc-metal-ash-recycling" style="padding:80px 0 120px;background:var(--warm-white);border-top:1px solid var(--border);">
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:60px;">
            <div class="eyebrow" style="justify-content:center;"><span class="label">Zinc Metal &amp; Ash Recycling</span></div>
            <h2 style="max-width:700px;margin:0 auto;">Recovering zinc value from industrial material streams</h2>
        </div>

        <div class="cert-cards-grid">
            <?php
            $recycling = [
                [
                    '<path d="M4 7h16M7 7v10a2 2 0 002 2h6a2 2 0 002-2V7M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2"/>',
                    'Zinc Metal Scrap',
                    'Sorting &amp; Recovery',
                    'Clean zinc units, die-cast scrap, and remeltable metal are sorted for practical recovery, secondary production, and controlled melting performance.'
                ],
                [
                    '<path d="M12 2l4 7H8l4-7zm0 20l-4-7h8l-4 7zM2 12l7-4v8l-7-4zm20 0l-7 4V8l7 4z"/>',
                    'Zinc Ash',
                    'Grade-Based Processing',
                    'Zinc ash is reviewed by grade, zinc content, physical condition, and contamination level before being directed to the correct recycling route.'
                ],
                [
                    '<path d="M5 13l4 4L19 7M5 7h8M5 19h14"/>',
                    'Dross &amp; Residues',
                    'Industrial Feedstock',
                    'Dross and zinc-bearing residues are handled with attention to recovery efficiency, safe preparation, and consistent batch separation.'
                ],
                [
                    '<path d="M3 12h18M7 8l-4 4 4 4M17 8l4 4-4 4"/>',
                    'Secondary Zinc',
                    'Manufacturing Input',
                    'Recovered metal can support secondary zinc ingot production and other industrial uses where specification, yield, and supply continuity matter.'
                ],
            ];
            foreach($recycling as $i=>$item): ?>
            <div class="cert-full-card reveal reveal-delay-<?php echo min($i%4+1,4); ?>">
                <div class="cert-full-icon">
                    <svg viewBox="0 0 24 24"><?php echo $item[0]; ?></svg>
                </div>
                <div class="cert-full-title"><?php echo $item[1]; ?></div>
                <div style="font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);margin-bottom:10px;"><?php echo $item[2]; ?></div>
                <p class="cert-full-sub"><?php echo $item[3]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ZINC OXIDE MANUFACTURING -->
<section id="zinc-oxide-manufacturing" style="padding:80px 0 120px;background:var(--white);">
    <div class="container">
        <div class="lab-grid">
            <div class="reveal">
                <div class="eyebrow"><span class="label">Zinc Oxide Manufacturing</span></div>
                <h3 style="font-size:2rem;font-weight:400;margin-bottom:1.5rem;">Consistent ZnO for industrial applications</h3>
                <p style="font-size:.95rem;color:var(--text-mid);line-height:1.85;margin-bottom:1.25rem;">BhattiZinc manufactures zinc oxide for buyers who need stable appearance, reliable chemistry, and dependable lot-to-lot supply. Feed selection, controlled conversion, cooling, handling, and packing are managed to protect product consistency.</p>
                <p style="font-size:.95rem;color:var(--text-mid);line-height:1.85;margin-bottom:2rem;">Our zinc oxide is positioned for industrial use in rubber, ceramics, glass, paints, coatings, chemicals, and other applications where controlled zinc content and clean handling are important.</p>
                <a href="zinc-oxide-99-99" class="btn btn--luxury-solid">View Zinc Oxide</a>
            </div>
            <div class="reveal reveal-delay-1">
                <div class="label" style="margin-bottom:24px;color:var(--text-xs);">Manufacturing Focus</div>
                <?php
                $oxide = [
                    ['Feed Selection','Input zinc material is selected for suitability before entering the oxide manufacturing route.'],
                    ['Controlled Conversion','Operating conditions are monitored to support consistent whiteness, purity, and chemical stability.'],
                    ['Cooling &amp; Collection','Product handling is managed to reduce contamination risk and protect powder condition.'],
                    ['Batch Review','Representative samples are checked before release against the agreed product specification.'],
                    ['Industrial Packing','Packing is selected for clean handling, storage, transport, and export documentation requirements.'],
                    ['Buyer Alignment','Grades, documents, packing, and shipment terms are coordinated according to buyer application needs.'],
                ];
                foreach($oxide as $j=>$item): ?>
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

<!-- QUALITY CONTROL -->
<section id="quality-control" style="padding:80px 0 120px;background:var(--warm-white);border-top:1px solid var(--border);">
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:60px;">
            <div class="eyebrow" style="justify-content:center;"><span class="label">Quality Control</span></div>
            <h2 style="max-width:680px;margin:0 auto;">Measured checks before material leaves the facility</h2>
        </div>

        <div class="quality-process-grid">
            <?php
            $qualityChecks = [
                ['Check 01','Incoming Inspection','Material is visually inspected, weighed, identified, and reviewed before it enters the recycling or manufacturing process.'],
                ['Check 02','Process Monitoring','Production teams track operating conditions and batch movement so material identity stays clear during processing.'],
                ['Check 03','Sample Testing','Representative samples are checked for chemistry and physical expectations based on the product being supplied.'],
                ['Check 04','Packing Audit','Packed product is checked for correct grade, weight, labeling, and buyer documentation before dispatch.'],
                ['Check 05','Document Review','Certificates, invoices, packing details, and shipment records are aligned before release to the customer.'],
                ['Check 06','Continuous Improvement','Customer feedback and internal observations are reviewed to improve recovery, consistency, and delivery reliability.'],
            ];
            foreach($qualityChecks as $i=>$check): ?>
            <div class="quality-process-card reveal reveal-delay-<?php echo min($i%3+1,3); ?>">
                <div class="qp-step"><?php echo $check[0]; ?></div>
                <div class="qp-title"><?php echo $check[1]; ?></div>
                <p class="qp-text"><?php echo $check[2]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
