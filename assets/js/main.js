/* ============================================
   MAJOKA HARDWARE — SHARED JS
   handles nav scroll, reveal-on-scroll, mobile
   drawer, back-to-top, count-up, cookie banner
   ============================================ */

(function () {
  'use strict';

  // ---------- Nav scroll shadow + back-to-top ----------
  const nav = document.getElementById('nav');
  const toTop = document.getElementById('toTop');
  const onScroll = () => {
    const y = window.scrollY;
    if (nav) nav.classList.toggle('scrolled', y > 8);
    if (toTop) toTop.classList.toggle('show', y > 480);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  if (toTop) {
    toTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ---------- Reveal on scroll ----------
  const revealEls = document.querySelectorAll('.reveal');
  if (revealEls.length) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          e.target.classList.add('in');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach((el) => io.observe(el));
  }

  // ---------- Mobile drawer menu ----------
  const navToggle = document.getElementById('navToggle');
  const navDrawer = document.getElementById('navDrawer');
  const navBackdrop = document.getElementById('navBackdrop');
  const drawerClose = document.getElementById('drawerClose');

  if (navToggle && navDrawer && navBackdrop) {
    const openMenu = () => {
      navToggle.classList.add('open');
      navToggle.setAttribute('aria-expanded', 'true');
      navDrawer.classList.add('open');
      navDrawer.setAttribute('aria-hidden', 'false');
      navBackdrop.classList.add('open');
      document.body.style.overflow = 'hidden';
    };
    const closeMenu = () => {
      navToggle.classList.remove('open');
      navToggle.setAttribute('aria-expanded', 'false');
      navDrawer.classList.remove('open');
      navDrawer.setAttribute('aria-hidden', 'true');
      navBackdrop.classList.remove('open');
      document.body.style.overflow = '';
    };
    navToggle.addEventListener('click', () => {
      navDrawer.classList.contains('open') ? closeMenu() : openMenu();
    });
    if (drawerClose) drawerClose.addEventListener('click', closeMenu);
    navBackdrop.addEventListener('click', closeMenu);
    document.querySelectorAll('.drawer-menu a').forEach((a) => {
      a.addEventListener('click', closeMenu);
    });
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && navDrawer.classList.contains('open')) closeMenu();
    });
  }

  // ---------- Count-up numbers (data-count attr) ----------
  const counters = document.querySelectorAll('[data-count]');
  if (counters.length) {
    const countObs = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (!e.isIntersecting) return;
        const el = e.target;
        const target = parseInt(el.getAttribute('data-count'), 10);
        const duration = 1400;
        const start = performance.now();
        const easeOut = (t) => 1 - Math.pow(1 - t, 3);
        const tick = (now) => {
          const t = Math.min(1, (now - start) / duration);
          el.textContent = Math.floor(easeOut(t) * target).toLocaleString();
          if (t < 1) requestAnimationFrame(tick);
          else el.textContent = target.toLocaleString();
        };
        requestAnimationFrame(tick);
        countObs.unobserve(el);
      });
    }, { threshold: 0.5 });
    counters.forEach((el) => countObs.observe(el));
  }

  // ---------- Cookie banner (only when present) ----------
  const cookie = document.getElementById('cookie');
  if (cookie) {
    const COOKIE_KEY = 'majoka-cookie-consent';
    if (!localStorage.getItem(COOKIE_KEY)) {
      setTimeout(() => cookie.classList.add('show'), 900);
    }
    const dismissCookie = (val) => {
      localStorage.setItem(COOKIE_KEY, val);
      cookie.classList.remove('show');
    };
    const ca = document.getElementById('cookieAccept');
    const cd = document.getElementById('cookieDecline');
    if (ca) ca.addEventListener('click', () => dismissCookie('accepted'));
    if (cd) cd.addEventListener('click', () => dismissCookie('declined'));
  }

  // ---------- Form (reach-us) ----------
  // Only intercept the legacy static form. Skip CF7's <form> — it handles its
  // own AJAX submit and renders its own response banner.
  const reachForm = document.querySelector('.form-wrap .form:not(.wpcf7-form)');
  if (reachForm) {
    reachForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert("Thanks — we'll be in touch shortly.");
      reachForm.reset();
    });
  }
})();
