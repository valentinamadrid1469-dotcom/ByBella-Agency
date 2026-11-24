'use strict';
(() => {
  document.querySelectorAll('.needs-validation').forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) { event.preventDefault(); event.stopPropagation(); }
      form.classList.add('was-validated');
    });
  });
  const serviceChoices = [...document.querySelectorAll('#contact-form .service-checkbox')];
  if (serviceChoices.length) {
    const form = document.getElementById('contact-form');
    const error = document.getElementById('servicios-error');
    const update = () => {
      const hasSelection = serviceChoices.some(choice => choice.checked);
      serviceChoices[0].setCustomValidity(hasSelection ? '' : 'Selecciona al menos un servicio.');
      if (error) error.hidden = hasSelection || !form.classList.contains('was-validated');
    };
    serviceChoices.forEach(choice => choice.addEventListener('change', update));
    form.addEventListener('submit', update, { capture: true });
    update();
  }
  const msg = document.getElementById('mensaje');
  const count = document.getElementById('char-count');
  if (msg && count) {
    const update = () => { count.textContent = `${msg.value.length} / 2500`; };
    msg.addEventListener('input', update); update();
  }
  const buttons = document.querySelectorAll('[data-filter]');
  buttons.forEach(btn => btn.addEventListener('click', () => {
    const category = btn.dataset.filter;
    buttons.forEach(b => { b.classList.toggle('active', b === btn); b.setAttribute('aria-pressed', String(b===btn)); });
    document.querySelectorAll('.project').forEach(card => { card.hidden = category !== 'all' && card.dataset.category !== category; });
  }));
  document.querySelectorAll('.delete-form').forEach(form => form.addEventListener('submit', e => {
    if (!window.confirm('¿Eliminar esta solicitud de forma permanente?')) e.preventDefault();
  }));
  const menu = document.querySelector('#menu');
  if(menu) menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
    if(window.innerWidth < 992 && menu.classList.contains('show') && window.bootstrap) window.bootstrap.Collapse.getOrCreateInstance(menu).hide();
  }));
})();
