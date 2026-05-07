# Phase B Member 1 Integration Design

## Context

This repository was originally a static AutoSphere website for QHE4103 Phase A. Phase B now uses `index.php`, PHP teammate page shells under `pages/`, shared CSS in `assets/css/styles.css`, shared JavaScript in `assets/js/main.js`, and image assets under `assets/images/`.

Phase B requires a PHP and MySQL version while keeping the current visual design. The `.php` files provide the active Phase B integration base, and the old static `.html` pages have been removed after conversion.

## Scope

Member 1 work is limited to project integration, homepage conversion, shared navigation, shared footer, visual shell, responsive layout support, database design coordination, and final submission documentation.

This work will not implement the full backend logic assigned to other members:

- Member 2: seller registration backend.
- Member 3: login, session workflow, seller flow.
- Member 4: add car, search, and car detail backend.

Where a PHP page is needed for navigation but belongs to another member, it will be a small placeholder page with shared header/footer and a clear comment naming the responsible member.

## Architecture

The Phase B scaffold will use simple plain PHP with no framework and no template engine.

Planned structure:

```text
includes/
  db.php
  footer.php
  header.php
  session.php
database/
  online_car_sale.sql
uploads/
  car-images/
    .gitkeep
index.php
pages/
  search.php
  add-car.php
  register.php
  login.php
  car-detail.php
  seller.php
```

## Shared Header And Footer

`includes/header.php` will output the shared document start, stylesheet link, AutoSphere logo, desktop navigation, and mobile navigation. Pages will set simple variables before including it, such as page title, body class, and asset path prefix.

Navigation links will point to the Phase B PHP routes:

- `/index.php`
- `/pages/search.php`
- `/pages/add-car.php`
- `/pages/register.php`
- `/pages/login.php`

The include will support both root-level pages and `/pages` pages by using a `$basePath` variable. Root pages will use an empty base path or `.`-style paths as needed; pages inside `/pages` will use `..`.

`includes/footer.php` will output the shared footer and the shared JavaScript include. It will use the same `$basePath` value so CSS, JS, image, and page links resolve correctly from both locations.

## Homepage Conversion

`index.php` is based on the original static homepage content. It keeps the AutoSphere hero, featured inventory cards, trust section, seller section, images, classes, and visual style.

Duplicated header and footer markup will be removed from `index.php` and replaced with:

```php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';
```

Homepage links use `.php` routes.

## Database Connection

`includes/db.php` will provide a small readable MySQL connection using `mysqli`.

It will define host, username, password, and database name in one place, then create a `$conn` connection object. Connection errors will stop the page with a clear coursework-friendly message.

Default local values will be suitable for common XAMPP/MAMP style development:

- host: `localhost`
- username: `root`
- password: empty string
- database: `online_car_sale`

## Session Helper

`includes/session.php` will safely start the PHP session only when no session is already active.

It will provide small helper functions:

- `is_logged_in()`
- `current_seller_id()`
- `require_login()`

These helpers are integration support for Member 3. They will not implement login processing.

## Database Schema

`database/online_car_sale.sql` will create the database and two core tables:

- `sellers`
- `cars`

The `sellers` table will support name, address, phone, email, username, password, and `created_at`.

The `cars` table will support seller ownership and listing fields: seller ID, colour, model, year, location, price, image, and `created_at`.

`cars.seller_id` will be a foreign key referencing `sellers.seller_id`.

Dummy rows will be omitted to keep the import predictable for teammates unless later requested.

## JavaScript Handling

The existing shared JavaScript for navigation, scroll state, dynamic homepage text, and visual pointer effects will remain. Static fake add-car/search logic has been removed so Phase B forms can submit to PHP.

## README Update

`README.md` will be updated to describe the Phase B PHP and MySQL version. It will include:

- Local setup with XAMPP, MAMP, or PHP built-in server.
- Database import instructions for `database/online_car_sale.sql`.
- Updated project structure.
- Member responsibilities.
- Guidance for other members to use `includes/header.php`, `includes/footer.php`, `includes/db.php`, and `includes/session.php`.
- A note that Phase B uses PHP pages instead of the old static HTML pages.

## Error Handling

Database connection errors will be explicit and simple. Session helper redirects will use straightforward PHP `header('Location: ...')` behavior and `exit`.

Placeholder pages will not pretend to be complete. They will clearly state which member owns the backend logic.

## Verification Plan

Per the user instruction, no tests will be run by the assistant.

Manual checks for the user or teammates:

- Open `index.php` through a PHP-capable local server.
- Confirm CSS, images, and JavaScript load.
- Confirm navigation points to PHP routes.
- Confirm placeholder PHP pages load with shared header/footer.
- Import `database/online_car_sale.sql` into MySQL.

## Constraints

- No framework.
- No external template.
- No copied external code.
- Keep current AutoSphere visual style.
- Keep responsive layout.
- Keep changes minimal and explainable for coursework Q&A.
- Use PHP pages as the active Phase B pages.
- Do not implement other members' full business logic.
- Do not run Git commands or create commits.
- Do not run tests.
