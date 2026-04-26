# Static Member 1 Conversion Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Convert `feature/home-integration` from a Next.js/React frontend into a pure static HTML/CSS/vanilla JavaScript site within Member 1's homepage and public shell responsibility.

**Architecture:** Replace the framework app with static page files. `index.html` contains the complete homepage; `pages/*.html` are teammate-owned shell pages; `assets/css/styles.css` owns all visual styling; `assets/js/main.js` owns small progressive interactions.

**Tech Stack:** HTML5, CSS3, vanilla JavaScript, static JPG assets. No Next.js, React, Tailwind build, npm scripts, or package installation remains.

---

## File Structure

Create or keep these files:

- Create: `index.html` — full Member 1 homepage.
- Create: `pages/register.html` — Member 2 shell.
- Create: `pages/login.html` — Member 3 login shell.
- Create: `pages/seller.html` — Member 3 seller shell.
- Create: `pages/search.html` — Member 4 search shell.
- Create: `pages/add-car.html` — Member 4 add-car shell.
- Create: `pages/car-detail.html` — Member 4 car-detail shell.
- Create: `assets/css/styles.css` — all layout, theme, animation, responsive styles.
- Create: `assets/js/main.js` — mobile nav, active nav, dynamic hero word, cursor/click effects.
- Move: `public/images/hero-car.jpg` to `assets/images/hero-car.jpg`.
- Move: `public/images/home/featured-coupe.jpg` to `assets/images/featured-coupe.jpg`.
- Move: `public/images/home/featured-sedan.jpg` to `assets/images/featured-sedan.jpg`.
- Move: `public/images/home/featured-suv.jpg` to `assets/images/featured-suv.jpg`.
- Modify: `README.md` — static-project instructions and member responsibility boundaries.
- Modify: `.gitignore` — static-friendly ignores.

Remove these files/directories after replacements exist:

- Delete: `src/`
- Delete: `package.json`
- Delete: `package-lock.json`
- Delete: `next.config.mjs`
- Delete: `postcss.config.mjs`
- Delete: `eslint.config.mjs`
- Delete: `jsconfig.json`
- Delete: `public/`
- Do not commit: `.next/`, `node_modules/`, `.DS_Store`

## Task 1: Prepare Static Directories and Assets

**Files:**
- Create: `assets/css/.gitkeep`
- Create: `assets/js/.gitkeep`
- Move: `public/images/hero-car.jpg` to `assets/images/hero-car.jpg`
- Move: `public/images/home/featured-coupe.jpg` to `assets/images/featured-coupe.jpg`
- Move: `public/images/home/featured-sedan.jpg` to `assets/images/featured-sedan.jpg`
- Move: `public/images/home/featured-suv.jpg` to `assets/images/featured-suv.jpg`

- [ ] **Step 1: Confirm branch and current status**

Run:

```bash
git branch --show-current
git status -sb
```

Expected:

```text
feature/home-integration
```

Only planned docs or local `node_modules` should be present. Do not add `node_modules`.

- [ ] **Step 2: Create static asset directories**

Run:

```bash
mkdir -p assets/css assets/js assets/images pages
```

Expected: command exits successfully.

- [ ] **Step 3: Move homepage images**

Run:

```bash
mv public/images/hero-car.jpg assets/images/hero-car.jpg
mv public/images/home/featured-coupe.jpg assets/images/featured-coupe.jpg
mv public/images/home/featured-sedan.jpg assets/images/featured-sedan.jpg
mv public/images/home/featured-suv.jpg assets/images/featured-suv.jpg
```

Expected: all four files exist under `assets/images/`.

- [ ] **Step 4: Verify image files**

Run:

```bash
find assets/images -maxdepth 1 -type f | sort
```

Expected:

```text
assets/images/featured-coupe.jpg
assets/images/featured-sedan.jpg
assets/images/featured-suv.jpg
assets/images/hero-car.jpg
```

- [ ] **Step 5: Commit asset preparation**

Run:

```bash
git add assets/images
git commit -m "chore: prepare static image assets"
```

Expected: commit succeeds and includes only the moved image files.

## Task 2: Build the Static Homepage HTML

**Files:**
- Create: `index.html`

- [ ] **Step 1: Create `index.html` with semantic static sections**

Create `index.html` with this structure and content:

