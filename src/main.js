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
});
