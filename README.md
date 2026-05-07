# QHE4103 Online Car Sale Website

Phase B PHP + MySQL version of the **Online Car Sale** coursework project for **Fundamentals of Web Technology**.

This Phase B version provides the PHP shell, shared includes, and MySQL database foundation for seller registration, login, car advertisement, search, and car detail workflows. The active pages now use `.php` files.

## Required Dependencies

This project does not need Node.js or a frontend build tool. For Phase B, install one local PHP + MySQL environment:

- **MAMP**: recommended for macOS. Download from the official MAMP website: <https://www.mamp.info/en/mamp/mac/>
- **XAMPP**: alternative for Windows, macOS, or Linux. Download from Apache Friends: <https://www.apachefriends.org/download.html>

After installing one of them, start **Apache** and **MySQL** before opening the PHP pages.

## How to Run Locally

### XAMPP or MAMP

1. Copy or place this project folder inside your local web root:
   - XAMPP: `htdocs`
   - MAMP: `htdocs`
2. Start Apache and MySQL from XAMPP or MAMP.
3. Import the database file listed below.
4. Open the PHP homepage in a browser:

```text
http://localhost/qhe4103-online-car-sale-2/index.php
```

Adjust the folder name in the URL if your local project folder has a different name.

### PHP Built-In Server

From the project root, run:

```bash
php -S localhost:8000
```

Then open:

```text
http://localhost:8000/index.php
```

MySQL must still be running, and the database must be imported before database-backed pages will work.

## Database Setup

Import the database schema from:

```text
database/online_car_sale.sql
```

Using phpMyAdmin:

1. Open phpMyAdmin from XAMPP or MAMP.
2. Importing `database/online_car_sale.sql` will create/select the `online_car_sale` database.
3. Use the **Import** tab.
4. Choose `database/online_car_sale.sql`.
5. Run the import.

Check `includes/db.php` if your local MySQL username, password, host, or database name differs from the project defaults.

## Project Structure

```text
index.php                       Phase B PHP homepage
includes/header.php             Shared page header and navigation
includes/footer.php             Shared page footer
includes/db.php                 Shared MySQL connection
includes/session.php            Shared session helper logic
database/online_car_sale.sql    Creates the online_car_sale database and required tables
pages/*.php                     Phase B PHP page shells / member work areas
assets/css/styles.css           Shared visual styles
assets/js/main.js               Shared JavaScript
assets/images/                  Shared image assets
uploads/car-images/             Uploaded car image files
```

## Static to PHP Page Mapping

The old static `.html` pages have been replaced by these Phase B `.php` pages:

| Old static page | Phase B PHP page |
|---|---|
| `index.html` | `index.php` |
| `pages/register.html` | `pages/register.php` |
| `pages/login.html` | `pages/login.php` |
| `pages/seller.html` | `pages/seller.php` |
| `pages/search.html` | `pages/search.php` |
| `pages/add-car.html` | `pages/add-car.php` |
| `pages/car-detail.html` | `pages/car-detail.php` |

## Member Responsibilities

| Member | GitHub Username | Responsibility |
|---|---|---|
| Member 1 | `wangchaoyu` | Project integration, homepage, shared navigation, footer, visual shell, responsive layout, database design coordination, final submission support |
| Member 2 | `luojingyu` | Seller registration backend in `pages/register.php` |
| Member 3 | `juzi` | Login, session, and seller flow in `pages/login.php` and `pages/seller.php` |
| Member 4 | `taogefei` | Add car, search, and car detail backend in `pages/add-car.php`, `pages/search.php`, and `pages/car-detail.php` |

## Shared Integration Base

Member 1 provides the shared integration base. Other members should use these files instead of duplicating setup code:

- `includes/header.php`
- `includes/footer.php`
- `includes/db.php`
- `includes/session.php`

## Collaboration Notes

- Keep shared navigation and footer in `includes/header.php` and `includes/footer.php`.
- Do not duplicate the global header or footer inside individual PHP pages.
- Phase B forms should submit to PHP pages, not static JavaScript demo handlers.
- Coordinate before changing shared CSS, shared JavaScript, or database table names.
- Keep PHP pages consistent with the shared layout and database connection files.
