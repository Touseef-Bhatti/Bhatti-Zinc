<?php
$page_title = 'About Us';
include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-inner">
            <div class="page-hero-breadcrumb">
                <a href="index" class="breadcrumb-item">Home</a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-item current">About</span>
            </div>
            <h1 class="page-hero-title">Built on precision,<br>driven by quality</h1>
            <p class="page-hero-sub" id="about-typewriter-text" data-text="Three decades of zinc expertise, refined through commitment to international standards and a passion for metallurgical excellence."></p>
            <style>
                #about-typewriter-text::after {
                    content: '|';
                    animation: blink 0.8s infinite;
                    color: var(--zinc-light);
                }
                @keyframes blink {
                    0%, 100% { opacity: 1; }
                    50% { opacity: 0; }
                }
            </style>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const el = document.getElementById('about-typewriter-text');
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
        </div>
    </div>
</section>

<!-- ABOUT STORY -->
<section class="about-section" id="history">
    <div class="container">
        <div class="about-grid">

            <div class="about-story">
                <div class="eyebrow reveal">
                    <span class="label">Our Story</span>
                </div>
                <h2 class="reveal" style="margin-bottom:2rem;">From Pakistan to<br>the world</h2>

                <div class="about-story-text reveal">
                    <p>Building strength in the zinc industry since 1998, BhattiZinc began as a local trading business in Gujranwala and has since transformed into a trusted manufacturer, importer, exporter, and supplier of premium zinc products for national and international markets.</p>
                    <p>Under the leadership of our Director, Asees Bhatti, BhattiZinc has grown on a foundation of quality, transparency and long-term partnerships. Our focus on reliable supply, competitive pricing and consistent product purity has helped us build durable relationships with galvanizers, die-casters, chemical manufacturers and construction companies worldwide.</p>
                    <p>We are committed to sustainable recycling, modern smelting practices and international compliance. Our certifications and documented quality systems ensure every shipment is accompanied by full Certificates of Analysis and the documentation required by importers across multiple continents.</p>
                    <p>At BhattiZinc we believe progress is powered by integrity — from local roots to global reach, powered by trust, quality and consistency.</p>
                </div>

                <!-- Timeline -->
                <div class="timeline" style="margin-top:60px;">
                    <div class="timeline-item reveal">
                        <div class="timeline-year">1998</div>
                        <div class="timeline-title">Foundation</div>
                        <p class="timeline-text">The business began in Gujranwala as Bhatti Traders, a Bhatti family company founded by M Ashraf Bhatti with zinc trading as its first line of work. Bhatti Traders remains the parent company behind BhattiZinc.</p>
                    </div>
                    <div class="timeline-item reveal reveal-delay-1">
                        <div class="timeline-year">2001</div>
                        <div class="timeline-title">Product Expansion</div>
                        <p class="timeline-text">Added our first zinc smelting furnace, marking the company's first step from zinc trading toward in-house production.</p>
                    </div>
                    <div class="timeline-item reveal reveal-delay-2">
                        <div class="timeline-year">2002</div>
                        <div class="timeline-title">ISO 9001 Certification</div>
                        <p class="timeline-text">Expanded the business across Pakistan and added more zinc furnaces to support growing customer demand.</p>
                    </div>
                    <div class="timeline-item reveal reveal-delay-3">
                        <div class="timeline-year">2008</div>
                        <div class="timeline-title">LME Registration</div>
                        <p class="timeline-text">BhattiZinc SHG Zinc registered as an approved brand on the London Metal Exchange — recognition of our consistent 99.995% purity standard.</p>
                    </div>
                    <div class="timeline-item reveal reveal-delay-4">
                        <div class="timeline-year">2012</div>
                        <div class="timeline-title">European Market Entry</div>
                        <p class="timeline-text">Achieved REACH compliance and established distribution partnerships across Turkey, Greece, and the Netherlands.</p>
                    </div>
                    <div class="timeline-item reveal">
                        <div class="timeline-year">2018</div>
                        <div class="timeline-title">Capacity Expansion</div>
                        <p class="timeline-text">Completion of Phase III expansion, bringing total annual capacity to 60,000+ MT and adding zinc alloy and zinc sheet production.</p>
                    </div>
                    <div class="timeline-item reveal">
                        <div class="timeline-year">Present</div>
                        <div class="timeline-title">Global Leader</div>
                        <p class="timeline-text">Exporting to 45+ countries with 500+ active trade partners, maintaining a portfolio of eight product families across primary metals, chemicals, and rolled products.</p>
                    </div>
                </div>
            </div>

            <div class="about-image-stack reveal reveal-delay-2">
                <div class="about-img-main">
                    <img src="assets/images/site/asees.png" alt="Asees Bhatti, Director of BhattiZinc" loading="lazy">
                </div>
                <div class="about-img-caption">Asees Bhatti | Director</div>
            </div>
        </div>
    </div>