```html
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoSphere | Premium Used Cars</title>
    <meta name="description" content="A premium used-car showroom concept for curated high-end vehicles.">
    <link rel="stylesheet" href="assets/css/styles.css">
  </head>
  <body>
    <div class="site-canvas">
      <header class="site-navbar" data-site-navbar>
        <div class="shell-container site-navbar__inner">
          <a class="site-logo" href="index.html">AutoSphere</a>
          <nav class="site-nav site-nav--desktop" aria-label="Primary navigation">
            <a href="pages/search.html" data-nav-link="search">Search</a>
            <a href="pages/add-car.html" data-nav-link="add-car">Add Car</a>
            <a href="pages/register.html" data-nav-link="register">Register</a>
            <a href="pages/login.html" data-nav-link="login">Login</a>
          </nav>
          <button class="site-nav-toggle" type="button" aria-label="Toggle navigation menu" aria-controls="mobile-navigation" aria-expanded="false" data-nav-toggle>
            <span class="site-nav-toggle__line"></span>
            <span class="site-nav-toggle__line"></span>
          </button>
          <nav id="mobile-navigation" class="site-nav site-nav--mobile" aria-label="Mobile navigation" data-mobile-nav>
            <a href="pages/search.html" data-nav-link="search">Search</a>
            <a href="pages/add-car.html" data-nav-link="add-car">Add Car</a>
            <a href="pages/register.html" data-nav-link="register">Register</a>
            <a href="pages/login.html" data-nav-link="login">Login</a>
          </nav>
        </div>
      </header>

      <main class="home-root">
        <div class="home-holo-silk" aria-hidden="true">
          <span class="home-holo-silk__base"></span>
          <span class="home-holo-silk__veil home-holo-silk__veil--one"></span>
          <span class="home-holo-silk__veil home-holo-silk__veil--two"></span>
          <span class="home-holo-silk__spot home-holo-silk__spot--left"></span>
          <span class="home-holo-silk__spot home-holo-silk__spot--right"></span>
          <span class="home-holo-silk__grain"></span>
        </div>

        <section class="hero-section">
          <div class="hero-aurora-scrim" aria-hidden="true"></div>
          <div class="hero-prism-light" aria-hidden="true">
            <span class="hero-prism-light__beam"></span>
            <span class="hero-prism-light__orb"></span>
            <span class="hero-prism-light__line"></span>
          </div>
          <div class="tech-grid" aria-hidden="true"></div>
          <div class="hero-section-blend" aria-hidden="true"></div>
          <div class="shell-container hero-section__grid">
            <div class="hero-copy">
              <p class="section-eyebrow">Curated premium used cars</p>
              <h1 class="hero-display">
                <span class="hero-display__line">Curated cars.</span>
                <span class="hero-display__line">
                  <span class="hero-dynamic-word" data-dynamic-words="Less noise.,Clearer trust.,Better taste.">Less noise.</span>
                </span>
              </h1>
              <p class="hero-lede">A quieter way to discover premium used vehicles, with verified sellers, clear ownership signals, and inventory presented like a modern showroom.</p>
              <div class="hero-gooey-actions">
                <a class="hero-gooey-button hero-gooey-button--primary" href="pages/search.html"><span>Browse Inventory</span></a>
                <a class="hero-gooey-button hero-gooey-button--secondary" href="pages/register.html"><span>Sell With AutoSphere</span></a>
              </div>
            </div>
            <div class="showroom-poster" aria-label="Premium car showroom visual">
              <div class="showroom-poster__glow"></div>
              <div class="showroom-poster__rainbow"></div>
              <img class="showroom-real-car" src="assets/images/hero-car.jpg" alt="Blue premium sports car parked in a clean sunlit landscape">
            </div>
          </div>
        </section>

        <section id="inventory" class="home-band inventory-section scroll-reveal">
          <div class="shell-container">
            <div class="section-heading">
              <p class="section-eyebrow section-eyebrow--blue">Featured Inventory</p>
              <h2>Selected to feel like a collection, not a classifieds wall.</h2>
            </div>
            <div class="inventory-runway">
              <article class="inventory-runway__item">
                <figure class="inventory-runway__media inventory-runway__media--0">
                  <img class="inventory-runway__image inventory-runway__image--0" src="assets/images/featured-sedan.jpg" alt="Bentley Flying Spur exterior preview" loading="lazy">
                </figure>
                <div class="inventory-runway__copy">
                  <p class="inventory-runway__meta">2021 · 18,000 km · W12</p>
                  <h3>Bentley Flying Spur</h3>
                  <p>A chauffeur-grade flagship with modern cabin detail and effortless torque.</p>
                </div>
              </article>
              <article class="inventory-runway__item">
                <figure class="inventory-runway__media inventory-runway__media--1">
                  <img class="inventory-runway__image inventory-runway__image--1" src="assets/images/featured-suv.jpg" alt="Range Rover Autobiography exterior preview" loading="lazy">
                </figure>
                <div class="inventory-runway__copy">
                  <p class="inventory-runway__meta">2022 · 12,000 km · P530</p>
                  <h3>Range Rover Autobiography</h3>
                  <p>A commanding long-distance cruiser with tailored comfort and all-terrain authority.</p>
                </div>
              </article>
              <article class="inventory-runway__item">
                <figure class="inventory-runway__media inventory-runway__media--2">
                  <img class="inventory-runway__image inventory-runway__image--2" src="assets/images/featured-coupe.jpg" alt="Aston Martin DB11 exterior preview" loading="lazy">
                </figure>
                <div class="inventory-runway__copy">
                  <p class="inventory-runway__meta">2020 · 9,500 km · V8</p>
                  <h3>Aston Martin DB11</h3>
                  <p>A grand tourer chosen for silhouette, sound, and occasion.</p>
                </div>
              </article>
            </div>
          </div>
        </section>

        <section class="home-band trust-section scroll-reveal">
          <div class="shell-container trust-section__grid">
            <div class="section-heading">
              <p class="section-eyebrow section-eyebrow--green">Why Buy Here</p>
              <h2>Trust should be visible before the first enquiry is sent.</h2>
            </div>
            <div class="trust-list">
              <article class="shell-card effect-electric effect-glare">
                <h3>Seller Verification</h3>
                <p>Only approved sellers appear in the premium inventory flow.</p>
              </article>
              <article class="shell-card effect-electric effect-glare">
                <h3>Vehicle History</h3>
                <p>Every featured vehicle is presented with clear provenance cues and condition context.</p>
              </article>
              <article class="shell-card effect-electric effect-glare">
                <h3>Secure Deal Flow</h3>
                <p>The platform story should signal a guided, trustworthy handoff instead of a chaotic listing board.</p>
              </article>
            </div>
          </div>
        </section>

        <section class="home-band sell-section scroll-reveal">
          <div class="shell-container">
            <div class="sell-panel shell-card effect-electric">
              <div class="sell-panel__wash" aria-hidden="true"></div>
              <div class="sell-panel__content">
                <div>
                  <p class="section-eyebrow section-eyebrow--pink">Sell With Us</p>
                  <h2>Present your vehicle with the same confidence buyers expect from a premium showroom.</h2>
                </div>
                <div>
                  <ul class="seller-perks">
                    <li>Premium listing presentation</li>
                    <li>Concierge-style onboarding</li>
                    <li>Stronger buyer trust cues</li>
                  </ul>
                  <a class="dark-pill-link" href="pages/add-car.html">Start Listing</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

      <footer class="site-footer">
        <div class="shell-container site-footer__grid">
          <div class="site-footer__intro">
            <p class="site-footer__brand">AutoSphere</p>
            <h2>Exceptional cars, presented with calm confidence.</h2>
            <p>A premium coursework concept for browsing, listing, and presenting high-end used vehicles.</p>
          </div>
          <div>
            <h3>Browse</h3>
            <ul>
              <li><a href="pages/search.html">Search Cars</a></li>
              <li><a href="#inventory">Featured Selection</a></li>
            </ul>
          </div>
          <div>
            <h3>Sell</h3>
            <ul>
              <li><a href="pages/add-car.html">List a Vehicle</a></li>
              <li><a href="pages/register.html">Seller Registration</a></li>
            </ul>
          </div>
          <div>
            <h3>Account</h3>
            <ul>
              <li><a href="pages/login.html">Seller Login</a></li>
            </ul>
          </div>
        </div>
        <div class="shell-container site-footer__bottom">QHE4103 Fundamentals of Web Technology · Member 1 shell and homepage integration by wangchaoyu.</div>
      </footer>
    </div>
    <script src="assets/js/main.js"></script>
  </body>
</html>
```

