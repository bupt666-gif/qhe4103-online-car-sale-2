# Phase B Member 1 Integration Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add a simple PHP + MySQL Phase B integration scaffold for Member 1 while preserving the existing AutoSphere visual design and using PHP pages as the active site pages.

**Architecture:** Use plain PHP includes for the shared page shell, with `header.php` responsible for the document start and navigation and `footer.php` responsible for footer links, shared JavaScript, and closing tags. Keep other members' PHP pages as small integration placeholders only, backed by shared `db.php`, `session.php`, and `database/online_car_sale.sql`.

**Tech Stack:** PHP, MySQL, `mysqli`, existing CSS/JavaScript, no framework, no template engine.

**User Constraints:** Do not run Git commands. Do not run tests. Use manual verification notes only.

---

## File Structure Map

- Create `includes/db.php`: central MySQL connection settings and `$conn`.
- Create `includes/session.php`: safe session start and simple seller session helper functions.
- Create `includes/header.php`: shared document start, stylesheet path, logo, desktop nav, and mobile nav.
- Create `includes/footer.php`: shared footer links, shared JavaScript path, closing `body` and `html`.
- Create `index.php`: PHP homepage based on the original static homepage, with shared header/footer includes and PHP links.
- Create `pages/register.php`: Member 2 placeholder shell.
- Create `pages/login.php`: Member 3 placeholder shell.
- Create `pages/seller.php`: Member 3 placeholder shell.
- Create `pages/search.php`: Member 4 placeholder shell.
- Create `pages/add-car.php`: Member 4 placeholder shell.
- Create `pages/car-detail.php`: Member 4 placeholder shell.
- Create `database/online_car_sale.sql`: Phase B database and core tables.
- Create `uploads/car-images/.gitkeep`: preserves upload folder for Member 4.
- Modify `assets/js/main.js`: keep visual interactions and remove static form demo behavior.
- Modify `README.md`: update from static Phase A wording to Phase B PHP + MySQL instructions.

---

### Task 1: Create Shared PHP Infrastructure

**Files:**
- Create: `includes/db.php`
- Create: `includes/session.php`
- Create: `uploads/car-images/.gitkeep`

- [ ] **Step 1: Create required directories**

Create these directories if they do not exist:

```text
includes
uploads/car-images
```

- [ ] **Step 2: Add `includes/db.php`**

Write this file:

```php
<?php
$databaseHost = 'localhost';
$databaseUser = 'root';
$databasePassword = '';
$databaseName = 'online_car_sale';

$conn = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);

if ($conn->connect_error) {
    die('Database connection failed: ' . htmlspecialchars($conn->connect_error));
}

$conn->set_charset('utf8mb4');
```

- [ ] **Step 3: Add `includes/session.php`**

Write this file:

```php
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_logged_in(): bool
{
    return isset($_SESSION['seller_id']);
}

function current_seller_id(): ?int
{
    if (!isset($_SESSION['seller_id'])) {
        return null;
    }

    return (int) $_SESSION['seller_id'];
}

function require_login(string $redirectPath = '/pages/login.php'): void
{
    if (!is_logged_in()) {
        header('Location: ' . $redirectPath);
        exit;
    }
}
```

- [ ] **Step 4: Add upload folder keep file**

Create an empty file:

```text
uploads/car-images/.gitkeep
```

---

### Task 2: Create Shared Header And Footer Includes

**Files:**
- Create: `includes/header.php`
- Create: `includes/footer.php`

- [ ] **Step 1: Add `includes/header.php`**

Write this file:

