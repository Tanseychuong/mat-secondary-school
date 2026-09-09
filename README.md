# Mat Secondary School Website

A simple dynamic school website built with HTML, CSS, JavaScript, jQuery, PHP, and MySQL. See `PROJECT_DOCUMENTATION.md` for the full project design and rationale.

## Features

- **Home, About, Academics** — static informational pages built with HTML/CSS.
- **News & Events** — dynamically retrieved from a MySQL `news` table via PHP/PDO.
- **Contact** — an enquiry form with jQuery client-side validation and PHP server-side validation, storing submissions in a MySQL `enquiries` table using prepared statements.
- **Admin** (`/admin/index.php`) — lists submitted enquiries. This is a demo page with **no authentication** — see "Security Notes" below before deploying publicly.
- Responsive layout (desktop, tablet, mobile) with a JavaScript-powered mobile navigation menu.

## Local Setup

### 1. Requirements

- PHP 7.4+ (with the `pdo_mysql` extension enabled)
- MySQL 5.7+ / MariaDB
- A local PHP dev environment (e.g. XAMPP, MAMP, Laragon, or PHP's built-in server)

### 2. Create the database

Import the schema and sample data:

```bash
mysql -u root -p < database/mat_school.sql
```

This creates the `mat_secondary_school` database with `news` and `enquiries` tables, plus a few sample rows so the site has content immediately.

### 3. Configure the database connection

Edit `config/database.php` and update the constants to match your local MySQL setup:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'mat_secondary_school');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### 4. Run the site locally

Using PHP's built-in server from the project root:

```bash
php -S localhost:8000
```

Then visit `http://localhost:8000/index.php` in your browser.

If you're using XAMPP/MAMP, place the `mat-secondary-school` folder inside your server's web root (e.g. `htdocs/`) and visit it via `http://localhost/mat-secondary-school/`.

## Project Structure

```
mat-secondary-school/
├── index.php              Home page
├── about.php               About page
├── academics.php           Academics page
├── news.php                News & events (from MySQL)
├── contact.php              Contact form (writes to MySQL)
├── admin/index.php         Enquiries listing (demo only, no auth)
├── config/database.php     Centralized PDO connection
├── includes/header.php     Shared header + navigation
├── includes/footer.php     Shared footer + script includes
├── css/style.css           Site styling, responsive layout
├── js/script.js            Mobile nav + jQuery form validation
├── database/mat_school.sql Schema + sample data
└── images/                 Reserved for school photos/logo (placeholders for now)
```

## Deployment (Free PHP/MySQL Hosting, e.g. InfinityFree)

1. Create a free hosting account with a provider that supports PHP + MySQL.
2. Create a MySQL database through the hosting control panel and note the host, database name, username, and password.
3. Update `config/database.php` with those production credentials.
4. Upload all project files via FTP or the hosting file manager.
5. Import `database/mat_school.sql` through phpMyAdmin (or the provider's SQL import tool).
6. Visit the public URL and test every page, then submit a test enquiry through the Contact page to confirm it reaches the database.

## Security Notes

- All SQL queries use PDO prepared statements — no raw user input is ever concatenated into a query.
- All output is escaped with `htmlspecialchars()` before being rendered, to prevent XSS.
- The contact form is validated on both the client (jQuery, for UX) and the server (PHP, for actual security) — never trust client-side validation alone.
- `admin/index.php` currently has **no login/authentication**. It's included to demonstrate reading data back out of MySQL. Before deploying publicly, either password-protect this route, move it behind proper authentication, or remove it from the public build.
- Keep real production database credentials out of any public Git repository.

## Out of Scope (by design)

This is a small academic/demo project. It intentionally does not include: full student management, grading/exam systems, payments, advanced authentication, a CMS, or a mobile app. See "Future Improvements" in `PROJECT_DOCUMENTATION.md` for ideas on where this could grow next.