- [ ] **Step 2: Verify homepage file references**

Run:

```bash
rg "src/|next/|react|/images/" index.html
```

Expected: no output. Static references should use `assets/...` or `pages/...`.

- [ ] **Step 3: Commit homepage HTML**

Run:

```bash
git add index.html
git commit -m "feat: add static homepage markup"
```

Expected: commit succeeds with only `index.html`.

## Task 3: Create Static CSS

**Files:**
- Create: `assets/css/styles.css`

- [ ] **Step 1: Create base CSS and shell styles**

Create `assets/css/styles.css` with this opening content:

```css
:root {
  --font-sans: "Avenir Next", "SF Pro Display", "Helvetica Neue", Arial, sans-serif;
  --color-ink: #080d1b;
  --color-muted: #586376;
  --color-soft: #f8f3ff;
  --color-pink: #ff3d7f;
  --color-gold: #dab771;
  --color-green: #92c4b3;
  --color-blue: #92bcda;
  --color-cyan: #00b4d8;
  --page-max: 82rem;
  --nav-height: 4.5rem;
  --radius-xl: 1.75rem;
  --shadow-soft: 0 24px 80px rgba(24, 31, 53, 0.12);
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
}

body {
  margin: 0;
  min-width: 320px;
  color: var(--color-ink);
  background:
    radial-gradient(circle at 12% 10%, rgba(255, 61, 127, 0.34), transparent 28%),
    radial-gradient(circle at 88% 12%, rgba(0, 180, 216, 0.34), transparent 26%),
    radial-gradient(circle at 76% 86%, rgba(255, 212, 59, 0.42), transparent 30%),
    linear-gradient(135deg, #fff6cf 0%, #e8fbff 36%, #f7e4ff 68%, #e9ffe8 100%);
  font-family: var(--font-sans);
  -webkit-font-smoothing: antialiased;
  text-rendering: geometricPrecision;
}

img {
  display: block;
  max-width: 100%;
}

a {
  color: inherit;
  text-decoration: none;
}

button {
  font: inherit;
}

.shell-container {
  width: min(100% - 2.5rem, var(--page-max));
  margin-inline: auto;
}

.shell-card {
  position: relative;
  border: 1px solid rgba(255, 255, 255, 0.72);
  border-radius: var(--radius-xl);
  background: rgba(255, 255, 255, 0.58);
  box-shadow: var(--shadow-soft);
  backdrop-filter: blur(22px);
}

.site-canvas {
  min-height: 100vh;
  overflow-x: clip;
}
```

