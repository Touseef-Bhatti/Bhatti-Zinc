<?php
$page_title = 'Trade & Export';
include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-inner">
            <div class="page-hero-breadcrumb">
                <a href="index" class="breadcrumb-item">Home</a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-item current">Trade &amp; Export</span>
            </div>
            <h1 class="page-hero-title">Trade &amp; Export<br>Information</h1>
            <p class="page-hero-sub">Everything you need to import BhattiZinc products — Incoterms, documentation, ports of loading, payment terms, and compliance guidance for every market.</p>
        </div>
    </div>
</section>

<!-- TRADE INTRO -->
<section class="trade-section">
    <div class="container">

        <div class="trade-intro-grid">
            <div class="reveal">
                <div class="eyebrow"><span class="label">Why Trade With Us</span></div>
                <h2 style="font-size:clamp(2rem,3vw,3rem);margin-bottom:1.5rem;">A supply chain<br>partner, not just<br>a supplier</h2>
                <div class="trade-intro-text">
                    <p>BhattiZinc has been exporting zinc products internationally since 2001. Over more than two decades, we have built robust logistics networks, refined our export documentation processes, and cultivated deep relationships with freight forwarders, customs agents, and inspection bodies worldwide.</p>
                    <p>We understand that international zinc procurement involves more than price — lead times, port availability, REACH and customs compliance, documentary requirements, and credit terms all matter. Our trade team is equipped to handle every aspect of the export process on your behalf.</p>
                    <p>From first inquiry to cargo arrival, BhattiZinc provides a single point of contact, full visibility on shipment status, and comprehensive documentation for every consignment.</p>
                </div>
            </div>
            <div class="reveal reveal-delay-2" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;align-content:start;">
                <?php
                $highlights = [
                    ['25+','Years of Trade Experience'],
                    ['45+','Export Destinations'],
                    ['3+','Shipments Weekly'],
                    ['24h','Quote Response Time'],
                    ['100%','Documentation Accuracy'],
                    ['ISO','9001:2015 Certified'],
                ];
                foreach($highlights as $i=>$h): ?>
                <div style="background:var(--cream);border:1px solid var(--border);border-radius:var(--radius-lg);padding:28px 24px;transition:border-color .25s;" class="reveal reveal-delay-<?php echo min($i%2+1,2); ?>">
                    <div style="font-family:var(--font-display);font-size:2rem;font-weight:300;color:var(--black);line-height:1;margin-bottom:6px;"><?php echo $h[0]; ?></div>
                    <div style="font-family:var(--font-label);font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--text-xs);"><?php echo $h[1]; ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Trade Capability Cards -->
        <div class="trade-cards-grid">
            <?php
            $tradeCards = [
                [
                    '<path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>',
                    'Export Documentation',
                    'We provide a complete documentation package with every shipment: Commercial Invoice, Packing List, Bill of Lading, Certificate of Origin (CoO), Certificate of Analysis (CoA), SGS Inspection Report, Fumigation Certificate, and MSDS.'
                ],
                [
                    '<path d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>',
                    'Payment Terms',
                    'We accept Irrevocable Letter of Credit (L/C) at sight, Telegraphic Transfer (T/T) with 30% advance and balance against copy BL, and Document Against Payment (D/P). Payment terms are negotiable for established trade partners.'
                ],
                [
                    '<path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>',
                    'Logistics &amp; Freight',
                    'We work with leading freight forwarders to offer competitive rates on FCL and LCL shipments from Karachi and Port Qasim. Regular sailings to Jebel Ali, Singapore, Rotterdam, Colombo, Mombasa, and beyond.'
                ],
                [
                    '<path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                    'Compliance &amp; Certifications',
                    'All BhattiZinc products meet REACH regulation requirements for EU import. We supply Safety Data Sheets (SDS/MSDS), third-party inspection reports, and country-specific compliance documentation upon request.'
                ],
                [
                    '<path d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>',
                    'Port &amp; Shipping',
                    'Primary loading ports: Karachi Port Trust (KPT) and Port Muhammad Bin Qasim. Container types: 20ft GP, 40ft GP, 40ft HC. Transit times: UAE 5–7 days, Southeast Asia 12–18 days, Europe 20–28 days.'
                ],
                [
                    '<path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>',
                    'Trade Finance',
                    'BhattiZinc is registered with leading Pakistani and international banks for trade finance facilities. We can assist buyers with structured payment solutions, including deferred payment options for qualified buyers.'
                ],
            ];
            foreach($tradeCards as $i=>$card): ?>
            <div class="trade-card reveal reveal-delay-<?php echo min($i%3+1,3); ?>">
                <div class="trade-card-icon">
                    <svg viewBox="0 0 24 24"><?php echo $card[0]; ?></svg>
                </div>
                <div class="trade-card-title"><?php echo $card[1]; ?></div>
                <p class="trade-card-text"><?php echo $card[2]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- INCOTERMS -->
