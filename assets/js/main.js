/**
 * BhattiZinc — Main JavaScript
 */
(function() {
    'use strict';

    /* ----------------------------------------
       Site Loader
    ---------------------------------------- */
    window.addEventListener('load', function() {
        const loader = document.getElementById('site-loader');
        if (loader) {
            setTimeout(function() {
                loader.classList.add('loaded');
            }, 1200);
        }
    });

    /* ----------------------------------------
       Header Scroll Behavior
    ---------------------------------------- */
    const header = document.getElementById('site-header');
    if (header) {
        let lastScroll = 0;
        function onScroll() {
            const y = window.scrollY;
            if (y > 60) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            lastScroll = y;
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    /* ----------------------------------------
       Mobile Navigation
    ---------------------------------------- */
    const navToggle = document.getElementById('nav-toggle');
    const mobileOverlay = document.getElementById('mobile-overlay');

    if (navToggle && mobileOverlay) {
        navToggle.addEventListener('click', function() {
            const isOpen = mobileOverlay.classList.toggle('open');
            navToggle.classList.toggle('active', isOpen);
            document.body.classList.toggle('nav-open', isOpen);
        });

        // Close on overlay click
        mobileOverlay.addEventListener('click', function(e) {
            if (e.target === mobileOverlay) closeNav();
        });

        // Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeNav();
        });
    }

    // Mobile sub-menus
    document.querySelectorAll('.mobile-sub-toggle').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const item = this.closest('.mobile-has-sub');
            const sub = item.querySelector('.mobile-sub');
            const isOpen = sub.classList.toggle('open');
            const span = this.querySelector('span');
            if (span) span.textContent = isOpen ? '−' : '+';
        });
    });

    function closeNav() {
        if (navToggle) navToggle.classList.remove('active');
        if (mobileOverlay) mobileOverlay.classList.remove('open');
        document.body.classList.remove('nav-open');
    }

    /* ----------------------------------------
       Scroll Reveal
    ---------------------------------------- */
    function initReveal() {
        const targets = document.querySelectorAll('.reveal');
        if (!targets.length) return;

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        targets.forEach(function(el) { observer.observe(el); });
    }

    initReveal();

    /* ----------------------------------------
       Product Hero Typewriter
    ---------------------------------------- */
    function initProductHeroTypewriter() {
        const target = document.querySelector('.product-hero-type[data-typewriter-text]');
        if (!target) return;

        const text = target.getAttribute('data-typewriter-text') || '';
        const reducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reducedMotion || window.innerWidth <= 540) {
            target.textContent = text;
            target.classList.add('typing-complete');
            return;
        }

        let index = 0;
        const speed = 16;
        target.textContent = '';
        target.classList.add('is-typing');

        function typeNext() {
            target.textContent = text.slice(0, index);
            index += 1;
            if (index <= text.length) {
                window.setTimeout(typeNext, speed);
            } else {
                target.classList.remove('is-typing');
                target.classList.add('typing-complete');
            }
        }

        window.setTimeout(typeNext, 350);
    }

    initProductHeroTypewriter();

    /* ----------------------------------------
       Counter Animation
    ---------------------------------------- */
    function animateCounter(el) {
        const target = parseFloat(el.getAttribute('data-count'));
        const suffix = el.getAttribute('data-suffix') || '';
        const prefix = el.getAttribute('data-prefix') || '';
        const decimals = el.getAttribute('data-decimals') || 0;
        const duration = 1800;
        const start = performance.now();

        function step(now) {
            const elapsed = now - start;
            const progress = Math.min(elapsed / duration, 1);
            const ease = 1 - Math.pow(1 - progress, 3);
            const value = target * ease;
            el.textContent = prefix + value.toFixed(decimals) + suffix;
            if (progress < 1) requestAnimationFrame(step);
        }

        requestAnimationFrame(step);
    }

    const counterObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-count]').forEach(function(el) {
        counterObserver.observe(el);
    });

    /* ----------------------------------------
       Ticker / Marquee
    ---------------------------------------- */
    const track = document.querySelector('.ticker-track');
    if (track) {
        // Duplicate for seamless loop
        track.innerHTML = track.innerHTML + track.innerHTML;
    }

    /* ----------------------------------------
       Product Filter (Products Page)
    ---------------------------------------- */
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('[data-category]');

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            filterBtns.forEach(function(b) { b.classList.remove('active'); });
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');
            productCards.forEach(function(card) {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = '';
                    setTimeout(function() { card.style.opacity = '1'; card.style.transform = ''; }, 10);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.96)';
                    setTimeout(function() { card.style.display = 'none'; }, 260);
                }
            });
        });
    });

    /* ----------------------------------------
       Product Thumbnail Gallery
    ---------------------------------------- */
    const thumbs = document.querySelectorAll('.product-thumb');
    const mainImg = document.querySelector('.product-main-image img');

    thumbs.forEach(function(thumb) {
        thumb.addEventListener('click', function() {
            thumbs.forEach(function(t) { t.classList.remove('active'); });
            this.classList.add('active');
            if (mainImg) {
                const src = this.querySelector('img') ? this.querySelector('img').src : null;
                if (src) {
                    mainImg.style.opacity = '0';
                    setTimeout(function() {
                        mainImg.src = src;
                        mainImg.style.opacity = '1';
                    }, 200);
                }
            }
        });
    });

    /* ----------------------------------------
       Lab Report Modal
    ---------------------------------------- */
    const labModal = document.getElementById('lab-report-modal');
    const labOpenBtn = document.querySelector('[data-lab-report-open]');
    const labCloseBtns = document.querySelectorAll('[data-lab-report-close]');
    let labLastFocus = null;

    function openLabModal() {
        if (!labModal) return;
        labLastFocus = document.activeElement;
        labModal.classList.add('open');
        labModal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('lab-modal-open');
        const closeBtn = labModal.querySelector('.lab-report-modal-close');
        if (closeBtn) closeBtn.focus();
    }

    function closeLabModal() {
        if (!labModal) return;
        labModal.classList.remove('open');
        labModal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('lab-modal-open');
        if (labLastFocus && typeof labLastFocus.focus === 'function') {
            labLastFocus.focus();
        }
    }

    if (labOpenBtn && labModal) {
        labOpenBtn.addEventListener('click', openLabModal);
        labCloseBtns.forEach(function(btn) {
            btn.addEventListener('click', closeLabModal);
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && labModal.classList.contains('open')) {
                closeLabModal();
            }
        });
    }

    /* ----------------------------------------
       Form Validation
    ---------------------------------------- */
    const forms = document.querySelectorAll('form[data-validate]');
    forms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            let valid = true;
            const required = form.querySelectorAll('[required]');
            required.forEach(function(field) {
                if (!field.value.trim()) {
                    valid = false;
                    field.classList.add('error');
                    field.addEventListener('input', function() {
                        this.classList.remove('error');
                    }, { once: true });
                }
            });
            if (!valid) {
                e.preventDefault();
                const first = form.querySelector('.error');
                if (first) first.focus();
            }
        });
    });

    /* ----------------------------------------
       Smooth Anchor Links
    ---------------------------------------- */
    document.querySelectorAll('a[href^="#"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
            const id = this.getAttribute('href').slice(1);
            const target = document.getElementById(id);
            if (target) {
                e.preventDefault();
                const headerH = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--header-h')) || 80;
                const y = target.getBoundingClientRect().top + window.scrollY - headerH - 24;
                window.scrollTo({ top: y, behavior: 'smooth' });
                closeNav();
            }
        });
    });

    /* ----------------------------------------
       Hero Parallax (subtle)
    ---------------------------------------- */
    const heroBg = document.querySelector('.hero-bg');
    if (heroBg && window.innerWidth > 768) {
        window.addEventListener('scroll', function() {
            const y = window.scrollY;
            if (y < window.innerHeight) {
                heroBg.style.transform = 'translateY(' + (y * 0.2) + 'px)';
            }
        }, { passive: true });
    }

})();