- [ ] **Step 2: Add navbar and footer CSS**

Append these selectors:

```css
.site-navbar {
  position: fixed;
  inset: 0 0 auto;
  z-index: 50;
  padding: 0.75rem;
}

.site-navbar__inner {
  position: relative;
  display: flex;
  align-items: center;
  gap: 1rem;
  min-height: 3.5rem;
  border: 1px solid rgba(255, 255, 255, 0.72);
  border-radius: 999px;
  background: rgba(255, 255, 255, 0.72);
  box-shadow: 0 18px 60px rgba(24, 31, 53, 0.12);
  padding: 0.55rem 0.85rem;
  backdrop-filter: blur(22px);
  transition: box-shadow 240ms ease, background 240ms ease;
}

.site-navbar.is-scrolled .site-navbar__inner {
  background: rgba(255, 255, 255, 0.84);
  box-shadow: 0 20px 70px rgba(24, 31, 53, 0.18);
}

.site-logo,
.site-footer__brand {
  background: linear-gradient(90deg, #ff3d7f, #ffb703, #00b4d8);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  font-size: 0.95rem;
  font-weight: 900;
  letter-spacing: 0.18em;
}

.site-nav--desktop {
  display: none;
  flex: 1;
  justify-content: center;
  gap: 1.5rem;
}

.site-nav a {
  border-radius: 999px;
  padding: 0.55rem 0.8rem;
  color: #475569;
  font-size: 0.9rem;
  transition: background 180ms ease, color 180ms ease;
}

.site-nav a:hover,
.site-nav a.is-active {
  background: #080d1b;
  color: #fff;
}

.site-nav-toggle {
  margin-left: auto;
  display: inline-flex;
  width: 2.5rem;
  height: 2.5rem;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(255, 255, 255, 0.72);
  border-radius: 999px;
  background: rgba(255, 255, 255, 0.72);
}

.site-nav-toggle__line {
  position: absolute;
  width: 1rem;
  height: 2px;
  border-radius: 99px;
  background: #080d1b;
  transition: transform 180ms ease;
}

.site-nav-toggle__line:first-child {
  transform: translateY(-4px);
}

.site-nav-toggle__line:last-child {
  transform: translateY(4px);
}

body.nav-open .site-nav-toggle__line:first-child {
  transform: rotate(45deg);
}

body.nav-open .site-nav-toggle__line:last-child {
  transform: rotate(-45deg);
}

.site-nav--mobile {
  position: absolute;
  left: 0.75rem;
  right: 0.75rem;
  top: calc(100% + 0.6rem);
  display: grid;
  max-height: 0;
  overflow: hidden;
  border-radius: 1.5rem;
  background: rgba(255, 255, 255, 0.86);
  box-shadow: 0 20px 60px rgba(24, 31, 53, 0.14);
  opacity: 0;
  padding: 0;
  backdrop-filter: blur(22px);
  transition: max-height 220ms ease, opacity 180ms ease, padding 180ms ease;
}

body.nav-open .site-nav--mobile {
  max-height: 20rem;
  opacity: 1;
  padding: 0.5rem;
}

.site-nav--mobile a {
  display: block;
  padding: 0.85rem 1rem;
}

.site-footer {
  position: relative;
  border-top: 1px solid rgba(255, 255, 255, 0.7);
  background: rgba(255, 255, 255, 0.62);
  box-shadow: 0 -28px 90px rgba(24, 31, 53, 0.1);
  padding: 3.5rem 0 2rem;
  backdrop-filter: blur(22px);
}

.site-footer__grid {
  display: grid;
  gap: 2rem;
}

.site-footer h2 {
  margin: 0.8rem 0 0;
  max-width: 24rem;
  font-size: clamp(1.45rem, 3vw, 2rem);
  letter-spacing: -0.04em;
}

.site-footer p,
.site-footer li {
  color: var(--color-muted);
  line-height: 1.65;
}

.site-footer ul {
  display: grid;
  gap: 0.7rem;
  list-style: none;
  margin: 1rem 0 0;
  padding: 0;
}

.site-footer a:hover {
  color: var(--color-pink);
}

.site-footer__bottom {
  margin-top: 2rem;
  border-top: 1px solid rgba(8, 13, 27, 0.1);
  padding-top: 1.1rem;
  color: #64748b;
  font-size: 0.8rem;
}
```

- [ ] **Step 3: Add homepage layout and effect CSS**

Append this section, then complete the selector list in Step 4 before browser review:

```css
.home-root {
  position: relative;
  isolation: isolate;
  overflow: hidden;
  background:
    radial-gradient(circle at 12% 8%, rgba(255, 255, 255, 0.84), transparent 24%),
    linear-gradient(135deg, #fff8ee 0%, #eef9ff 42%, #f8eaff 68%, #eefced 100%);
}

.home-root > section {
  position: relative;
  z-index: 1;
}

.home-band {
  padding-block: clamp(4rem, 9vw, 7rem);
}

.hero-section {
  position: relative;
  display: flex;
  min-height: 100svh;
  align-items: center;
  overflow: hidden;
  padding-top: 7rem;
}

.hero-section__grid {
  position: relative;
  z-index: 10;
  display: grid;
  align-items: center;
  gap: clamp(3rem, 6vw, 5.5rem);
  padding-block: 4rem;
}

.section-eyebrow {
  margin: 0 0 1.25rem;
  color: #64748b;
  font-size: 0.75rem;
  font-weight: 800;
  letter-spacing: 0.32em;
  text-transform: uppercase;
}

.section-eyebrow--blue {
  color: #00a6c8;
}

.section-eyebrow--green {
  color: #40b878;
}

.section-eyebrow--pink {
  color: var(--color-pink);
}

.hero-display {
  margin: 0;
  color: var(--color-ink);
  font-size: clamp(3.25rem, 8vw, 6rem);
  font-weight: 900;
  letter-spacing: -0.075em;
  line-height: 0.9;
}

.hero-display__line {
  display: block;
}

.hero-dynamic-word {
  display: inline-block;
  background: linear-gradient(90deg, #ff3d7f 0%, #ffb703 36%, #40e69a 68%, #00b4d8 100%);
  background-size: 180% 100%;
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  filter: drop-shadow(0 18px 38px rgba(255, 61, 127, 0.2));
  animation: gradient-drift 4s ease-in-out infinite alternate;
}

.hero-dynamic-word.is-swapping {
  animation: dynamic-word-enter 460ms cubic-bezier(0.19, 1, 0.22, 1) both, gradient-drift 4s ease-in-out infinite alternate;
}

.hero-lede {
  max-width: 38rem;
  color: #475569;
  font-size: clamp(1rem, 1.8vw, 1.12rem);
  line-height: 1.8;
}

.hero-gooey-actions {
  position: relative;
  display: inline-flex;
  width: max-content;
  flex-direction: column;
  gap: 0.7rem;
  isolation: isolate;
}

.hero-gooey-actions::before,
.hero-gooey-actions::after {
  content: "";
  position: absolute;
  z-index: -1;
  border-radius: 999px;
  pointer-events: none;
}

.hero-gooey-actions::before {
  inset: -0.26rem auto -0.26rem -0.28rem;
  width: 12.55rem;
  background:
    radial-gradient(circle at 18% 20%, rgba(255, 255, 255, 0.88), transparent 25%),
    linear-gradient(115deg, rgba(226, 142, 130, 0.58), rgba(218, 183, 113, 0.5), rgba(146, 196, 179, 0.5), rgba(146, 188, 218, 0.56), rgba(182, 165, 211, 0.46));
  background-size: 155% 155%;
  box-shadow: 0 20px 48px rgba(121, 92, 84, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.62);
  transition: transform 520ms cubic-bezier(0.19, 1, 0.22, 1), width 520ms cubic-bezier(0.19, 1, 0.22, 1);
  animation: prism-rim-shift 5.5s ease-in-out infinite alternate;
}

.hero-gooey-button {
  position: relative;
  display: inline-flex;
  min-height: 3.25rem;
  align-items: center;
  justify-content: center;
  border-radius: 999px;
  padding: 0.95rem 1.75rem;
  color: var(--color-ink);
  font-size: 0.9rem;
  font-weight: 800;
  white-space: nowrap;
}

.hero-gooey-button span {
  position: relative;
  z-index: 2;
}

.hero-gooey-button::before {
  content: "";
  position: absolute;
  inset: 0.15rem;
  z-index: 1;
  border-radius: inherit;
  background: linear-gradient(180deg, rgba(255, 255, 255, 0.9), rgba(244, 247, 246, 0.74));
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.86);
}

.hero-gooey-button--primary {
  width: 11.95rem;
}

.hero-gooey-button--secondary {
  width: 13.1rem;
  border: 1px solid rgba(8, 13, 27, 0.08);
  background: rgba(255, 255, 255, 0.58);
  backdrop-filter: blur(18px);
}
```

- [ ] **Step 4: Add remaining required selectors**

Add CSS for the following selectors by translating from `src/app/globals.css` into semantic non-Tailwind CSS:

```text
.home-holo-silk
.home-holo-silk__base
.home-holo-silk__veil
.home-holo-silk__veil--one
.home-holo-silk__veil--two
.home-holo-silk__spot
.home-holo-silk__spot--left
.home-holo-silk__spot--right
.home-holo-silk__grain
.hero-aurora-scrim
.hero-prism-light
.hero-prism-light__beam
.hero-prism-light__orb
.hero-prism-light__line
.tech-grid
.hero-section-blend
.showroom-poster
.showroom-poster__glow
.showroom-poster__rainbow
.showroom-real-car
.section-heading
.inventory-runway
.inventory-runway__item
.inventory-runway__media
.inventory-runway__image
.inventory-runway__copy
.inventory-runway__meta
.trust-section__grid
.trust-list
.sell-panel
.sell-panel__wash
.sell-panel__content
.seller-perks
.dark-pill-link
.effect-electric
.effect-glare
.scroll-reveal
.site-cursor-orb
.site-click-spark
```

Use the current `globals.css` animation names and keyframes:

```text
electric-spin
gradient-drift
prism-beam-breathe
prism-orb-drift
prism-line-scan
prism-rim-shift
spectral-sweep
spectral-flare
holo-silk-veil-one
holo-silk-veil-two
holo-silk-spot-left
holo-silk-spot-right
dynamic-word-enter
premium-car-float
reveal-up
click-spark
```

- [ ] **Step 5: Add responsive rules**

Append:

```css
@media (min-width: 640px) {
  .hero-gooey-actions {
    flex-direction: row;
  }

  .hero-gooey-actions:has(.hero-gooey-button--secondary:hover)::before {
    transform: translateX(12.66rem);
  }
}

@media (min-width: 768px) {
  .site-nav--desktop {
    display: flex;
  }

  .site-nav-toggle,
  .site-nav--mobile {
    display: none;
  }

  .site-footer__grid {
    grid-template-columns: 1.4fr repeat(3, 1fr);
  }
}

@media (min-width: 1024px) {
  .hero-section__grid {
    grid-template-columns: 0.9fr 1.1fr;
  }

  .inventory-runway {
    grid-template-columns: 1.12fr 0.9fr 0.9fr;
    align-items: end;
  }

  .inventory-runway__item:nth-child(2) {
    transform: translateY(2.4rem);
  }

  .inventory-runway__item:nth-child(3) {
    transform: translateY(-1.2rem);
  }

  .trust-section__grid,
  .sell-panel__content {
    grid-template-columns: 1.1fr 1.4fr;
  }
}

@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
```

- [ ] **Step 6: Verify CSS has no Tailwind or Next dependency**

Run:

```bash
rg "@import|tailwind|next|react|@apply" assets/css/styles.css
```

Expected: no output.

- [ ] **Step 7: Commit CSS**

Run:

```bash
git add assets/css/styles.css
git commit -m "style: add static visual system"
```

Expected: commit succeeds with only `assets/css/styles.css`.

## Task 4: Add Vanilla JavaScript Interactions

**Files:**
- Create: `assets/js/main.js`

- [ ] **Step 1: Create `main.js`**

Create `assets/js/main.js`:

```js
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

  const currentFile = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('[data-nav-link]').forEach((link) => {
    const href = link.getAttribute('href') || '';
    const isActive = href.endsWith(currentFile) || (currentFile === 'index.html' && href.endsWith('index.html'));
    link.classList.toggle('is-active', isActive);
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
```

- [ ] **Step 2: Add effects layer CSS if missing**

Ensure `assets/css/styles.css` contains:

```css
.site-effects-layer {
  position: fixed;
  inset: 0;
  z-index: 60;
  pointer-events: none;
}
```

- [ ] **Step 3: Verify no imports or dependencies**

Run:

```bash
rg "import|require|react|next|gsap|lenis|three" assets/js/main.js
```

Expected: no output.

- [ ] **Step 4: Commit JavaScript**

Run:

```bash
git add assets/js/main.js assets/css/styles.css
git commit -m "feat: add static site interactions"
```

Expected: commit succeeds.

## Task 5: Add Teammate Page Shells

**Files:**
- Create: `pages/register.html`
- Create: `pages/login.html`
- Create: `pages/seller.html`
- Create: `pages/search.html`
- Create: `pages/add-car.html`
- Create: `pages/car-detail.html`

- [ ] **Step 1: Create the shared page shell template**

Use this structure for each file, adjusting title, eyebrow, heading, owner, and content comment:

```html
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoSphere | Seller Registration</title>
    <meta name="description" content="AutoSphere static shell page.">
    <link rel="stylesheet" href="../assets/css/styles.css">
  </head>
  <body>
    <div class="site-canvas site-page-shell">
      <header class="site-navbar" data-site-navbar>
        <div class="shell-container site-navbar__inner">
          <a class="site-logo" href="../index.html">AutoSphere</a>
          <nav class="site-nav site-nav--desktop" aria-label="Primary navigation">
            <a href="search.html" data-nav-link="search">Search</a>
            <a href="add-car.html" data-nav-link="add-car">Add Car</a>
            <a href="register.html" data-nav-link="register">Register</a>
            <a href="login.html" data-nav-link="login">Login</a>
          </nav>
          <button class="site-nav-toggle" type="button" aria-label="Toggle navigation menu" aria-controls="mobile-navigation" aria-expanded="false" data-nav-toggle>
            <span class="site-nav-toggle__line"></span>
            <span class="site-nav-toggle__line"></span>
          </button>
          <nav id="mobile-navigation" class="site-nav site-nav--mobile" aria-label="Mobile navigation" data-mobile-nav>
            <a href="search.html" data-nav-link="search">Search</a>
            <a href="add-car.html" data-nav-link="add-car">Add Car</a>
            <a href="register.html" data-nav-link="register">Register</a>
            <a href="login.html" data-nav-link="login">Login</a>
          </nav>
        </div>
      </header>

      <main class="member-page">
        <section class="shell-container member-page__panel shell-card">
          <p class="section-eyebrow section-eyebrow--pink">Member 2 Area</p>
          <h1>Seller Registration</h1>
          <p>This page keeps the shared AutoSphere shell ready for the seller registration workflow.</p>
          <!-- Member 2 content starts here -->
        </section>
      </main>

      <footer class="site-footer">
        <div class="shell-container site-footer__bottom">QHE4103 Fundamentals of Web Technology · Shared shell by Member 1 wangchaoyu.</div>
      </footer>
    </div>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
```

- [ ] **Step 2: Create each page with exact owner mapping**

Use these substitutions:

```text
pages/register.html
Title: AutoSphere | Seller Registration
Eyebrow: Member 2 Area
Heading: Seller Registration
Comment: <!-- Member 2 content starts here -->

pages/login.html
Title: AutoSphere | Seller Login
Eyebrow: Member 3 Area
Heading: Seller Login
Comment: <!-- Member 3 login content starts here -->

pages/seller.html
Title: AutoSphere | Seller Dashboard
Eyebrow: Member 3 Area
Heading: Seller Dashboard
Comment: <!-- Member 3 seller flow content starts here -->

pages/search.html
Title: AutoSphere | Search Cars
Eyebrow: Member 4 Area
Heading: Search Cars
Comment: <!-- Member 4 search content starts here -->

pages/add-car.html
Title: AutoSphere | Add Car
Eyebrow: Member 4 Area
Heading: Add Car
Comment: <!-- Member 4 add-car content starts here -->

pages/car-detail.html
Title: AutoSphere | Car Detail
Eyebrow: Member 4 Area
Heading: Car Detail
Comment: <!-- Member 4 car-detail content starts here -->
```

- [ ] **Step 3: Add teammate shell CSS**

Append:

```css
.site-page-shell {
  min-height: 100vh;
  background:
    radial-gradient(circle at 28% 30%, rgba(255, 61, 127, 0.24), transparent 24%),
    radial-gradient(circle at 72% 28%, rgba(0, 180, 216, 0.28), transparent 26%),
    linear-gradient(135deg, rgba(255, 246, 207, 0.72), rgba(232, 251, 255, 0.68) 42%, rgba(247, 228, 255, 0.72));
}

.member-page {
  min-height: 72vh;
  padding: 9rem 0 5rem;
}

.member-page__panel {
  overflow: hidden;
  padding: clamp(2rem, 5vw, 4rem);
}

.member-page h1 {
  margin: 0;
  max-width: 48rem;
  font-size: clamp(2.75rem, 7vw, 5.5rem);
  line-height: 0.92;
  letter-spacing: -0.07em;
}

.member-page p {
  max-width: 44rem;
  color: var(--color-muted);
  font-size: 1.05rem;
  line-height: 1.75;
}
```

- [ ] **Step 4: Verify every page links to CSS and JS correctly**

Run:

```bash
rg "assets/css|assets/js|src/|next|react" pages
```

Expected:

```text
pages/register.html:    <link rel="stylesheet" href="../assets/css/styles.css">
pages/register.html:    <script src="../assets/js/main.js"></script>
...
```

There should be no `src/`, `next`, or `react` matches.

- [ ] **Step 5: Commit page shells**

Run:

```bash
git add pages assets/css/styles.css
git commit -m "feat: add static teammate page shells"
```

Expected: commit succeeds.

## Task 6: Remove Framework Files and Update Docs

**Files:**
- Modify: `README.md`
- Modify: `.gitignore`
- Delete: `src/`
- Delete: `package.json`
- Delete: `package-lock.json`
- Delete: `next.config.mjs`
- Delete: `postcss.config.mjs`
- Delete: `eslint.config.mjs`
- Delete: `jsconfig.json`
- Delete: `public/`

- [ ] **Step 1: Delete framework files**

Run:

```bash
rm -rf src public package.json package-lock.json next.config.mjs postcss.config.mjs eslint.config.mjs jsconfig.json
```

Expected: files are removed from the working tree. Do not remove `docs/`, `assets/`, `pages/`, `index.html`, `README.md`, or `.gitignore`.

- [ ] **Step 2: Replace `.gitignore`**

Set `.gitignore` to:

```gitignore
.DS_Store
Thumbs.db
*.log
.env
.env.*
.vscode/
.idea/
node_modules/
.next/
dist/
```

- [ ] **Step 3: Replace README with static instructions**

Set `README.md` to:

