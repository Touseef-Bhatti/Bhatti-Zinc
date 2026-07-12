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
    let navScrollY = 0;

    function lockPageScroll() {
        navScrollY = window.scrollY || document.documentElement.scrollTop || 0;
        document.body.style.position = 'fixed';
        document.body.style.top = '-' + navScrollY + 'px';
        document.body.style.left = '0';
        document.body.style.right = '0';
        document.body.style.width = '100%';
    }

    function unlockPageScroll() {
        document.body.style.position = '';
        document.body.style.top = '';
        document.body.style.left = '';
        document.body.style.right = '';
        document.body.style.width = '';
        window.scrollTo(0, navScrollY);
    }

    if (navToggle && mobileOverlay) {
        navToggle.addEventListener('click', function() {
            const isOpen = mobileOverlay.classList.toggle('open');
            navToggle.classList.toggle('active', isOpen);
            navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            document.body.classList.toggle('nav-open', isOpen);
            if (isOpen) {
                lockPageScroll();
            } else {
                unlockPageScroll();
            }
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
            this.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            const span = this.querySelector('span');
            if (span) span.textContent = isOpen ? '−' : '+';
        });
    });

    function closeNav() {
        const wasOpen = mobileOverlay && mobileOverlay.classList.contains('open');
        if (navToggle) navToggle.classList.remove('active');
        if (navToggle) navToggle.setAttribute('aria-expanded', 'false');
        if (mobileOverlay) mobileOverlay.classList.remove('open');
        document.body.classList.remove('nav-open');
        document.querySelectorAll('.mobile-sub.open').forEach(function(sub) {
            sub.classList.remove('open');
        });
        document.querySelectorAll('.mobile-sub-toggle').forEach(function(toggle) {
            toggle.setAttribute('aria-expanded', 'false');
            const span = toggle.querySelector('span');
            if (span) span.textContent = '+';
        });
        if (wasOpen) unlockPageScroll();
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
                function scrollToTarget() {
                    const headerH = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--header-h')) || 80;
                    const y = target.getBoundingClientRect().top + window.scrollY - headerH - 24;
                    window.scrollTo({ top: y, behavior: 'smooth' });
                }
                if (document.body.classList.contains('nav-open')) {
                    closeNav();
                    window.requestAnimationFrame(scrollToTarget);
                } else {
                    scrollToTarget();
                }
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

    /* ----------------------------------------
       Hero Product Carousel (hover-swap)
    ---------------------------------------- */
    var heroCarousel = document.getElementById('hero-carousel');
    if (heroCarousel) {
        var products = [];
        try { products = JSON.parse(heroCarousel.getAttribute('data-products')); } catch(e) {}
        if (products.length < 3) return;

        var cardLeft  = document.getElementById('hero-card-left');
        var cardTop   = document.getElementById('hero-card-top');
        var cardRight = document.getElementById('hero-card-right');
        var dots      = heroCarousel.querySelectorAll('.hero-carousel-dot');
        var total     = products.length;
        var current   = 0; // index of the TOP (center) product
        var hoverLock = false;
        var autoTimer = null;
        var autoDelay = 5000;

        // Populate a card element with product data
        function fillCard(el, product) {
            if (!el || !product) return;
            var img = el.querySelector('.hero-product-img img');
            var nameEl = el.querySelector('.hero-product-name');
            var gradeEl = el.querySelector('.hero-product-grade');
            if (img) { img.src = product.image; img.alt = product.name; }
            if (nameEl) nameEl.textContent = product.name;
            if (gradeEl) gradeEl.textContent = product.grade;
            el.href = 'product.php?p=' + encodeURIComponent(product.slug);
        }

        // Render the 3 cards based on current index
        function render() {
            var leftIdx  = (current - 1 + total) % total;
            var rightIdx = (current + 1) % total;
            fillCard(cardLeft,  products[leftIdx]);
            fillCard(cardTop,   products[current]);
            fillCard(cardRight, products[rightIdx]);

            // Update dots
            dots.forEach(function(d, i) {
                d.classList.toggle('active', i === current);
            });
        }

        // Go to a specific index (set as top/center)
        function goTo(index) {
            current = ((index % total) + total) % total;
            render();
        }

        // Move forward (right card becomes top)
        function next() { goTo(current + 1); }

        // Move backward (left card becomes top)
        function prev() { goTo(current - 1); }

        // Initial render
        render();

        // ---- HOVER + CLICK SWAP (left/right → move to top, no redirect) ----
        var hoverTimer = null;
        var swapLock = false;

        function setupSideCard(card, action) {
            if (!card) return;
            // Hover: swap after short delay
            card.addEventListener('mouseenter', function() {
                if (swapLock) return;
                hoverTimer = setTimeout(function() {
                    swapLock = true;
                    action();
                    resetAuto();
                    setTimeout(function() { swapLock = false; }, 500);
                }, 300);
            });
            card.addEventListener('mouseleave', function() {
                clearTimeout(hoverTimer);
            });
            // Click: swap immediately, no redirect
            card.addEventListener('click', function(e) {
                e.preventDefault();
                clearTimeout(hoverTimer);
                if (!swapLock) {
                    swapLock = true;
                    action();
                    resetAuto();
                    setTimeout(function() { swapLock = false; }, 500);
                }
            });
        }

        setupSideCard(cardLeft, prev);
        setupSideCard(cardRight, next);

        // ---- DOT CLICK ----
        dots.forEach(function(dot) {
            dot.addEventListener('click', function() {
                var idx = parseInt(this.getAttribute('data-slide'), 10);
                goTo(idx);
                resetAuto();
            });
        });

        // ---- ARROW BUTTON CLICK ----
        var arrowPrev = document.getElementById('hero-arrow-prev');
        var arrowNext = document.getElementById('hero-arrow-next');
        if (arrowPrev) {
            arrowPrev.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                prev();
                resetAuto();
            });
        }
        if (arrowNext) {
            arrowNext.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                next();
                resetAuto();
            });
        }

        // ---- SWIPE / TOUCH ----
        var sx = 0, sy = 0, ex = 0, dragging = false;
        heroCarousel.addEventListener('pointerdown', function(e) {
            if (e.target.closest('.hero-carousel-dot') || e.target.closest('.hero-carousel-arrow')) return;
            sx = ex = e.clientX; sy = e.clientY;
            dragging = true;
        });
        heroCarousel.addEventListener('pointermove', function(e) {
            if (dragging) ex = e.clientX;
        });
        heroCarousel.addEventListener('pointerup', function(e) {
            if (!dragging) return;
            dragging = false;
            var dx = sx - ex, dy = Math.abs(sy - e.clientY);
            if (Math.abs(dx) > 30 && dy < Math.abs(dx) * 1.5) {
                if (dx > 0) next(); else prev();
                resetAuto();
            }
        });
        heroCarousel.addEventListener('pointercancel', function() { dragging = false; });

        // ---- AUTO-PLAY ----
        function startAuto() { stopAuto(); autoTimer = setInterval(next, autoDelay); }
        function stopAuto()  { if (autoTimer) { clearInterval(autoTimer); autoTimer = null; } }
        function resetAuto() { stopAuto(); startAuto(); }

        heroCarousel.addEventListener('mouseenter', stopAuto);
        heroCarousel.addEventListener('mouseleave', startAuto);

        // ---- KEYBOARD ----
        heroCarousel.setAttribute('tabindex', '0');
        heroCarousel.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft')  { prev(); resetAuto(); }
            if (e.key === 'ArrowRight') { next(); resetAuto(); }
        });

        setTimeout(startAuto, 3000);
    }

})();
