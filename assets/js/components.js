/** Shared site shell: header, navigation, loader and footer. */
(function () {
    'use strict';

    const shellTarget = document.querySelector('[data-site-shell]');
    const footerTarget = document.querySelector('[data-site-footer]');
    const pathSegments = location.pathname.split('/').filter(Boolean);
    const page = pathSegments.length === 0
        ? 'index'
        : pathSegments[0] === 'products'
            ? (pathSegments[1] || 'products').replace(/\.html$/i, '')
            : pathSegments[0].replace(/\.html$/i, '');

    function setCurrentPage() {
        const header = document.getElementById('site-header');
        if (!header) return;
        header.classList.toggle('header--transparent', page === 'index');
        header.classList.toggle('header--solid', page !== 'index');

        const navItems = header.querySelectorAll('.nav-list > li');
        navItems.forEach(function (item) {
            item.classList.remove('active');
            const link = item.querySelector(':scope > a');
            const links = item.querySelectorAll('a[href]');
            const isCurrent = Array.from(links).some(function (itemLink) {
                const segments = new URL(itemLink.href, location.origin).pathname.split('/').filter(Boolean);
                return (segments.pop() || 'index') === page;
            });
            const linkSegments = link ? new URL(link.href, location.origin).pathname.split('/').filter(Boolean) : [];
            const linkPage = linkSegments.length ? linkSegments[linkSegments.length - 1] : 'index';
            if (link && (linkPage === page || isCurrent)) {
                item.classList.add('active');
                if (linkPage === page) {
                    link.setAttribute('aria-current', 'page');
                }
            }
        });
        const footerYear = document.getElementById('copyright-year');
        if (footerYear) footerYear.textContent = new Date().getFullYear();
    }

    Promise.all([
        fetch('/assets/components/site-shell.html').then(function (response) {
            if (!response.ok) throw new Error('Could not load shared site shell.');
            return response.text();
        }),
        fetch('/assets/components/footer.html').then(function (response) {
            if (!response.ok) throw new Error('Could not load shared footer.');
            return response.text();
        }),
        fetch('/assets/components/product-inquiry-form.html').then(function (response) {
            if (!response.ok) throw new Error('Could not load shared product enquiry form.');
            return response.text();
        })
    ]).then(function (parts) {
        if (shellTarget) shellTarget.outerHTML = parts[0];
        if (footerTarget) footerTarget.outerHTML = parts[1];
        document.querySelectorAll('[data-product-inquiry-form]').forEach(function (mount) {
            mount.outerHTML = parts[2].replace('__PRODUCT_NAME__', mount.getAttribute('data-product-inquiry-form'));
        });
        setCurrentPage();
        window.siteComponentsReady = true;
        document.dispatchEvent(new CustomEvent('site:components-ready'));
    }).catch(function (error) {
        console.error(error);
        document.dispatchEvent(new CustomEvent('site:components-error', { detail: error }));
    });
})();
