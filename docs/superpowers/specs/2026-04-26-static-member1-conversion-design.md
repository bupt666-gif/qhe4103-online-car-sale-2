# Static Member 1 Conversion Design

Date: 2026-04-26
Branch target: `feature/home-integration`

## Goal

Convert the project from a Next.js/React frontend into a pure static website that teammates can open without configuring Node.js, npm, Next.js, or React.

The conversion must stay inside Member 1 `wangchaoyu`'s responsibility:

- Maintain the homepage.
- Maintain the global navigation, footer, background shell, shared visual style, and responsive layout framework.
- Provide reusable static page shells for teammates.
- Do not rewrite teammates' business page content or business logic.

## Chosen Approach

Use a full static project structure on `feature/home-integration`, then merge into `develop` only after visual and file-structure review.

The static stack is:

- HTML for pages.
- CSS for layout, responsive behavior, theme, animations, gradients, and visual effects.
- Small vanilla JavaScript for interaction only.

No React, Next.js, Tailwind build step, npm scripts, or package installation will remain.

## Target File Structure

```text
/
├── index.html
├── pages/
│   ├── register.html
│   ├── login.html
│   ├── seller.html
│   ├── search.html
│   ├── add-car.html
│   └── car-detail.html
├── assets/
│   ├── css/
│   │   └── styles.css
│   ├── js/
│   │   └── main.js
│   └── images/
│       ├── hero-car.jpg
│       ├── featured-coupe.jpg
│       ├── featured-sedan.jpg
│       └── featured-suv.jpg
├── README.md
└── .gitignore
```

## Page Scope

### `index.html`

`index.html` is the complete Member 1 homepage.

It should preserve the current high-end used-car platform direction:

- Premium, young, dopamine-inspired color palette.
- Fashionable technology feeling.
- Real car imagery that matches the page color tone.
- Holographic/rainbow background lighting.
- High-impact hero section.
- Featured inventory runway.
- Trust and seller call-to-action sections.
- Shared navigation and footer.

### `pages/*.html`

The teammate pages are static shell pages, not full business rewrites.

Each page should include:

- The same global navigation.
- The same global footer.
- A visually consistent page background shell.
- A clear content boundary comment, such as `<!-- Member 2 content starts here -->`.
- Minimal ownership copy explaining which teammate owns the page.

These pages exist so teammates have a working static route and a consistent place to insert their own business content.

## Static Component Mapping

The current React structure maps into static sections:

```text
src/app/layout.js                  -> repeated static shell in each HTML file
src/components/layout/Navbar.jsx   -> <header class="site-navbar">
src/components/layout/Footer.jsx   -> <footer class="site-footer">
src/components/layout/SiteBackdrop.jsx -> <div class="site-backdrop">
src/app/page.js                    -> index.html <main>
src/components/home/Hero.jsx       -> <section class="hero-section">
src/components/home/CuratedInventory.jsx -> <section class="inventory-section">
src/components/home/TrustSection.jsx -> <section class="trust-section">
src/components/home/SellWithUs.jsx -> <section class="sell-section">
src/components/home/homeContent.js -> direct HTML content
```

The static conversion should favor simple readable HTML over data-driven rendering, because the main reason for conversion is teammate accessibility.

## CSS Design

`assets/css/styles.css` owns all global and page-specific styling.

It should include:

- CSS variables for colors, spacing, radii, shadows, typography, and max widths.
- Base reset and typography.
- Global shell styles.
- Navigation and footer styles.
- Homepage section styles.
- Teammate page shell styles.
- Responsive rules for desktop, tablet, and mobile.
- CSS-only visual effects currently implemented in `globals.css`.

The current Tailwind utility usage should be converted into explicit semantic classes. The CSS should be readable by teammates who understand regular HTML and CSS.

## JavaScript Design

`assets/js/main.js` should stay small and dependency-free.

Allowed responsibilities:

- Toggle the mobile navigation menu.
- Rotate the dynamic hero word.
- Create click spark effects.
- Optionally add a lightweight custom cursor effect on pointer devices.
- Update active navigation state based on the current path.

Disallowed responsibilities:

- Rendering page content from large data arrays.
- Recreating React-style component systems.
- Adding external libraries.
- Implementing teammate business logic.

If an interaction can be handled clearly in CSS, prefer CSS.

## Asset Migration

Move only needed visual assets:

```text
public/images/hero-car.jpg                 -> assets/images/hero-car.jpg
public/images/home/featured-coupe.jpg      -> assets/images/featured-coupe.jpg
public/images/home/featured-sedan.jpg      -> assets/images/featured-sedan.jpg
public/images/home/featured-suv.jpg        -> assets/images/featured-suv.jpg
```

Remove unused Next default assets such as `next.svg`, `vercel.svg`, `file.svg`, `globe.svg`, and `window.svg`.

## Deletion Plan

Remove framework files after static replacements exist:

- `src/`
- `package.json`
- `package-lock.json`
- `next.config.mjs`
- `postcss.config.mjs`
- `eslint.config.mjs`
- `jsconfig.json`

Do not commit local generated folders:

- `.next/`
- `node_modules/`

## README Design

Update `README.md` to describe the static project.

It should explain:

- The project is now a pure HTML/CSS/JavaScript static site.
- No `npm install`, `npm run dev`, or `npm run build` is needed.
- Recommended local viewing method is VS Code Live Server.
- `index.html` is the homepage.
- `pages/*.html` are teammate-owned page shells.
- Member 1 owns the public shell, homepage, shared styles, and shared interactions.
- Other members should add their business content inside their own page content area.
- Shared style changes should be coordinated to avoid breaking the full-site shell.

## Verification

Because the project becomes static, there is no build step.

Manual verification should cover:

- Open `index.html` directly in a browser.
- Open `index.html` through VS Code Live Server.
- Check desktop layout.
- Check mobile layout.
- Check mobile navigation open and close behavior.
- Check homepage dynamic word rotation.
- Check click spark effect.
- Check all navigation links.
- Check all image paths.
- Check each `pages/*.html` shell loads with the shared header and footer.

## Risks

The main visual risk is losing some of the current React/Tailwind styling during conversion. This is controlled by converting the existing design into semantic CSS classes section by section.

The main collaboration risk is accidentally editing teammate business pages. This is controlled by keeping teammate pages as shells with clear ownership comments and not implementing their forms, search, authentication, or car data logic.

The main technical risk is broken relative paths after moving assets. This is controlled by standardizing paths:

- `index.html` uses `assets/...`
- `pages/*.html` uses `../assets/...`

## Out of Scope

- PHP backend implementation.
- MySQL database integration.
- Seller registration validation.
- Login/session handling.
- Search functionality.
- Add-car functionality.
- Dynamic car detail routing.
- React, Next.js, Tailwind, GSAP, Lenis, or Three.js usage.

## Approval State

The user approved:

- Use HTML + CSS + small vanilla JavaScript.
- Follow Member 1 responsibility boundaries.
- Work first on `feature/home-integration`.
- Convert the project directly into a pure static structure.
- Delete Next/React dependencies.
- Use the Member 1 static shell approach rather than rewriting all teammate business pages.
