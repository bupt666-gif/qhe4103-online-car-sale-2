(() => {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const canUseFinePointer = window.matchMedia('(pointer: fine)').matches;

  const navbar = document.querySelector('[data-site-navbar]');
  const navToggle = document.querySelector('[data-nav-toggle]');
  const mobileNav = document.querySelector('[data-mobile-nav]');

  const setScrolledState = () => {
    if (!navbar) return;
    navbar.classList.toggle('is-scrolled', window.scrollY > 24);
  };

  const closeMobileNav = () => {
    document.body.classList.remove('nav-open');
    if (navToggle) navToggle.setAttribute('aria-expanded', 'false');
  };

  const toggleMobileNav = () => {
    if (!navToggle) return;
    const isOpen = document.body.classList.toggle('nav-open');
    navToggle.setAttribute('aria-expanded', String(isOpen));
  };

  if (navToggle && mobileNav) {
    navToggle.addEventListener('click', toggleMobileNav);
    mobileNav.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', closeMobileNav);
    });
  }

  window.addEventListener('scroll', setScrolledState, { passive: true });
  setScrolledState();

  const currentFile = window.location.pathname.split('/').pop() || 'index.php';
  document.querySelectorAll('[data-nav-link]').forEach((link) => {
    const href = link.getAttribute('href') || '';
    const hrefFile = href.split('#')[0].split('/').pop() || 'index.php';
    link.classList.toggle('is-active', hrefFile === currentFile);
  });

  const dynamicWord = document.querySelector('[data-dynamic-words]');
  if (dynamicWord && !prefersReducedMotion) {
    const words = dynamicWord.dataset.dynamicWords
      .split(',')
      .map((word) => word.trim())
      .filter(Boolean);
    let index = 0;

    if (words.length > 1) {
      window.setInterval(() => {
        index = (index + 1) % words.length;
        dynamicWord.textContent = words[index];
        dynamicWord.classList.remove('is-swapping');
        window.requestAnimationFrame(() => {
          dynamicWord.classList.add('is-swapping');
        });
      }, 2600);
    }
  }

  if (canUseFinePointer && !prefersReducedMotion) {
    const effectsLayer = document.createElement('div');
    effectsLayer.className = 'site-effects-layer';
    effectsLayer.setAttribute('aria-hidden', 'true');
    document.body.appendChild(effectsLayer);

    const cursor = document.createElement('div');
    cursor.className = 'site-cursor-orb';
    effectsLayer.appendChild(cursor);

    let frame = 0;
    const pointer = { x: window.innerWidth / 2, y: window.innerHeight / 2 };

    window.addEventListener('pointermove', (event) => {
      pointer.x = event.clientX;
      pointer.y = event.clientY;
      if (frame) return;
      frame = window.requestAnimationFrame(() => {
        frame = 0;
        cursor.style.transform = `translate3d(${pointer.x}px, ${pointer.y}px, 0)`;
      });
    }, { passive: true });

    window.addEventListener('pointerdown', (event) => {
      const spark = document.createElement('span');
      spark.className = 'site-click-spark';
      spark.style.left = `${event.clientX}px`;
      spark.style.top = `${event.clientY}px`;
      effectsLayer.appendChild(spark);
      window.setTimeout(() => spark.remove(), 720);
    }, { passive: true });
  }
})();