<section class="incoterms-section">
    <div class="container">
        <div class="reveal" style="margin-bottom:0;">
            <div class="eyebrow"><span class="label">Incoterms 2020</span></div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;margin-bottom:0;">
                <h3 style="font-size:2rem;font-weight:400;">Flexible terms for<br>every trade route</h3>
                <p style="font-size:.9rem;color:var(--text-mid);line-height:1.8;">We operate under all standard Incoterms 2020 rules. The table below outlines the terms most commonly used by our international clients. Our trade team will recommend the most cost-effective terms based on your destination and logistics capability.</p>
            </div>
        </div>

        <div class="incoterms-grid" style="margin-top:40px;">
            <?php
            $incoterms = [
                ['EXW','Ex Works','Buyer collects from our Gujranwala facility. Buyer assumes all costs and risk from factory gate.'],
                ['FCA','Free Carrier','BhattiZinc delivers goods to a named carrier at our facility or a nominated point in Pakistan.'],
                ['FOB','Free On Board','Most common export term. BhattiZinc loads cargo on vessel at Karachi or Port Qasim.'],
                ['CFR','Cost &amp; Freight','BhattiZinc covers ocean freight to destination port. Buyer covers insurance and import duties.'],
                ['CIF','Cost, Insurance &amp; Freight','BhattiZinc covers ocean freight and cargo insurance to destination port. Popular for first-time buyers.'],
                ['CPT','Carriage Paid To','BhattiZinc pays freight to named destination. Risk transfers to buyer on handover to first carrier.'],
                ['CIP','Carriage &amp; Ins. Paid','BhattiZinc pays freight and enhanced insurance to destination. Recommended for high-value orders.'],
                ['DAP','Delivered at Place','BhattiZinc delivers to named destination, unloaded. Buyer handles import clearance only.'],
                ['DDP','Delivered Duty Paid','All-inclusive: BhattiZinc handles freight, insurance, and import duties to buyer\'s door.'],
                ['DPU','Delivered at Place Unloaded','BhattiZinc delivers and unloads at named destination. Buyer handles import clearance.'],
            ];
            foreach($incoterms as $i=>$it): ?>
            <div class="incoterm-badge reveal reveal-delay-<?php echo min($i%5+1,4); ?>">
                <div class="incoterm-code"><?php echo $it[0]; ?></div>
                <div class="incoterm-name" style="font-size:.72rem;font-weight:600;margin-bottom:8px;color:var(--text-mid);"><?php echo $it[1]; ?></div>
                <div class="incoterm-name"><?php echo $it[2]; ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- DOCUMENTATION -->
