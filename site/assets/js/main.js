(function () {
  'use strict';

  var header = document.getElementById('site-header');
  var toggle = document.getElementById('nav-toggle');
  var mobileNav = document.getElementById('mobile-nav');
  var yearEl = document.getElementById('year');
  var form = document.getElementById('contact-form');
  var statusEl = document.getElementById('form-status');
  var submitBtn = document.getElementById('contact-submit');

  if (yearEl) {
    yearEl.textContent = String(new Date().getFullYear());
  }

  /* Header sticky — fundo paper mais sólido no scroll */
  function onScroll() {
    if (!header) return;
    if (window.scrollY > 12) {
      header.classList.add('bg-paper');
      header.classList.remove('bg-paper/90');
    } else {
      header.classList.add('bg-paper/90');
      header.classList.remove('bg-paper');
    }
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* Menu mobile */
  function setMenuOpen(open) {
    if (!toggle || !mobileNav) return;
    mobileNav.classList.toggle('hidden', !open);
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    toggle.setAttribute('aria-label', open ? 'Fechar menu' : 'Abrir menu');
  }

  if (toggle && mobileNav) {
    toggle.addEventListener('click', function () {
      setMenuOpen(mobileNav.classList.contains('hidden'));
    });

    mobileNav.querySelectorAll('.nav-mobile').forEach(function (link) {
      link.addEventListener('click', function () {
        setMenuOpen(false);
      });
    });
  }

  /* Formulário via fetch → form.php */
  if (form && statusEl && submitBtn) {
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      statusEl.classList.add('hidden');
      statusEl.textContent = '';
      submitBtn.disabled = true;
      submitBtn.textContent = 'Enviando…';

      var data = new FormData(form);

      fetch(form.action, {
        method: 'POST',
        body: data,
        headers: {
          Accept: 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
        },
      })
        .then(function (response) {
          return response.json().then(function (payload) {
            return { ok: response.ok, payload: payload };
          });
        })
        .then(function (result) {
          if (result.ok && result.payload && result.payload.success) {
            statusEl.textContent = result.payload.message || 'Mensagem enviada. Em breve entraremos em contato.';
            statusEl.className = 'mt-4 text-sm text-circuit';
            form.reset();
          } else {
            var msg =
              (result.payload && result.payload.message) ||
              'Não foi possível enviar. Tente de novo ou fale no WhatsApp.';
            statusEl.textContent = msg;
            statusEl.className = 'mt-4 text-sm text-signal';
          }
        })
        .catch(function () {
          statusEl.textContent =
            'Falha de conexão. Tente novamente ou fale no WhatsApp: (19) 98262-4408.';
          statusEl.className = 'mt-4 text-sm text-signal';
        })
        .finally(function () {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Solicitar orçamento';
          statusEl.classList.remove('hidden');
        });
    });
  }
})();
