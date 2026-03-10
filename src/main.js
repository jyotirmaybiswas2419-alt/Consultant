import './style.css'

document.addEventListener('DOMContentLoaded', () => {

    // 1. Banner title — scroll-triggered, runs once
    const bannerTitle = document.querySelector('.banner-title');
    if (bannerTitle) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        observer.observe(bannerTitle);
    }

    // 2. Reveal text on scroll - all siblings reveal together when first is visible
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const items = entry.target.querySelectorAll('.reveal-text');
            if (entry.isIntersecting) {
                items.forEach(el => {
                    setTimeout(() => el.classList.add('is-revealed'), 50);
                });
            } else {
                items.forEach(el => el.classList.remove('is-revealed'));
            }
        });
    }, { threshold: 0, rootMargin: "0px" });

    // Observe each unique parent that contains reveal-text elements
    document.querySelectorAll('.reveal-text').forEach(el => {
        revealObserver.observe(el.parentElement);
    });

    // 3. Client Review Slider
    const slides = document.querySelectorAll('.client-reviews .review');
    const dots = document.querySelectorAll('.slider-dot');
    const prevBtn = document.querySelector('.slider-prev');
    const nextBtn = document.querySelector('.slider-next');

    if (slides.length > 0) {
        let currentSlide = 0;

        const updateSlider = (index) => {
            // Hide all slides and reset dots
            slides.forEach(slide => {
                slide.classList.remove('slide-active');
                slide.classList.add('slide-hidden');
            });
            dots.forEach(dot => {
                dot.classList.remove('bg-[#31110F]');
                dot.classList.add('bg-gray-300');
            });

            // Show current slide and activate proper dot
            slides[index].classList.remove('slide-hidden');
            slides[index].classList.add('slide-active');
            dots[index].classList.remove('bg-gray-300');
            dots[index].classList.add('bg-[#31110F]');

            currentSlide = index;
        };

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => {
                let prev = currentSlide - 1;
                if (prev < 0) prev = slides.length - 1;
                updateSlider(prev);
            });

            nextBtn.addEventListener('click', () => {
                let next = currentSlide + 1;
                if (next >= slides.length) next = 0;
                updateSlider(next);
            });
        }

        dots.forEach((dot, idx) => {
            dot.addEventListener('click', () => {
                updateSlider(idx);
            });
        });
    }

    // 4. Count-up animation for stats
    const countUpObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            entry.target.querySelectorAll('.count-up').forEach(el => {
                const target = parseInt(el.dataset.target, 10);
                const suffix = el.dataset.suffix || '';
                const duration = 1500; // ms
                const start = performance.now();

                const tick = (now) => {
                    const elapsed = now - start;
                    const progress = Math.min(elapsed / duration, 1);
                    // ease out
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.floor(eased * target) + suffix;
                    if (progress < 1) requestAnimationFrame(tick);
                };

                requestAnimationFrame(tick);
            });

            countUpObserver.unobserve(entry.target);
        });
    }, { threshold: 0.3 });

    const statsSection = document.querySelector('.Stats-section');
    if (statsSection) countUpObserver.observe(statsSection);
});