```php
<?php
$pageTitle = $pageTitle ?? 'AutoSphere | Premium Used Cars';
$bodyClass = $bodyClass ?? '';
$basePath = $basePath ?? '.';
$siteRoot = $siteRoot ?? '';
$currentPage = $currentPage ?? basename($_SERVER['SCRIPT_NAME']);

$assetPath = function (string $path) use ($basePath): string {
    if ($basePath === '') {
        return ltrim($path, '/');
    }

    return rtrim($basePath, '/') . '/' . ltrim($path, '/');
};

$sitePath = function (string $path) use ($siteRoot): string {
    if ($siteRoot === '') {
        return $assetPath($path);
    }

    return rtrim($siteRoot, '/') . '/' . ltrim($path, '/');
};

$navItems = [
    'Search' => '/pages/search.php',
    'Add Car' => '/pages/add-car.php',
    'Register' => '/pages/register.php',
    'Login' => '/pages/login.php',
];

$bodyAttribute = $bodyClass !== '' ? ' class="' . htmlspecialchars($bodyClass) . '"' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <link rel="stylesheet" href="<?php echo htmlspecialchars($assetPath('assets/css/styles.css')); ?>">
</head>
<body<?php echo $bodyAttribute; ?>>
  <header class="site-navbar" data-site-navbar>
    <a class="site-logo" href="<?php echo htmlspecialchars($sitePath('/index.php')); ?>" aria-label="AutoSphere home">AutoSphere</a>
    <nav class="desktop-nav" aria-label="Primary navigation">
      <?php foreach ($navItems as $label => $href): ?>
        <?php $isActive = basename($href) === $currentPage; ?>
        <a href="<?php echo htmlspecialchars($sitePath($href)); ?>" data-nav-link<?php echo $isActive ? ' class="is-active"' : ''; ?>>
          <?php echo htmlspecialchars($label); ?>
        </a>
      <?php endforeach; ?>
    </nav>
    <button class="mobile-nav-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="mobile-nav" data-nav-toggle>
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav class="mobile-nav" id="mobile-nav" aria-label="Mobile navigation" data-mobile-nav>
      <?php foreach ($navItems as $label => $href): ?>
        <?php $isActive = basename($href) === $currentPage; ?>
        <a href="<?php echo htmlspecialchars($sitePath($href)); ?>" data-nav-link<?php echo $isActive ? ' class="is-active"' : ''; ?>>
          <?php echo htmlspecialchars($label); ?>
        </a>
      <?php endforeach; ?>
    </nav>
  </header>
```

- [ ] **Step 2: Add `includes/footer.php`**

Write this file:

```php
<?php
$basePath = $basePath ?? '.';
$siteRoot = $siteRoot ?? '';

$assetPath = function (string $path) use ($basePath): string {
    if ($basePath === '') {
        return ltrim($path, '/');
    }

    return rtrim($basePath, '/') . '/' . ltrim($path, '/');
};

$sitePath = function (string $path) use ($siteRoot): string {
    if ($siteRoot === '') {
        return $assetPath($path);
    }

    return rtrim($siteRoot, '/') . '/' . ltrim($path, '/');
};
?>
  <footer class="site-footer">
    <div class="footer-intro">
      <a class="site-logo" href="<?php echo htmlspecialchars($sitePath('/index.php')); ?>">AutoSphere</a>
      <p>Premium used cars presented with calmer browsing, stronger trust cues, and a more intentional showroom experience.</p>
    </div>
    <nav class="footer-group" aria-label="Browse links">
      <h2>Browse</h2>
      <a href="<?php echo htmlspecialchars($sitePath('/pages/search.php')); ?>">Search</a>
      <a href="<?php echo htmlspecialchars($sitePath('/index.php#inventory')); ?>">Featured Cars</a>
    </nav>
    <nav class="footer-group" aria-label="Sell links">
      <h2>Sell</h2>
      <a href="<?php echo htmlspecialchars($sitePath('/pages/add-car.php')); ?>">Add Car</a>
      <a href="<?php echo htmlspecialchars($sitePath('/pages/register.php')); ?>">Seller Account</a>
    </nav>
    <nav class="footer-group" aria-label="Account links">
      <h2>Account</h2>
      <a href="<?php echo htmlspecialchars($sitePath('/pages/register.php')); ?>">Register</a>
      <a href="<?php echo htmlspecialchars($sitePath('/pages/login.php')); ?>">Login</a>
    </nav>
  </footer>

  <script src="<?php echo htmlspecialchars($assetPath('assets/js/main.js')); ?>"></script>
</body>
</html>
```

---

### Task 3: Convert Homepage To `index.php`

