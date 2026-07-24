import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    initMobileNav();
    initReveals();
    initContactForm();
});

function initMobileNav() {
    const toggle = document.getElementById('nav-toggle');
    const mobileNav = document.getElementById('mobile-nav');

    if (!toggle || !mobileNav) {
        return;
    }

    const setMenuOpen = (open) => {
        mobileNav.classList.toggle('hidden', !open);
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Fechar menu' : 'Abrir menu');
    };

    toggle.addEventListener('click', () => {
        setMenuOpen(mobileNav.classList.contains('hidden'));
    });

    mobileNav.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => setMenuOpen(false));
    });
}

function initReveals() {
    const reveals = document.querySelectorAll('.reveal');

    if (!reveals.length) {
        return;
    }

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        reveals.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -40px 0px' },
    );

    reveals.forEach((el) => observer.observe(el));
}

function onlyDigits(value) {
    return String(value || '').replace(/\D/g, '');
}

function maskPhone(value) {
    const digits = onlyDigits(value).slice(0, 11);

    if (digits.length <= 2) {
        return digits.length ? `(${digits}` : '';
    }

    if (digits.length <= 6) {
        return `(${digits.slice(0, 2)}) ${digits.slice(2)}`;
    }

    if (digits.length <= 10) {
        return `(${digits.slice(0, 2)}) ${digits.slice(2, 6)}-${digits.slice(6)}`;
    }

    return `(${digits.slice(0, 2)}) ${digits.slice(2, 7)}-${digits.slice(7)}`;
}

function isValidEmail(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/i.test(String(value).trim());
}

function isValidPhone(value) {
    const digits = onlyDigits(value);

    if (!digits) {
        return true;
    }

    return digits.length >= 10 && digits.length <= 11;
}

function initContactForm() {
    const form = document.getElementById('contact-form');

    if (!form) {
        return;
    }

    const fields = {
        name: form.querySelector('#name'),
        email: form.querySelector('#email'),
        phone: form.querySelector('#phone'),
        project_type: form.querySelector('#project_type'),
        message: form.querySelector('#message'),
    };

    const submitButton = form.querySelector('[type="submit"]');
    const feedback = form.querySelector('[data-form-feedback]');
    const hasRecaptcha = Boolean(form.querySelector('.g-recaptcha'));

    if (fields.phone) {
        fields.phone.addEventListener('input', () => {
            fields.phone.value = maskPhone(fields.phone.value);
            clearFieldError(fields.phone);
        });

        fields.phone.addEventListener('blur', () => {
            fields.phone.value = maskPhone(fields.phone.value);
            validateField('phone', fields.phone);
        });
    }

    ['name', 'email', 'project_type', 'message'].forEach((key) => {
        const field = fields[key];
        if (!field) return;

        const eventName = field.tagName === 'SELECT' ? 'change' : 'input';
        field.addEventListener(eventName, () => clearFieldError(field));
        field.addEventListener('blur', () => validateField(key, field));
    });

    form.addEventListener('submit', (event) => {
        clearFormFeedback(feedback);

        let firstInvalid = null;

        Object.entries(fields).forEach(([key, field]) => {
            if (!field) return;
            if (!validateField(key, field) && !firstInvalid) {
                firstInvalid = field;
            }
        });

        if (hasRecaptcha) {
            const captchaError = form.querySelector('[data-error-for="g-recaptcha-response"]');
            const token = form.querySelector('[name="g-recaptcha-response"]')?.value
                || (typeof window.grecaptcha !== 'undefined' ? window.grecaptcha.getResponse() : '');

            if (!token) {
                if (captchaError) {
                    captchaError.textContent = 'Confirme que você não é um robô.';
                    captchaError.classList.remove('hidden');
                }
                if (!firstInvalid) {
                    firstInvalid = form.querySelector('.g-recaptcha');
                }
            } else if (captchaError) {
                captchaError.textContent = '';
                captchaError.classList.add('hidden');
            }
        }

        if (firstInvalid) {
            event.preventDefault();
            showFormFeedback(feedback, 'error', 'Confira os campos destacados antes de enviar.');
            firstInvalid.focus?.();
            firstInvalid.scrollIntoView?.({ behavior: 'smooth', block: 'center' });
            return;
        }

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.dataset.originalLabel = submitButton.textContent;
            submitButton.textContent = 'Enviando...';
        }
    });

    const flash = form.querySelector('[data-flash]');
    if (flash) {
        flash.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
}

function validateField(key, field) {
    const value = String(field.value || '').trim();
    let message = '';

    switch (key) {
        case 'name':
            if (!value) message = 'Informe seu nome.';
            else if (value.length < 2) message = 'Informe um nome válido.';
            break;
        case 'email':
            if (!value) message = 'Informe um e-mail válido.';
            else if (!isValidEmail(value)) message = 'Informe um e-mail válido.';
            break;
        case 'phone':
            if (value && !isValidPhone(value)) {
                message = 'Informe um WhatsApp válido, com DDD.';
            }
            break;
        case 'project_type':
            if (!value) message = 'Selecione o tipo de projeto.';
            break;
        case 'message':
            if (!value) message = 'Escreva uma mensagem.';
            else if (value.length < 10) message = 'Conte um pouco mais sobre o que você precisa.';
            break;
        default:
            break;
    }

    if (message) {
        showFieldError(field, message);
        return false;
    }

    clearFieldError(field);
    return true;
}

function showFieldError(fieldOrEl, message) {
    const errorEl = fieldOrEl?.matches?.('[data-error-for]')
        ? fieldOrEl
        : document.querySelector(`[data-error-for="${fieldOrEl?.id}"]`);

    if (fieldOrEl?.classList) {
        fieldOrEl.classList.add('border-red-400');
        fieldOrEl.setAttribute('aria-invalid', 'true');
    }

    if (errorEl) {
        errorEl.textContent = message;
        errorEl.classList.remove('hidden');
    }
}

function clearFieldError(field, errorEl = null) {
    const targetError = errorEl || (field ? document.querySelector(`[data-error-for="${field.id}"]`) : null);

    if (field?.classList) {
        field.classList.remove('border-red-400');
        field.removeAttribute('aria-invalid');
    }

    if (targetError) {
        targetError.textContent = '';
        targetError.classList.add('hidden');
    }
}

function showFormFeedback(el, type, message) {
    if (!el) return;

    el.textContent = message;
    el.classList.remove('hidden', 'border-red-200', 'bg-red-50', 'text-red-800', 'border-brand-200', 'bg-brand-50', 'text-brand-800');
    el.classList.add(
        type === 'error' ? 'border-red-200' : 'border-brand-200',
        type === 'error' ? 'bg-red-50' : 'bg-brand-50',
        type === 'error' ? 'text-red-800' : 'text-brand-800',
    );
}

function clearFormFeedback(el) {
    if (!el || el.hasAttribute('data-flash')) return;
    el.textContent = '';
    el.classList.add('hidden');
}