<section style="padding:80px 0 120px;background:var(--white);">
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:60px;">
            <div class="eyebrow" style="justify-content:center;"><span class="label">Export Documents</span></div>
            <h2 style="max-width:600px;margin:0 auto;">Complete documentation<br>with every shipment</h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:2px;background:var(--border);border:1px solid var(--border);border-radius:var(--radius-lg);overflow:hidden;">
            <?php
            $docs = [
                ['Commercial Invoice','Itemised invoice in USD/EUR as required, with HS codes and country of origin declaration.'],
                ['Packing List','Detailed packing list with gross/net weights, number of pallets/bags, and container seal numbers.'],
                ['Bill of Lading','Original negotiable B/L or Seaway Bill as required. Express BL available on request.'],
                ['Certificate of Origin','Form A (GSP), Non-Preferential CoO, or specific bilateral CoO issued by TDAP/FPCCI Pakistan.'],
                ['Certificate of Analysis','Full spectrometric CoA from our ISO-accredited laboratory for every production batch shipped.'],
                ['SGS Inspection Report','Third-party pre-shipment inspection and weight survey certificate from SGS Pakistan.'],
                ['Fumigation Certificate','ISPM-15 fumigation certificate for all wooden pallets, required for most markets.'],
                ['MSDS / SDS','Material Safety Data Sheet in GHS format, in English and additional languages on request.'],
            ];
            foreach($docs as $i=>$doc): ?>
            <div style="background:var(--white);padding:36px 28px;border-right:1px solid var(--border-light);transition:background .25s;" class="reveal reveal-delay-<?php echo min($i%4+1,4); ?>">
                <div style="width:36px;height:36px;background:var(--gold-pale);border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                    <svg viewBox="0 0 24 24" style="width:16px;height:16px;stroke:var(--gold-dark);fill:none;stroke-width:1.5;"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <div style="font-family:var(--font-display);font-size:1rem;font-weight:500;margin-bottom:10px;color:var(--black);"><?php echo $doc[0]; ?></div>
                <p style="font-size:.8rem;color:var(--text-sm);line-height:1.65;"><?php echo $doc[1]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- MARKETS / PORTS TABLE -->
<section style="padding:80px 0;background:var(--cream);border-top:1px solid var(--border);">
    <div class="container">
        <div class="reveal" style="margin-bottom:48px;">
            <div class="eyebrow"><span class="label">Shipping Routes</span></div>
            <h3 style="font-size:2rem;font-weight:400;max-width:500px;">Major routes &amp;<br>transit times</h3>
        </div>
        <div style="overflow-x:auto;" class="reveal">
            <table style="width:100%;border-collapse:collapse;background:var(--white);border-radius:var(--radius-lg);overflow:hidden;border:1px solid var(--border);">
                <thead>
                    <tr style="background:var(--surface);">
                        <th style="padding:14px 20px;text-align:left;font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--text-sm);border-bottom:1px solid var(--border);">Region</th>
                        <th style="padding:14px 20px;text-align:left;font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--text-sm);border-bottom:1px solid var(--border);">Destination Port</th>
                        <th style="padding:14px 20px;text-align:left;font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--text-sm);border-bottom:1px solid var(--border);">Transit Time</th>
                        <th style="padding:14px 20px;text-align:left;font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--text-sm);border-bottom:1px solid var(--border);">Departures</th>
                        <th style="padding:14px 20px;text-align:left;font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--text-sm);border-bottom:1px solid var(--border);">Common Incoterms</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $routes = [
                        ['Middle East','Jebel Ali (Dubai)','5–7 days','3× weekly','FOB / CIF / DAP'],
                        ['Middle East','Dammam / Jubail','7–10 days','2× weekly','FOB / CFR'],
                        ['South Asia','Chittagong, Bangladesh','4–6 days','Weekly','FOB / CFR / CIF'],
                        ['South Asia','Colombo, Sri Lanka','3–5 days','Weekly','FOB / CFR'],
                        ['Southeast Asia','Singapore','10–14 days','Weekly','FOB / CFR / CIF'],
                        ['Southeast Asia','Port Klang, Malaysia','12–16 days','Weekly','FOB / CFR'],
                        ['Southeast Asia','Ho Chi Minh City','14–18 days','Weekly','FOB / CFR'],
                        ['Africa','Mombasa, Kenya','18–22 days','Bi-weekly','FOB / CFR'],
                        ['Africa','Lagos, Nigeria','20–25 days','Bi-weekly','FOB / CIF'],
                        ['Europe','Rotterdam, Netherlands','20–28 days','Weekly','FOB / CFR / CIF / DAP'],
                        ['Europe','Piraeus, Greece','18–24 days','Weekly','FOB / CFR / CIF'],
                    ];
                    foreach($routes as $i=>$route): ?>
                    <tr style="border-bottom:1px solid var(--border-light);transition:background .15s;" onmouseover="this.style.background='var(--cream)'" onmouseout="this.style.background=''">
                        <td style="padding:13px 20px;font-family:var(--font-label);font-size:.65rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--gold-dark);"><?php echo $route[0]; ?></td>
                        <td style="padding:13px 20px;font-size:.85rem;color:var(--text);font-weight:500;"><?php echo $route[1]; ?></td>
                        <td style="padding:13px 20px;font-size:.85rem;color:var(--text-mid);"><?php echo $route[2]; ?></td>
                        <td style="padding:13px 20px;font-size:.82rem;color:var(--text-sm);"><?php echo $route[3]; ?></td>
                        <td style="padding:13px 20px;font-family:var(--font-label);font-size:.68rem;font-weight:500;letter-spacing:.06em;color:var(--text-mid);"><?php echo $route[4]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p style="font-size:.75rem;color:var(--text-xs);margin-top:12px;">* Transit times are indicative and subject to carrier schedules and port congestion. Contact our logistics team for confirmed schedules.</p>
    </div>