**Files:**
- Create: `index.php`

- [ ] **Step 1: Create PHP page setup**

Start `index.php` with:

```php
<?php
$pageTitle = 'AutoSphere | Premium Used Cars';
$basePath = '.';
$currentPage = 'index.php';
require_once __DIR__ . '/includes/header.php';
?>
```

- [ ] **Step 2: Copy homepage main content**

Copy the complete homepage `<main class="home-root">...</main>` block from the original static homepage into `index.php` after the header include.

Update homepage links inside that main block. Literal PHP routes are acceptable, but using the shared `$sitePath()` helper is preferred so a teammate can set `$siteRoot` if the project is served from a subdirectory:

```text
Search page    -> <?php echo htmlspecialchars($sitePath('/pages/search.php'), ENT_QUOTES, 'UTF-8'); ?>
Add car page   -> <?php echo htmlspecialchars($sitePath('/pages/add-car.php'), ENT_QUOTES, 'UTF-8'); ?>
Register page  -> <?php echo htmlspecialchars($sitePath('/pages/register.php'), ENT_QUOTES, 'UTF-8'); ?>
Login page     -> <?php echo htmlspecialchars($sitePath('/pages/login.php'), ENT_QUOTES, 'UTF-8'); ?>
```

Keep image paths as root-relative project paths used by the root page:

```text
assets/images/hero-car.jpg
assets/images/featured-sedan.jpg
assets/images/featured-suv.jpg
assets/images/featured-coupe.jpg
```

- [ ] **Step 3: Close with shared footer**

End `index.php` with:

```php
<?php
require_once __DIR__ . '/includes/footer.php';
?>
```

---

### Task 4: Add Placeholder PHP Pages For Other Members

**Files:**
- Create: `pages/register.php`
- Create: `pages/login.php`
- Create: `pages/seller.php`
- Create: `pages/search.php`
- Create: `pages/add-car.php`
- Create: `pages/car-detail.php`

- [ ] **Step 1: Add `pages/register.php` for Member 2**

Write this file:

```php
<?php
$pageTitle = 'AutoSphere | Seller Registration';
$bodyClass = 'site-canvas site-page-shell';
$basePath = '..';
$currentPage = 'register.php';
require_once __DIR__ . '/../includes/header.php';
?>

  <main class="member-page">
    <section class="shell-container member-page__panel shell-card">
      <p class="eyebrow">Member 2 Area</p>
      <h1>Seller Registration</h1>
      <p>This Phase B page uses the shared AutoSphere PHP shell. Member 2 will add the seller registration backend here.</p>
      <!-- Member 2 registration backend content belongs inside this section. -->
    </section>
  </main>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
```

- [ ] **Step 2: Add `pages/login.php` for Member 3**

Write this file:

```php
<?php
$pageTitle = 'AutoSphere | Seller Login';
$bodyClass = 'site-canvas site-page-shell';
$basePath = '..';
$currentPage = 'login.php';
require_once __DIR__ . '/../includes/header.php';
?>

  <main class="member-page">
    <section class="shell-container member-page__panel shell-card">
      <p class="eyebrow">Member 3 Area</p>
      <h1>Seller Login</h1>
      <p>This Phase B page uses the shared AutoSphere PHP shell. Member 3 will add the login and session workflow here.</p>
      <!-- Member 3 login backend content belongs inside this section. -->
    </section>
  </main>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
```

- [ ] **Step 3: Add `pages/seller.php` for Member 3**

Write this file:

```php
<?php
$pageTitle = 'AutoSphere | Seller Dashboard';
$bodyClass = 'site-canvas site-page-shell';
$basePath = '..';
$currentPage = 'seller.php';
require_once __DIR__ . '/../includes/header.php';
?>

  <main class="member-page">
    <section class="shell-container member-page__panel shell-card">
      <p class="eyebrow">Member 3 Area</p>
      <h1>Seller Dashboard</h1>
      <p>This Phase B page uses the shared AutoSphere PHP shell. Member 3 will connect it to the authenticated seller flow.</p>
      <!-- Member 3 seller dashboard content belongs inside this section. -->
    </section>
  </main>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
```

