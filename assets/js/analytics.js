/** Shared Google Analytics tag for every BhattiZinc page. */
(function () {
    'use strict';

    const hostname = window.location.hostname.toLowerCase();
    const isLocalhost = hostname === 'localhost'
        || hostname.endsWith('.localhost')
        || hostname === '::1'
        || hostname === '[::1]'
        || hostname === '0.0.0.0'
        || /^127(?:\.\d{1,3}){3}$/.test(hostname);

    if (isLocalhost) return;

    const measurementId = 'G-G38KKD9WCS';
    window.dataLayer = window.dataLayer || [];
    window.gtag = window.gtag || function () {
        window.dataLayer.push(arguments);
    };

    window.gtag('js', new Date());
    window.gtag('config', measurementId);

    if (!document.querySelector('script[src^="https://www.googletagmanager.com/gtag/js"]')) {
        const script = document.createElement('script');
        script.async = true;
        script.src = 'https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(measurementId);
        document.head.appendChild(script);
    }
})();
