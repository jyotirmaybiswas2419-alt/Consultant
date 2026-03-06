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

    // 2. Reveal text on scroll - plays every time
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Small timeout ensures the initial 0 opacity state is painted first
                setTimeout(() => {
                    entry.target.classList.add('is-revealed');
                }, 50);
            } else {
                // Remove the class when scrolled out of view to trigger again
                entry.target.classList.remove('is-revealed');
            }
        });
    }, { threshold: 0, rootMargin: "0px" });

    document.querySelectorAll('.reveal-text').forEach(el => revealObserver.observe(el));

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
});
