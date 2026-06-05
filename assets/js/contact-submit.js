(function() {
    'use strict';

    const contactForm = document.getElementById('contact-form');
    if (!contactForm) return;

    contactForm.addEventListener('submit', function(event) {
        if (!contactForm.checkValidity()) {
            return;
        }

        event.preventDefault();

        const values = {
            name: (contactForm.querySelector('[name="name"]')?.value || '').trim(),
            company: (contactForm.querySelector('[name="company"]')?.value || '').trim(),
            email: (contactForm.querySelector('[name="email"]')?.value || '').trim(),
            phone: (contactForm.querySelector('[name="phone"]')?.value || '').trim(),
            product: (contactForm.querySelector('[name="product"]')?.value || '').trim(),
            quantity: (contactForm.querySelector('[name="quantity"]')?.value || '').trim(),
            message: (contactForm.querySelector('[name="message"]')?.value || '').trim(),
        };

        const whatsappMessage = [
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

        const phone = '923206472460';
        const url = 'https://wa.me/' + phone + '?text=' + encodeURIComponent(whatsappMessage);
        window.open(url, '_blank');
    });
})();
