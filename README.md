# DPlay PHP

PHP project for DPlay: public site (venues, courts, coaches, events), user dashboard, admin panel, and REST API.

## Structure

- **Root** – Public site (index, venue/coach/event pages, checkout, payments)
- **API/** – Slim 4 REST API (Auth, Discover, Booking). See [API/README.md](API/README.md).
- **iadmin/** – Admin panel
- **user/** – Logged-in user dashboard
- **rpay1/** – Razorpay payment flow (pay + verify)
- **checkout1–5/** – Checkout steps

## Requirements

- PHP 8.0+
- MySQL/MariaDB
- Composer

## Setup

### 1. Clone and install dependencies

```bash
git clone https://github.com/PARSHWA0510/dplay-php.git
cd dplay-php
composer install
cd API && composer install && cd ..
```

### 2. Configuration

- Copy `config.example.php` to `config.php` and set your database and `$base_url`.
- Copy `user/config.example.php` to `user/config.php` if you use a separate config there (same for `iadmin/` if applicable).
- For the API: copy `API/.env.example` to `API/.env` and set DB and JWT values.

Do not commit `config.php` or `.env` (they are in `.gitignore`).

### 3. Web server

Point the document root to the project root (where `index.php`, `config.php`, and `vendor/` live). The API is usually served from `API/` (e.g. `https://your-domain.com/API/`).

## Verify locally

After setup (steps 1–2 above), you can confirm things run:

1. **Root site:** Open `http://your-local-host/` (or the path where your doc root points). You should see the site; pages that need the DB will require a working database and `config.php`.
2. **API:** Open or call `http://your-local-host/API/` (e.g. a health or discover endpoint). Requires `API/.env` and DB.
3. **Dependencies:** If you see errors like "failed to open vendor/autoload.php", run `composer install` at the project root and `composer install` inside `API/`.

ORM, DB layer, and automated tests are not set up yet; we can add those later.

## Deploy

- Run `composer install --no-dev` at project root and in `API/`.
- Restore or create `config.php` and `API/.env` from the example files with production values.

## What’s in the repo (~4,700 files)

- **Included:** All app PHP, `API/` (Slim), `iadmin/`, `user/`, `rpay1/` app code, `assets/`, `images/`, `checkout1–5/`, root `composer.json`, `config.example.php`, `API/.env.example`, `.gitignore`, this README.
- **Not included (by design):** `vendor/`, `API/vendor/`, `staging/`, `google1/`, `google2/`, `config.php`, `API/.env`, and other paths in `.gitignore`. Install dependencies with `composer install` after clone.

You can push to GitHub as-is. Anyone who clones must run the setup steps above (composer + config); then the project will run.

## Organization

See [ORGANIZATION_GUIDE.md](ORGANIZATION_GUIDE.md) for project layout, dependencies, and `.gitignore` details.
