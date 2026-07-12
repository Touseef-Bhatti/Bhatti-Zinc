<?php
$page_title = 'Contact Us';

// Handle form submission
$success = false;
$errors  = [];
$mailTo = 'info@bhattizinc.com';

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
    if (empty($message) && empty($product)) $errors[] = 'Message is required.';

    if (empty($errors)) {
        if (empty($message)) {
            $message = 'No additional message provided.';
        }
        $siteHost = preg_replace('/[^a-zA-Z0-9.-]/', '', $_SERVER['HTTP_HOST'] ?? 'bhattizinc.com');
        $fromHost = $siteHost ?: 'bhattizinc.com';
        $safeName = trim(preg_replace('/[\r\n]+/', ' ', $name));
        $safeSubject = 'BhattiZinc Website Enquiry';
        $mailBody = implode("\n", [
            'New enquiry from BhattiZinc website',
            '',
            'Name: ' . $name,
            'Company: ' . $company,
            'Email: ' . $email,
            'Phone: ' . $phone,
            'Country: ' . $country,
            'Product: ' . $product,
            'Subject: ' . $subject,
            '',
            'Message:',
            $message,
        ]);
        $headers = [
            'From: BhattiZinc Website <noreply@' . $fromHost . '>',
            'Reply-To: ' . $safeName . ' <' . $email . '>',
            'Content-Type: text/plain; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion(),
        ];

        if (mail($mailTo, $safeSubject, $mailBody, implode("\r\n", $headers))) {
            $success = true;
            $_POST = [];
        } else {
            $errors[] = 'Your enquiry could not be sent right now. Please email us directly at info@bhattizinc.com.';
        }
    }
}

include 'includes/header.php';
?>


<br>

<!-- CONTACT MAIN -->
<section class="contact-section" id="inquiry">
    <div class="container">
        <div class="contact-grid">

            <!-- Info -->
            <div class="reveal">
                <h2 class="label">Get in touch</h2>
                <p class="contact-info-sub">Whether you are a first-time buyer or a long-standing partner, use the form to reach us. We also welcome direct calls and emails to the contacts below.</p>

                <div style="display:flex;flex-direction:column;gap:20px;margin-bottom:32px;">
                 <!-- Phone -->
                    <div style="display:flex;align-items:flex-start;gap:20px;background:var(--white);border:1px solid var(--border-light);padding:24px;border-radius:var(--radius-lg);transition:transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 24px rgba(0,0,0,0.05)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
                        <div style="width:64px;height:64px;background:var(--zinc-pale);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--zinc);">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div>
                            <div style="font-family:var(--font-display);font-size:1.4rem;font-weight:600;color:var(--black);margin-bottom:12px;">Direct Phone</div>
                            <div style="display:flex;flex-direction:column;gap:8px;">
                                <a href="tel:+923094530100" style="font-size:1rem;color:var(--text-mid);transition:color .2s;text-decoration:none;" onmouseover="this.style.color='var(--zinc)'" onmouseout="this.style.color='var(--text-mid)'">
                                    <strong style="color:var(--black);font-weight:500;">Pakistan (Call / WhatsApp):</strong> <br>+92 309 4530100
                                </a>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div style="display:flex;align-items:flex-start;gap:20px;background:var(--white);border:1px solid var(--border-light);padding:24px;border-radius:var(--radius-lg);transition:transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 24px rgba(0,0,0,0.05)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
                        <div style="width:64px;height:64px;background:var(--zinc-pale);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--zinc);">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div>
                            <div style="font-family:var(--font-display);font-size:1.4rem;font-weight:600;color:var(--black);margin-bottom:12px;">Email Us</div>
                            <div style="display:flex;flex-direction:column;gap:8px;">
                                <a href="mailto:info@bhattizinc.com" style="font-size:1rem;color:var(--text-mid);transition:color .2s;text-decoration:none;" onmouseover="this.style.color='var(--zinc)'" onmouseout="this.style.color='var(--text-mid)'">
                                    <strong style="color:var(--black);font-weight:500;">General Inquiries:</strong> <br>info@bhattizinc.com
                                </a>
                                
                            </div>
                        </div>
                    </div>  
                
                <!-- Location -->
                    <div style="display:flex;align-items:flex-start;gap:20px;background:var(--white);border:1px solid var(--border-light);padding:24px;border-radius:var(--radius-lg);transition:transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 24px rgba(0,0,0,0.05)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
                        <div style="width:64px;height:64px;background:var(--zinc-pale);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--zinc);">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div>
                            <div style="font-family:var(--font-display);font-size:1.4rem;font-weight:600;color:var(--black);margin-bottom:12px;">Our Locations</div>
                            
                            <div style="margin-bottom:12px;">
                                <div style="font-family:var(--font-label);font-size:.75rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--zinc);margin-bottom:4px;">Head Office &amp; Factory — Pakistan</div>
                                <address style="font-size:.9rem;color:var(--text-mid);line-height:1.6;font-style:normal;">
                                    BhattiZinc Industries (Pvt) Ltd.<br>
                                     Industrial Estate, Main G.T Road<br>
                                    Gujranwala, Punjab , Pakistan
                                </address>
                            </div>
                            
                            <div>
                                
                            </div>
                        </div>
                    </div>

                   
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
                    <a href="index" class="btn btn--gold">Return to Homepage</a>
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

                    <form method="POST" action="contact#inquiry" data-validate id="contact-form">
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
                            <button type="submit" class="btn btn--luxury-solid">Send Enquiry</button>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>

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
