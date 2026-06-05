<?php
$page_title = 'Contact Us';

// Handle form submission
$success = false;
$errors  = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $company = trim($_POST['company'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $country = trim($_POST['country'] ?? '');
    $product = trim($_POST['product'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name))    $errors[] = 'Full name is required.';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email address is required.';
    if (empty($message)) $errors[] = 'Message is required.';

    if (empty($errors)) {
        // In production: send email via mail() or SMTP library
        $success = true;
    }
}

include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-inner">
            <div class="page-hero-breadcrumb">
                <a href="index.php" class="breadcrumb-item">Home</a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-item current">Contact</span>
            </div>
            <h1 class="page-hero-title">Let's discuss<br>your zinc needs</h1>
            <p class="page-hero-sub">Our trade and technical team is ready to assist with quotations, product specifications, samples, and logistical questions. We respond within one business day.</p>
        </div>
    </div>
</section>

<!-- CONTACT MAIN -->
<section class="contact-section" id="inquiry">
    <div class="container">
        <div class="contact-grid">

            <!-- Info -->
            <div class="reveal">
                <h2 class="contact-info-title">Get in touch</h2>
                <p class="contact-info-sub">Whether you are a first-time buyer or a long-standing partner, use the form to reach us. We also welcome direct calls and emails to the contacts below.</p>

                <!-- Head Office -->
                <div class="contact-office">
                    <div class="contact-office-name">Head Office &amp; Factory — Gujranwala</div>
                    <address class="contact-office-address">
                        BhattiZinc Industries (Pvt) Ltd.<br>
                        Plot 14-B, Industrial Estate, Main G.T Road<br>
                        Gujranwala, Punjab 54000 — Pakistan
                    </address>
                        <div class="contact-office-contact">
                            <a href="tel:+923094530100">+92 309 4530100 — Call / WhatsApp</a>
                            <a href="mailto:info@bhattizinc.com">info@bhattizinc.com</a>
                        </div>
                </div>

                <!-- Dubai Office -->
                <div class="contact-office">
                    <div class="contact-office-name">Representative Office — Dubai, UAE</div>
                    <address class="contact-office-address">
                        BhattiZinc Middle East<br>
                        Office 412, Business Bay,<br>
                        Dubai — United Arab Emirates
                    </address>
                    <div class="contact-office-contact">
                        <a href="tel:+97143001234">+971 4 300 1234</a>
                        <a href="mailto:middleeast@bhattizinc.com">middleeast@bhattizinc.com</a>
                    </div>
                </div>

                <!-- Working Hours -->
                <div style="padding:24px;background:var(--cream);border-radius:var(--radius);border:1px solid var(--border-light);margin-bottom:0;">
                    <div class="contact-office-name">Business Hours</div>
                    <div style="display:flex;flex-direction:column;gap:8px;margin-top:8px;">
                        <?php
                        $hours = [
                            ['Monday – Saturday', '09:00 – 18:00'],
                            ['Sunday', 'Closed (Appointments available on request)'],
                        ];
                        foreach($hours as $h): ?>
                        <div style="display:flex;justify-content:space-between;align-items:center;font-size:.85rem;padding:8px 0;border-bottom:1px solid var(--border-light);">
                            <span style="color:var(--text-mid);"><?php echo $h[0]; ?></span>
                            <span style="font-family:var(--font-label);font-size:.72rem;font-weight:600;letter-spacing:.08em;color:var(--text);"><?php echo $h[1]; ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <p style="font-size:.75rem;color:var(--text-xs);margin-top:12px;line-height:1.6;">Enquiries received outside business hours are actioned the following morning. Urgent shipment matters: please call the export desk directly.</p>
                </div>
            </div>

            <!-- Form -->
            <div class="reveal reveal-delay-1">
                <?php if($success): ?>
                <div style="background:#f0f9ec;border:1px solid #c3e6cb;border-radius:var(--radius-lg);padding:40px;text-align:center;">
                    <div style="width:60px;height:60px;background:#d4edda;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
                        <svg viewBox="0 0 24 24" style="width:28px;height:28px;stroke:#155724;fill:none;stroke-width:2;"><path d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <h3 style="font-size:1.8rem;font-weight:400;color:var(--black);margin-bottom:12px;">Inquiry Received</h3>
                    <p style="font-size:.9rem;color:var(--text-mid);line-height:1.8;max-width:420px;margin:0 auto 24px;">Thank you, <?php echo htmlspecialchars($name); ?>. We have received your enquiry and a member of our trade team will respond within one business day.</p>
                    <a href="index.php" class="btn btn--gold">Return to Homepage</a>
                </div>
                <?php else: ?>
                <div class="form-card">
                    <?php if(!empty($errors)): ?>
                    <div style="background:#fff8f0;border:1px solid #fcd9a8;border-radius:var(--radius);padding:16px 20px;margin-bottom:24px;">
                        <?php foreach($errors as $err): ?>
                        <p style="font-size:.82rem;color:#7c4a03;margin:4px 0;"><?php echo htmlspecialchars($err); ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div style="margin-bottom:28px;">
                        <h3 style="font-size:1.5rem;font-weight:400;margin-bottom:6px;">Send an Enquiry</h3>
                        <p style="font-size:.82rem;color:var(--text-sm);">For quotations, samples, trade terms, and general questions. Fields marked <span style="color:var(--gold);">*</span> are required.</p>
                    </div>

                    <form method="POST" action="contact.php#inquiry" data-validate id="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="name">Full Name <span style="color:var(--gold);">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Your full name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="company">Company</label>
                                <input type="text" id="company" name="company" class="form-control" placeholder="Company name" value="<?php echo htmlspecialchars($_POST['company'] ?? ''); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address <span style="color:var(--gold);">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="email@company.com" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone / WhatsApp</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="+1 234 567 8900" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="country">Country <span style="color:var(--gold);">*</span></label>
                                <input type="text" id="country" name="country" class="form-control" placeholder="Your country" value="<?php echo htmlspecialchars($_POST['country'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="product">Product of Interest</label>
                                <select id="product" name="product" class="form-control">
                                    <option value="">— Select product —</option>
                                    <option <?php echo (($_POST['product']??'')==='Special High Grade Zinc'?'selected':''); ?>>Special High Grade Zinc</option>
                                    <option <?php echo (($_POST['product']??'')==='Zinc Oxide'?'selected':''); ?>>Zinc Oxide</option>
                                    <option <?php echo (($_POST['product']??'')==='Zinc Ingots'?'selected':''); ?>>Zinc Ingots</option>
                                    <option <?php echo (($_POST['product']??'')==='Zinc Alloys'?'selected':''); ?>>Zinc Alloys</option>
                                    <option <?php echo (($_POST['product']??'')==='Zinc Dust'?'selected':''); ?>>Zinc Dust</option>
                                    <option <?php echo (($_POST['product']??'')==='Zinc Sulfate'?'selected':''); ?>>Zinc Sulfate</option>
                                    <option <?php echo (($_POST['product']??'')==='Zinc Sheets & Coils'?'selected':''); ?>>Zinc Sheets &amp; Coils</option>
                                    <option <?php echo (($_POST['product']??'')==='Zinc Wire'?'selected':''); ?>>Zinc Wire</option>
                                    <option value="Multiple">Multiple Products</option>
                                    <option value="Other">Other / General</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="subject">Enquiry Type</label>
                                <select id="subject" name="subject" class="form-control">
                                    <option value="quote">Price Quotation</option>
                                    <option value="sample">Sample Request</option>
                                    <option value="technical">Technical Specification</option>
                                    <option value="trade">Trade Terms &amp; Logistics</option>
                                    <option value="quality">Quality &amp; Certificates</option>
                                    <option value="partnership">Trade Partnership</option>
                                    <option value="other">General Enquiry</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="quantity">Estimated Quantity</label>
                                <input type="text" id="quantity" name="quantity" class="form-control" placeholder="e.g. 20 MT, 1 FCL, 500 kg" value="<?php echo htmlspecialchars($_POST['quantity'] ?? ''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="message">Message <span style="color:var(--gold);">*</span></label>
                            <textarea id="message" name="message" class="form-control" rows="5" placeholder="Describe your requirements, destination port, preferred Incoterms, delivery timeline, or any questions..." required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                        </div>
                        <div class="form-submit-row">
                            <span class="form-disclaimer">Your information is kept strictly confidential and used only to respond to your enquiry. We do not share data with third parties.</span>
                            <button type="submit" class="btn btn--gold">Send Enquiry</button>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<!-- QUICK CONTACT STRIP -->
<section style="padding:0;background:var(--warm-white);border-top:1px solid var(--border);">
    <div class="container">
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:0;background:var(--border);" class="reveal">
            <?php
            $quickContacts = [
                ['Export Sales','For pricing, quotations and new order placement.','export@bhattizinc.com','+92 309 4530100'],
                ['Technical','Product specifications, CoA requests and grade selection.','technical@bhattizinc.com','+92 309 4530100'],
                ['Logistics','Shipping schedules, documentation and tracking.','logistics@bhattizinc.com','+92 309 4530100'],
                ['Finance','Payment terms, L/C, and trade finance queries.','finance@bhattizinc.com','+92 309 4530100'],
            ];
            foreach($quickContacts as $i=>$qc): ?>
            <div style="background:var(--white);padding:36px 28px;border-right:1px solid var(--border-light);">
                <div style="font-family:var(--font-label);font-size:.62rem;font-weight:600;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:10px;"><?php echo $qc[0]; ?></div>
                <p style="font-size:.8rem;color:var(--text-sm);line-height:1.6;margin-bottom:14px;"><?php echo $qc[1]; ?></p>
                <a href="mailto:<?php echo $qc[2]; ?>" style="display:block;font-size:.82rem;color:var(--text);margin-bottom:4px;transition:color .15s;" onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='var(--text)'"><?php echo $qc[2]; ?></a>
                <a href="tel:<?php echo preg_replace('/\s/','',$qc[3]); ?>" style="font-family:var(--font-label);font-size:.72rem;letter-spacing:.08em;color:var(--text-sm);transition:color .15s;" onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='var(--text-sm)'"><?php echo $qc[3]; ?></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- MAP PLACEHOLDER -->
<section style="padding:80px 0 120px;background:var(--white);">
    <div class="container">
        <div class="reveal" style="margin-bottom:32px;">
            <div class="eyebrow"><span class="label">Find Us</span></div>
            <h3 style="font-size:2rem;font-weight:400;">Our Location</h3>
        </div>
        <div style="border-radius:var(--radius-lg);overflow:hidden;border:1px solid var(--border);height:400px;background:var(--surface);position:relative;" class="reveal">
            <iframe src="https://maps.google.com/maps?q=BhattiZinc+Industries,+Plot+14-B,+Industrial+Estate,+Main+G.T+Road,+Gujranwala,+Punjab+54000,+Pakistan&t=&z=14&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<!-- FAQ QUICK -->
<section style="padding:80px 0;background:var(--cream);border-top:1px solid var(--border);">
    <div class="container">
        <div class="reveal" style="margin-bottom:48px;">
            <div class="eyebrow"><span class="label">Common Questions</span></div>
            <h3 style="font-size:2rem;font-weight:400;">Frequently Asked</h3>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
            <?php
            $faqs = [
                ['What is your minimum order quantity?','MOQ varies by product. For SHG Zinc ingots, the minimum is typically 1 MT (one pallet). For chemical products like Zinc Oxide, minimum orders start from 1,000 kg. Contact us for specific MOQs per product.'],
                ['How long does shipping take to my country?','Transit times depend on your destination port. Middle East: 5–10 days; Southeast Asia: 10–18 days; Africa: 18–25 days; Europe: 20–28 days from Karachi. See our Trade page for a full route table.'],
                ['What payment methods do you accept?','We accept Irrevocable L/C at sight, T/T (30% advance, balance against copy BL), and D/P terms. Payment terms can be discussed for established relationships.'],
                ['Can you provide product samples?','Yes. Samples of most products (50–500 g) are available for qualified buyers. Courier charges are borne by the buyer. Submit a sample request via the contact form above.'],
                ['Are your products REACH compliant?','Yes. All BhattiZinc products meet REACH regulation (EC 1907/2006) requirements. Safety Data Sheets and REACH registration numbers are available on request.'],
                ['Can you supply custom alloy grades?','Yes. We offer custom zinc alloy formulations based on customer specifications. Minimum quantities apply for custom alloy production. Contact our technical team for a feasibility review.'],
            ];
            foreach($faqs as $i=>$faq): ?>
            <div style="background:var(--white);border:1px solid var(--border);border-radius:var(--radius);padding:28px 24px;transition:border-color .25s,box-shadow .25s;" class="reveal reveal-delay-<?php echo min($i%2+1,2); ?>" onmouseover="this.style.borderColor='var(--gold-light)';this.style.boxShadow='var(--shadow-sm)'" onmouseout="this.style.borderColor='var(--border)';this.style.boxShadow='none'">
                <div style="font-family:var(--font-display);font-size:1rem;font-weight:500;color:var(--black);margin-bottom:10px;"><?php echo $faq[0]; ?></div>
                <p style="font-size:.83rem;color:var(--text-sm);line-height:1.75;"><?php echo $faq[1]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