</section>

<!-- MISSION, VISION, VALUES -->
<section style="padding:80px 0;background:var(--warm-white);border-top:1px solid var(--border);">
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:60px;">
            <div class="eyebrow" style="justify-content:center;"><span class="label">Our Foundation</span></div>
            <h2>Purpose, vision &amp; values</h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2px;background:var(--border);border:1px solid var(--border);border-radius:var(--radius-lg);overflow:hidden;">
            <div style="background:var(--white);padding:48px 40px;" class="reveal">
                <div class="label" style="margin-bottom:16px;color:var(--gold);">Mission</div>
                <h3 style="font-size:1.5rem;margin-bottom:16px;font-weight:400;">To be the trusted<br>zinc partner</h3>
                <p style="font-size:0.88rem;color:var(--text-mid);line-height:1.8;">To supply industries worldwide with zinc products of the highest purity, consistency and reliability, backed by transparent documentation and responsive service.</p>
            </div>
            <div style="background:var(--cream);padding:48px 40px;" class="reveal reveal-delay-1">
                <div class="label" style="margin-bottom:16px;color:var(--gold);">Vision</div>
                <h3 style="font-size:1.5rem;margin-bottom:16px;font-weight:400;">A world-class<br>zinc producer</h3>
                <p style="font-size:0.88rem;color:var(--text-mid);line-height:1.8;">To rank among the world's most respected zinc producers, recognised for technological innovation, environmental stewardship, and sustainable growth.</p>
            </div>
            <div style="background:var(--white);padding:48px 40px;" class="reveal reveal-delay-2">
                <div class="label" style="margin-bottom:16px;color:var(--gold);">Values</div>
                <h3 style="font-size:1.5rem;margin-bottom:16px;font-weight:400;">Integrity in<br>every ingot</h3>
                <p style="font-size:0.88rem;color:var(--text-mid);line-height:1.8;">Quality without compromise. Transparency in trade. Respect for people and the environment. These principles govern every decision from furnace to freight.</p>
            </div>
        </div>
    </div>
</section>

<!-- FACILITIES -->
<section class="facility-section">
    <div class="container">
        <div class="facility-grid">
            <div class="facility-copy reveal">
                <div class="eyebrow"><span class="label">Our Facility</span></div>
                <h2>18 acres of<br>precision manufacturing</h2>
                <p>Our Gujranwala facility combines modern electrolytic refining technology with rigorous quality control infrastructure. The plant operates 24 hours a day, 363 days a year, with redundant systems ensuring uninterrupted production schedules for our global clients.</p>
                <p style="font-size:0.95rem;color:var(--text-mid);line-height:1.85;margin-bottom:2.5rem;">We operate dedicated production lines for each product family — primary metals, oxide, dust, alloys, sheets, and wire — each with independent quality checkpoints, preventing cross-contamination and ensuring specification integrity.</p>
                <div class="facility-facts">
                    <?php
                    $facts = [
                        ['18 Acres','Facility Area'],
                        ['60,000+ MT','Annual Capacity'],
                        ['300+','Skilled Employees'],
                        ['24/7','Production Operations'],
                        ['12+','QC Parameters per Batch'],
                        ['8','Dedicated Production Lines'],
                    ];
                    foreach($facts as $i=>$fact): ?>
                    <div class="key-fact reveal reveal-delay-<?php echo min($i+1,4); ?>">
                        <div class="key-fact-label"><?php echo $fact[1]; ?></div>
                        <div class="key-fact-value facility-fact-value"><?php echo $fact[0]; ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="facility-mark reveal reveal-delay-2">
                <span>BZ</span>
            </div>
        </div>
    </div>
