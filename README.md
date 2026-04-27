# QHE4103 Online Car Sale Website

Static frontend for a high-end used-car sales coursework project.
This project is developed for the **Fundamentals of Web Technology** coursework.
The goal is to design and implement an **Online Car Sale** website, where sellers can register, log in, and add car advertisements, while buyers can search for cars by model and year.

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
index.html              Project homepage
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

- Keep global navigation, footer, shared styles, and shared JavaScript consistent across pages.
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