```markdown
# QHE4103 Online Car Sale Website

Static frontend for a high-end used-car sales coursework project.

## How to Open

This branch is a pure HTML/CSS/JavaScript static site.

No Node.js setup is required. Do not run `npm install`, `npm run dev`, or `npm run build`.

Recommended local preview:

1. Open the folder in VS Code.
2. Install or use the Live Server extension.
3. Open `index.html` with Live Server.

Direct browser opening also works for the homepage:

```text
index.html
```

## Project Structure

```text
index.html              Homepage owned by Member 1
pages/                  Static shells for teammate pages
assets/css/styles.css   Shared visual system
assets/js/main.js       Small shared interactions
assets/images/          Homepage image assets
```

## Member Responsibilities

| Member | GitHub Username | Responsibility |
|---|---|---|
| Member 1 | `wangchaoyu` | Homepage, shared navigation, footer, visual shell, responsive layout |
| Member 2 | `luojingyu` | Seller registration content inside `pages/register.html` |
| Member 3 | `juzi` | Login and seller flow content inside `pages/login.html` and `pages/seller.html` |
| Member 4 | `taogefei` | Search, add-car, and car detail content inside `pages/search.html`, `pages/add-car.html`, and `pages/car-detail.html` |

## Collaboration Rules

- Member 1 maintains `index.html`, `assets/css/styles.css`, `assets/js/main.js`, global navigation, footer, and public shell.
- Other members should add their business page content inside the marked content area in their assigned page.
- Do not duplicate global navigation or footer markup inside a business page.
- Coordinate before changing shared styles in `assets/css/styles.css`.

## Current Pages

- `index.html`
- `pages/register.html`
- `pages/login.html`
- `pages/seller.html`
- `pages/search.html`
- `pages/add-car.html`
- `pages/car-detail.html`

## Notes

The project was converted from Next.js/React to static HTML/CSS/JavaScript so every teammate can open and edit the project without framework configuration.
```

- [ ] **Step 4: Verify deleted framework references**

Run:

```bash
find . -maxdepth 2 -type f | sort
rg "next|react|tailwind|npm run|npm install|src/app|package.json" README.md index.html pages assets
```

Expected: the `rg` command should only match the README historical note if kept; prefer no framework setup instructions.

- [ ] **Step 5: Commit cleanup and docs**

Run:

```bash
git add -A
git commit -m "chore: remove framework setup for static site"
```

Expected: commit succeeds.

## Task 7: Static Verification and Final Commit Hygiene

**Files:**
- Verify: `index.html`
- Verify: `pages/*.html`
- Verify: `assets/css/styles.css`
- Verify: `assets/js/main.js`
- Verify: `README.md`

- [ ] **Step 1: Check final tracked file list**

Run:

```bash
git ls-files | sort
```

Expected tracked files:

```text
.gitignore
AGENTS.md
CLAUDE.md
README.md
assets/css/styles.css
assets/images/featured-coupe.jpg
assets/images/featured-sedan.jpg
assets/images/featured-suv.jpg
assets/images/hero-car.jpg
assets/js/main.js
docs/superpowers/plans/2026-04-26-static-member1-conversion.md
docs/superpowers/specs/2026-04-26-static-member1-conversion-design.md
index.html
pages/add-car.html
pages/car-detail.html
pages/login.html
pages/register.html
pages/search.html
pages/seller.html
```

If `AGENTS.md` or `CLAUDE.md` are intentionally retained from the original repo, keep them. If the user wants a coursework-only static folder, ask before deleting them.

- [ ] **Step 2: Start a static local server for preview**

Run:

```bash
python3 -m http.server 3000
```

Expected:

```text
Serving HTTP on :: port 3000
```

If port `3000` is occupied, run:

```bash
python3 -m http.server 3001
```

- [ ] **Step 3: Manually inspect in browser**

Open:

```text
http://127.0.0.1:3000/
```

Check:

- Homepage loads with the same premium high-end visual direction.
- Hero car image appears.
- Featured inventory images appear.
- Dynamic hero word rotates.
- Click spark appears on pointer click.
- Mobile navigation opens and closes under narrow viewport.
- Links open `pages/*.html`.
- Each teammate page uses shared header and footer.

- [ ] **Step 4: Verify no framework files remain**

Run:

```bash
test ! -e package.json
test ! -e package-lock.json
test ! -e src
test ! -e public
test ! -e next.config.mjs
test ! -e postcss.config.mjs
test ! -e eslint.config.mjs
test ! -e jsconfig.json
```

Expected: all commands exit with status `0`.

- [ ] **Step 5: Verify working tree before handoff**

Run:

```bash
git status -sb
```

Expected:

```text
## feature/home-integration...origin/feature/home-integration [ahead N]
```

There should be no unstaged changes except ignored local files such as `node_modules/`.

- [ ] **Step 6: Final handoff**

Report:

```text
Static conversion is complete on feature/home-integration.
Open with Live Server or python3 -m http.server.
No npm install/build step is required.
```

Do not merge into `develop` until the user visually approves the static site.
