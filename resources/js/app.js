import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('nav-toggle');
    const mobileNav = document.getElementById('mobile-nav');

    if (!toggle || !mobileNav) {
        return;
    }

    toggle.addEventListener('click', () => {
        const isOpen = !mobileNav.classList.contains('hidden');
        mobileNav.classList.toggle('hidden', isOpen);
        toggle.setAttribute('aria-expanded', String(!isOpen));
        toggle.setAttribute('aria-label', isOpen ? 'Abrir menu' : 'Fechar menu');
    });
});