- [ ] **Step 4: Add `pages/search.php` for Member 4**

Write this file:

```php
<?php
$pageTitle = 'AutoSphere | Search Cars';
$bodyClass = 'site-canvas site-page-shell';
$basePath = '..';
$currentPage = 'search.php';
require_once __DIR__ . '/../includes/header.php';
?>

  <main class="member-page">
    <section class="shell-container member-page__panel shell-card">
      <p class="eyebrow">Member 4 Area</p>
      <h1>Search Cars</h1>
      <p>This Phase B page uses the shared AutoSphere PHP shell. Member 4 will add the database-backed search workflow here.</p>
      <!-- Member 4 search backend content belongs inside this section. -->
    </section>
  </main>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
```

- [ ] **Step 5: Add `pages/add-car.php` for Member 4**

Write this file:

```php
<?php
$pageTitle = 'AutoSphere | Add Car';
$bodyClass = 'site-canvas site-page-shell';
$basePath = '..';
$currentPage = 'add-car.php';
require_once __DIR__ . '/../includes/header.php';
?>

  <main class="member-page">
    <section class="shell-container member-page__panel shell-card">
      <p class="eyebrow">Member 4 Area</p>
      <h1>Add Car</h1>
      <p>This Phase B page uses the shared AutoSphere PHP shell. Member 4 will add the authenticated car listing form and image upload workflow here.</p>
      <!-- Member 4 add-car backend content belongs inside this section. -->
    </section>
  </main>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
```

- [ ] **Step 6: Add `pages/car-detail.php` for Member 4**

Write this file:

```php
<?php
$pageTitle = 'AutoSphere | Car Detail';
$bodyClass = 'site-canvas site-page-shell';
$basePath = '..';
$currentPage = 'car-detail.php';
require_once __DIR__ . '/../includes/header.php';
?>

  <main class="member-page">
    <section class="shell-container member-page__panel shell-card">
      <p class="eyebrow">Member 4 Area</p>
      <h1>Car Detail</h1>
      <p>This Phase B page uses the shared AutoSphere PHP shell. Member 4 will add the database-backed car detail display here.</p>
      <!-- Member 4 car-detail backend content belongs inside this section. -->
    </section>
  </main>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
```

---

### Task 5: Add Database Schema

**Files:**
- Create: `database/online_car_sale.sql`

- [ ] **Step 1: Create database directory**

Create this directory if it does not exist:

```text
database
```

- [ ] **Step 2: Add schema SQL**

Write this file:

```sql
CREATE DATABASE IF NOT EXISTS online_car_sale
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE online_car_sale;

CREATE TABLE IF NOT EXISTS sellers (
  seller_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  address VARCHAR(255) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  username VARCHAR(60) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS cars (
  car_id INT AUTO_INCREMENT PRIMARY KEY,
  seller_id INT NOT NULL,
  colour VARCHAR(50) NOT NULL,
  model VARCHAR(100) NOT NULL,
  year INT NOT NULL,
  location VARCHAR(120) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  image VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_cars_seller
    FOREIGN KEY (seller_id)
    REFERENCES sellers(seller_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

---

### Task 6: Clean Static JavaScript Demo Logic

**Files:**
- Modify: `assets/js/main.js`

- [ ] **Step 1: Use PHP active page fallback**

Make the active navigation fallback use the PHP homepage:

```js
const hrefFile = href.split('#')[0].split('/').pop() || 'index.php';
```

- [ ] **Step 2: Remove old static form demo handlers**

Remove the old `addCarForm` and `searchForm` demo handlers that used `preventDefault()`, `localStorage`, and static redirects. Phase B forms should submit to PHP pages.

Keep the existing navigation, scroll, dynamic word, pointer orb, and click spark logic unchanged.

---

### Task 7: Update README For Phase B

**Files:**
- Modify: `README.md`

- [ ] **Step 1: Replace static-only description**

Update the title and opening to say this is the Phase B PHP + MySQL version and the active pages use PHP.

Use this structure:

```markdown
# QHE4103 Online Car Sale Website

