(function() {
    'use strict';

    const WHATSAPP_NUMBER = '923094530100';
    const EMAIL_ADDRESS = 'info@bhattizinc.com';
    const forms = document.querySelectorAll('form[data-validate], form[data-whatsapp-form]');
    if (!forms.length) return;

    function value(form, name) {
        const field = form.querySelector('[name="' + name + '"]');
        return field ? field.value.trim() : '';
    }

    function buildMessage(form) {
        const lines = [];
        const isCareer = form.id === 'career-form';
        lines.push(isCareer ? 'NEW CAREER APPLICATION' : 'NEW ENQUIRY');
        lines.push('');
        lines.push('--- Contact Details ---');
        lines.push('Name: ' + value(form, 'name'));
        lines.push('Email: ' + value(form, 'email'));
        lines.push('Phone / WhatsApp: ' + value(form, 'phone'));

        if (isCareer) {
            lines.push('Location: ' + value(form, 'location'));
            lines.push('Position: ' + value(form, 'position'));
            lines.push('Current / Previous Employer: ' + value(form, 'company'));
            lines.push('LinkedIn / Portfolio: ' + value(form, 'linkedin'));
            lines.push('');
            lines.push('--- Application Message ---');
        } else {
            lines.push('Company: ' + value(form, 'company'));
            lines.push('Country: ' + value(form, 'country'));
            lines.push('Product: ' + value(form, 'product'));
            lines.push('Quantity: ' + value(form, 'quantity'));
            lines.push('Request Type: ' + (value(form, 'inquiry_type') || value(form, 'subject')));
            lines.push('');
            lines.push('--- Requirements ---');
        }

        lines.push(value(form, 'message'));
        lines.push('');
        lines.push('Sent from the BhattiZinc website');
        return lines.join('\n');
    }

    function closePopup(popup) {
        popup.remove();
        document.body.classList.remove('contact-popup-open');
    }

    function showPopup(message, isCareer) {
        const popup = document.createElement('div');
        popup.className = 'contact-popup-backdrop';
        popup.innerHTML = '<div class="contact-popup" role="dialog" aria-modal="true" aria-labelledby="contact-popup-title">' +
            '<button type="button" class="contact-popup-close" aria-label="Close contact options">&times;</button>' +
            '<div class="contact-popup-eyebrow">' + (isCareer ? 'Application ready' : 'Enquiry ready') + '</div>' +
            '<h2 id="contact-popup-title">Choose how to send your message</h2>' +
            '<p class="contact-popup-intro">Your details are prepared. Continue with WhatsApp for the fastest response, or send the same message by email.</p>' +
            '<div class="contact-popup-actions">' +
            '<a class="contact-popup-action contact-popup-action--whatsapp" target="_blank" rel="noopener" href="#">' +
            '<span class="contact-popup-action-icon" aria-hidden="true">W</span><span><strong>Send on WhatsApp</strong><small>Chat with BhattiZinc now</small></span></a>' +
            '<a class="contact-popup-action contact-popup-action--email" href="#">' +
            '<span class="contact-popup-action-icon" aria-hidden="true">@</span><span><strong>Send by Email</strong><small>' + EMAIL_ADDRESS + '</small></span></a>' +
            '</div>' +
            '<p class="contact-popup-note">You can close this window and review the form before sending.</p>' +
            '</div>';

        const subject = isCareer ? 'BhattiZinc Career Application' : 'BhattiZinc Website Enquiry';
        popup.querySelector('.contact-popup-action--whatsapp').href = 'https://wa.me/' + WHATSAPP_NUMBER + '?text=' + encodeURIComponent(message);
        popup.querySelector('.contact-popup-action--email').href = 'mailto:' + EMAIL_ADDRESS + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(message);
        popup.querySelector('.contact-popup-close').addEventListener('click', function() { closePopup(popup); });
        popup.addEventListener('click', function(event) {
            if (event.target === popup) closePopup(popup);
        });
        document.body.appendChild(popup);
        document.body.classList.add('contact-popup-open');
        popup.querySelector('.contact-popup-close').focus();
    }

    forms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            event.preventDefault();
            showPopup(buildMessage(form), form.id === 'career-form');
        });
    });
})();
