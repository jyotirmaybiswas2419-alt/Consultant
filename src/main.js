import './style.css'

// Reusable Moving Letters - Signal & Noise Animation Function
const createML5Animation = (selector, loop = true) => {
    const element = document.querySelector(selector);
    if (!element || typeof anime === 'undefined') return null;

    return anime.timeline({ loop: loop })
        .add({
            targets: `${selector} .line`,
            opacity: [0.5, 1],
            scaleX: [0, 1],
            easing: "easeInOutExpo",
            duration: 700
        }).add({
            targets: `${selector} .line`,
            duration: 600,
            easing: "easeOutExpo",
            translateY: (el, i) => (-0.625 + 0.625 * 2 * i) + "em"
        }).add({
            targets: `${selector} .ampersand`,
            opacity: [0, 1],
            scaleY: [0.5, 1],
            easing: "easeOutExpo",
            duration: 600,
            offset: '-=600'
        }).add({
            targets: `${selector} .letters-left`,
            opacity: [0, 1],
            translateX: ["0.5em", 0],
            easing: "easeOutExpo",
            duration: 600,
            offset: '-=300'
        }).add({
            targets: `${selector} .letters-right`,
            opacity: [0, 1],
            translateX: ["-0.5em", 0],
            easing: "easeOutExpo",
            duration: 600,
            offset: '-=600'
        }).add({
            targets: selector,
            opacity: loop ? 0 : 1, // Stay visible if not looping
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
};

window.onload = () => {
    if (typeof anime !== 'undefined') {
        // 1. Loop animation for the 'here' section
        createML5Animation('.here .ml5', true);

        // 2. Scroll-triggered animation for the Banner Title
        const bannerTitle = document.querySelector('.banner-title');
        if (bannerTitle) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        createML5Animation('.banner-title', false); // Run once (loop: false)
                        observer.unobserve(entry.target); // Stop observing after it runs once
                    }
                });
            }, { threshold: 0.5 });

            observer.observe(bannerTitle);
        }

        // 3. Simple Reveal Animation for general text
        const revealElements = document.querySelectorAll('.reveal-text');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        revealElements.forEach(el => revealObserver.observe(el));
    }
};