</section>

<!-- TEAM -->
<section class="team-section">
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:0;">
            <div class="eyebrow" style="justify-content:center;"><span class="label">Leadership</span></div>
            <h2>The people behind<br>every shipment</h2>
        </div>
        <div class="team-grid">
            <?php
            $team = [
                ['M Ashraf Bhatti','Founder &amp; Chairman','With over 35 years in zinc metallurgy, Mr. Asharf Bhatti founded BhattiZinc with a singular conviction: that quality is not negotiable in international trade.','AB'],
                ['Kamran Bhatti','Chief Executive Officer','Kamran joined BhattiZinc in 2005 and led the company through its most significant period of international expansion, including LME registration and European market entry.','KB'],
                ['Dr. Nadia Hussain','Head of Quality &amp; Metallurgy','A PhD metallurgist from NED University, Dr. Hussain oversees all quality systems, spectrometric laboratory operations, and R&D for new alloy grades.','NH'],
                ['Tariq Mehmood','Director of Export Operations','With 20 years in zinc trade, Mr. Mehmood manages all international accounts, logistics, and trade documentation across four continents.','TM'],
                ['Sana Ansari','Finance &amp; Compliance Director','A chartered accountant specialising in international trade finance, Ms. Ansari manages Letters of Credit, trade finance facilities, and regulatory compliance.','SA'],
                ['Bilal Qureshi','Plant &amp; Production Manager','Mr. Qureshi oversees day-to-day refinery operations, production scheduling, and maintenance of all processing equipment.','BQ'],
            ];
            foreach($team as $i=>$member): ?>
            <div class="team-card reveal reveal-delay-<?php echo min($i%3+1,3); ?>">
                <div class="team-card-photo">
                    <div class="team-photo-placeholder"><?php echo $member[3]; ?></div>
                </div>
                <div class="team-card-body">
                    <div class="team-card-name"><?php echo $member[0]; ?></div>
                    <div class="team-card-title"><?php echo $member[1]; ?></div>
                    <p class="team-card-bio"><?php echo $member[2]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- DIRECTOR MESSAGE -->
<section style="padding:60px 0;background:var(--warm-white);border-top:1px solid var(--border);">
    <div class="container">
        <div class="text-center reveal" style="margin-bottom:24px;">
            <div class="eyebrow" style="justify-content:center;"><span class="label">Director's Message</span></div>
            <h3 style="max-width:800px;margin:0 auto;font-weight:400;">"At BhattiZinc, we believe success is built on consistency, honesty, and long-term relationships."</h3>
        </div>
        <div style="max-width:900px;margin:0 auto;color:var(--text-mid);line-height:1.8;">
            <p>Our goal is not just to supply zinc products, but to become a dependable partner in our clients' growth. Every product we deliver represents our commitment to quality and our promise of reliability. We are proud to serve industries in Pakistan and around the world with dedication and integrity.</p>
            <p style="margin-top:1rem;font-weight:600;">— Asees Bhatti<br><span style="font-weight:400;font-size:.95rem;color:var(--text-sm);">Director, BhattiZinc</span></p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