Phase B PHP + MySQL version of the AutoSphere Online Car Sale coursework project for QHE4103 Fundamentals of Web Technology.

The Phase B website should be run through `index.php` and the PHP files under `pages/`.
```

- [ ] **Step 2: Add local running instructions**

Document these options:

````markdown
## How to Run Locally

Use a PHP-capable local server such as XAMPP, MAMP, or PHP's built-in server.

### Option 1: XAMPP or MAMP

1. Place this project inside the web root, such as `htdocs`.
2. Start Apache and MySQL.
3. Open the project through a local URL that serves `index.php`.

### Option 2: PHP Built-in Server

From the project root, a teammate can run:

```bash
php -S localhost:8000
```

Then open:

```text
http://localhost:8000/index.php
```
````

- [ ] **Step 3: Add database import instructions**

Document:

```markdown
## Database Setup

1. Start MySQL.
2. Import `database/online_car_sale.sql` using phpMyAdmin or the MySQL command line.
3. Confirm the database name is `online_car_sale`.
4. If local MySQL credentials differ, update `includes/db.php`.
```

- [ ] **Step 4: Add updated project structure**

Document:

````markdown
## Project Structure

```text
index.php                    Phase B homepage
includes/header.php          Shared PHP header and navigation
includes/footer.php          Shared PHP footer and script include
includes/db.php              Shared MySQL connection
includes/session.php         Shared session helper functions
database/online_car_sale.sql Database schema
pages/*.php                  Phase B PHP page shells
assets/css/styles.css        Shared visual style
assets/js/main.js            Shared navigation and visual interactions
assets/images/               Homepage image assets
uploads/car-images/          Future car image uploads
```
````

- [ ] **Step 5: Add member responsibility guidance**

Document:

```markdown
## Member Responsibilities

| Member | Responsibility |
|---|---|
| Member 1 | Project integration, homepage, shared navigation, footer, visual shell, responsive layout, database design coordination, final submission support |
| Member 2 | Seller registration backend in `pages/register.php` |
| Member 3 | Login, session, and seller flow in `pages/login.php` and `pages/seller.php` |
| Member 4 | Add car, search, and car detail backend in `pages/add-car.php`, `pages/search.php`, and `pages/car-detail.php` |

Member 1 provides the shared integration base. Other members should build their assigned PHP pages using:

- `includes/header.php`
- `includes/footer.php`
- `includes/db.php`
- `includes/session.php`
```

- [ ] **Step 6: Add collaboration notes**

Document:

```markdown
## Collaboration Notes

- Keep shared navigation and footer in the include files.
- Do not duplicate the global header or footer inside individual PHP pages.
- Phase B forms should submit to PHP pages, not static JavaScript demo handlers.
- Coordinate before changing `assets/css/styles.css`, `assets/js/main.js`, or database table names.
```

---

### Task 8: Manual Verification Notes Only

**Files:**
- No file changes.

- [ ] **Step 1: Do not run automated tests**

The assistant must not run automated tests because the user asked not to test.

- [ ] **Step 2: Do not run Git commands**

The assistant must not run `git status`, `git add`, `git commit`, or other Git commands because the user asked not to use Git.

- [ ] **Step 3: Provide manual checks in final summary**

Include these manual checks for the user:

```text
Open index.php through XAMPP, MAMP, or php -S.
Check that homepage CSS, images, and JavaScript load.
Click navigation links and confirm they point to PHP pages.
Open each pages/*.php placeholder page.
Import database/online_car_sale.sql into MySQL.
If MySQL credentials differ locally, update includes/db.php.
```

---

## Plan Self-Review

- Spec coverage: tasks cover scaffold files, homepage conversion, shared header/footer, database connection, session helper, SQL schema, upload folder, placeholder PHP pages, JavaScript isolation, README update, and manual verification guidance.
- Scope control: no full Member 2, Member 3, or Member 4 backend logic is planned.
- User constraints: the plan explicitly forbids Git commands and automated tests for the assistant.
- Placeholder scan: page shells are intentionally small responsibility handoff pages, not unfinished Member 1 implementation.
