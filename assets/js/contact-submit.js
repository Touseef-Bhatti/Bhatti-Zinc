(function() {
    'use strict';

    const whatsappForms = document.querySelectorAll('form[data-whatsapp-form]');
    if (!whatsappForms.length) return;

    whatsappForms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const values = {
                name: (form.querySelector('[name="name"]')?.value || '').trim(),
                company: (form.querySelector('[name="company"]')?.value || '').trim(),
                email: (form.querySelector('[name="email"]')?.value || '').trim(),
                phone: (form.querySelector('[name="phone"]')?.value || '').trim(),
                product: (form.querySelector('[name="product"]')?.value || '').trim(),
                quantity: (form.querySelector('[name="quantity"]')?.value || '').trim(),
                position: (form.querySelector('[name="position"]')?.value || '').trim(),
                location: (form.querySelector('[name="location"]')?.value || '').trim(),
                linkedin: (form.querySelector('[name="linkedin"]')?.value || '').trim(),
                message: (form.querySelector('[name="message"]')?.value || '').trim(),
            };

            let whatsappMessage = [];
            if (form.id === 'career-form') {
                whatsappMessage = [
                    ' NEW CAREER APPLICATION',
                    '',
                    '━━━━━━━━━━━━',
                    ' Candidate Information',
                    '━━━━━━━━━━━━',
                    '',
                    'Name: ' + values.name,
                    'Email: ' + values.email,
                    'Phone: ' + values.phone,
                    'Location: ' + values.location,
                    'Position: ' + values.position,
                    'Current Company: ' + values.company,
                    'LinkedIn / Portfolio: ' + values.linkedin,
                    '',
                    '━━━━━━━━━━━━',
                    ' Application Message',
                    '━━━━━━━━━━━━',
                    '',
                    values.message,
                    '',
                    '━━━━━━━━━━━━',
                    'Sent from BhattiZinc Website Careers Page',
                    '━━━━━━━━━━━━',
                ].join('\n');
            } else {
                whatsappMessage = [
                    ' NEW QUOTE REQUEST',
                    '',
                    '━━━━━━━━━━━━',
                    ' Customer Information',
                    '━━━━━━━━━━━━',
                    '',
                    'Name: ' + values.name,
                    'Company: ' + values.company,
                    'Email: ' + values.email,
                    'Phone: ' + values.phone,
                    '',
                    '━━━━━━━━━━━━',
                    ' Product Details',
                    '━━━━━━━━━━━━',
                    '',
                    'Product: ' + values.product,
                    'Quantity: ' + values.quantity,
                    '',
                    '━━━━━━━━━━━━',
                    ' Additional Requirements',
                    '━━━━━━━━━━━━',
                    '',
                    values.message,
                    '',
                    '━━━━━━━━━━━━',
                    'Sent from BhattiZinc Website',
                    '━━━━━━━━━━━━',
                ].join('\n');
            }

            const email = 'info@bhattizinc.com';
            const subject = form.id === 'career-form' ? 'New Career Application' : 'New Quote Request';
            const url = 'mailto:' + email + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(whatsappMessage);
            window.location.href = url;
        });
    });
})();
