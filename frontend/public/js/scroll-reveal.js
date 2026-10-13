(() => {
    if (window.__luvoraScrollRevealLoaded) return;
    window.__luvoraScrollRevealLoaded = true;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion || !('IntersectionObserver' in window)) return;

    const selector = [
        'main > section',
        'main > article',
        'main > div > section',
        'main > div > article',
        'main [class*="rounded-xl"]',
        'main [class*="rounded-2xl"]',
        'main [data-scroll-reveal]',
        'body > footer'
    ].join(',');
    const candidates = Array.from(document.querySelectorAll(selector));
    const candidateSet = new Set(candidates);
    const targets = candidates.filter((element) => {
        for (let parent = element.parentElement; parent; parent = parent.parentElement) {
            if (candidateSet.has(parent)) return false;
        }
        return true;
    });

    if (!targets.length) return;

    const style = document.createElement('style');
    style.textContent = `
        .luvora-scroll-reveal-ready [data-scroll-reveal] {
            opacity: 0;
            filter: blur(3px);
            transform: translate3d(0, 34px, 0) scale(.985);
            transition: opacity 760ms cubic-bezier(.16,1,.3,1) var(--scroll-reveal-delay, 0ms),
                filter 760ms cubic-bezier(.16,1,.3,1) var(--scroll-reveal-delay, 0ms),
                transform 760ms cubic-bezier(.16,1,.3,1) var(--scroll-reveal-delay, 0ms);
            will-change: opacity, transform;
        }
        .luvora-scroll-reveal-ready [data-scroll-reveal].is-visible {
            opacity: 1;
            filter: blur(0);
            transform: translate3d(0, 0, 0) scale(1);
            will-change: auto;
        }
    `;
    document.head.appendChild(style);

    const siblingIndexes = new Map();
    targets.forEach((element) => {
        element.setAttribute('data-scroll-reveal', '');
        const parent = element.parentElement;
        const index = siblingIndexes.get(parent) ?? 0;
        siblingIndexes.set(parent, index + 1);
        element.style.setProperty('--scroll-reveal-delay', `${Math.min(index * 85, 340)}ms`);
    });
    document.documentElement.classList.add('luvora-scroll-reveal-ready');

    const observer = new IntersectionObserver((entries, currentObserver) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            currentObserver.unobserve(entry.target);
        });
    }, { threshold: 0.06, rootMargin: '0px 0px -6% 0px' });

    targets.forEach((element) => observer.observe(element));
})();