</section>

<!-- HS CODES -->
<section style="padding:80px 0;background:var(--white);border-top:1px solid var(--border);">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 2fr;gap:80px;align-items:start;">
            <div class="reveal">
                <div class="eyebrow"><span class="label">HS Codes</span></div>
                <h3 style="font-size:2rem;font-weight:400;margin-bottom:1rem;">Harmonised Tariff Classification</h3>
                <p style="font-size:.88rem;color:var(--text-mid);line-height:1.8;">All BhattiZinc products are shipped under standard international HS codes. Local import classification may differ; we recommend confirming applicable duties with your customs broker.</p>
            </div>
            <div class="reveal reveal-delay-1" style="overflow-x:auto;">
                <table style="width:100%;border-collapse:collapse;border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;">
                    <thead>
                        <tr style="background:var(--surface);">
                            <th style="padding:12px 20px;text-align:left;font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--text-sm);border-bottom:1px solid var(--border);">Product</th>
                            <th style="padding:12px 20px;text-align:left;font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--text-sm);border-bottom:1px solid var(--border);">HS Code</th>
                            <th style="padding:12px 20px;text-align:left;font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--text-sm);border-bottom:1px solid var(--border);">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $hsCodes = [
                            ['SHG Zinc / Zinc Ingots','7901.11','Zinc, not alloyed, containing by weight >= 99.99% of zinc'],
                            ['Standard Zinc Ingots','7901.12','Zinc, not alloyed, containing by weight < 99.99% of zinc'],
                            ['Zinc Alloys','7901.20','Zinc alloys'],
                            ['Zinc Oxide','2817.00','Zinc oxide; zinc peroxide'],
                            ['Zinc Dust','7903.10','Zinc dust'],
                            ['Zinc Powder','7903.90','Zinc powders and flakes, other'],
                            ['Zinc Sulfate','2833.29','Sulfates of other metals (zinc sulfate)'],
                            ['Zinc Sheets/Plates','7904.00','Zinc bars, rods, profiles and wire'],
                            ['Zinc Sheets & Strip','7905.00','Zinc plates, sheets, strip and foil'],
                            ['Zinc Wire','7904.00','Zinc bars, rods, profiles and wire'],
                        ];
                        foreach($hsCodes as $hs): ?>
                        <tr style="border-bottom:1px solid var(--border-light);">
                            <td style="padding:12px 20px;font-size:.85rem;color:var(--text);"><?php echo $hs[0]; ?></td>
                            <td style="padding:12px 20px;font-family:var(--font-label);font-size:.8rem;font-weight:700;letter-spacing:.06em;color:var(--gold-dark);"><?php echo $hs[1]; ?></td>
                            <td style="padding:12px 20px;font-size:.78rem;color:var(--text-sm);line-height:1.5;"><?php echo $hs[2]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
