# DPlay Project – Organization & GitHub Guide

This guide explains the current structure, what is essential, PHP packages, what goes in `.gitignore`, and how to organize the repo for GitHub.

---

## 1. Current Structure (What You Have)

### Backend (BE)

| Path | Role | Essential? |
|------|------|-------------|
| **`API/`** | Slim 4 REST API (Auth, Discover, Booking). Uses Composer, PSR-4, `.env`. | **Yes** – main backend API |
| **Root PHP files** | Legacy site: `config.php`, `index.php`, `court-*.php`, `coach-*.php`, etc. (60+ files). Direct DB + `include` of `header`/`footer`. | **Yes** – public site and flows |
| **`iadmin/`** | Admin panel (venue/event/coach/court masters, reports, payments). | **Yes** |
| **`user/`** | Logged-in user area (dashboard, bookings, court/event/coach management). | **Yes** |
| **`checkout1/` … `checkout5/`** | Checkout steps (e.g. court booking). | **Yes** (consolidate later if you want) |
| **`rpay1/`** | Razorpay payment flow (pay + verify). | **Yes** (single copy; see “Duplicates” below) |

### Frontend (FE)

- **Not a separate app.** FE is mixed into the same repo:
  - **Public site:** root `index.php`, `venue-detail.php`, `blog.php`, etc. + `header.php` / `footer.php` + `assets/`, `images/`, `icon/`.
  - **Assets:** `assets/` (CSS, JS, images), `footericon/` (plugins: jQuery, Bootstrap, AOS, etc.), `select2/`, `js/`.
  - **Admin:** `iadmin/` has its own `header.php`, `footer.php`, `vendor/` (DataTables, CKEditor, etc.), `ckeditor/`, `css/`, `js/`.
  - **User dashboard:** `user/` has similar layout and its own `vendor/`, `ckeditor/`, etc.

So: **BE and FE are not in separate repos** – they are “backend-rendered PHP + shared assets”. The only “proper” backend in the sense of a clean API is **`API/`**.

### What is NOT essential for the repo (excluded via `.gitignore`)

| Path | Why ignore |
|------|------------|
| **`staging/`** | Full copy of the site (~35k+ files). Deploy artifact, not source. |
| **`vendor/`** (root) | Composer dependencies. Reinstall with `composer install` (see below). |
| **`google1/`**, **`google2/`** | Google API PHP client (thousands of files). Should be a Composer dependency, not committed. |
| **`razorpay-php/`**, **`razorpay-phpz/`**, **`rpay1/razorpay-php/`**, **`rpay1/razorpay-phpz/`** | SDK copies are ignored. **`rpay1/`** app code (e.g. `pay.php`, `verify.php`, `checkout/`) is committed. |
| **`PHPMailer/`** | Can be Composer dependency. |
| **`config.php`**, **`.env`** | Secrets (DB, JWT, etc.). Only commit `config.example.php` and `.env.example`. |
| **`cdn-cgi/`** | cPanel/host noise. |
| **`*.zip`**, **`*.log`** | Archives and logs. |

---

## 2. PHP Packages / Dependencies

### API (only part with Composer today)

- **Location:** `API/composer.json`
- **Packages:** Slim 4, slim/psr7, vlucas/phpdotenv, firebase/php-jwt.
- **Install:**  
  `cd API && composer install`

### Root / legacy app

- **No root `composer.json`.** Dependencies are mixed in as folders:
  - **Google:** `google1/` (Google API PHP client).
  - **Razorpay:** `razorpay-php/` or `razorpay-phpz/`, used from `rpay1/` and root payment scripts.
  - **PHPMailer:** `PHPMailer/`.
  - **Facebook:** under `vendor/facebook/`.
  - **Guzzle, Monolog, etc.:** under root `vendor/`.

**Recommendation:** Add a **root `composer.json`** and move these to `require` so you have one `vendor/` and no duplicated libs. Until then, `.gitignore` excludes these folders so the repo stays small; document in README how to get them (e.g. “run `composer install` at root when available” or “restore from backup”).

---

## 3. What to Put in `.gitignore`

A **root `.gitignore`** is already added. It excludes:

- **Composer:** `vendor/`, `API/vendor/`
- **Staging:** `staging/`
- **Google clients:** `google1/`, `google2/`
- **Embedded libs:** `razorpay-php/`, `razorpay-phpz/`, `rpay1/`, `PHPMailer/` (you can later keep only app code under something like `app/rpay1/` and use Composer for SDK)
- **Secrets:** `.env`, `.env.*`, `config.php`, `API/.env`
- **IDE/OS:** `.idea/`, `.vscode/`, `.DS_Store`, etc.
- **Logs/temp:** `*.log`, `logs/`, `tmp/`, `temp/`, `cache/`
- **Archives:** `*.zip`, etc.
- **Host:** `cdn-cgi/`

**Sensitive:** Never commit `config.php` or `.env`. Commit **`config.example.php`** and **`API/.env.example`** (with dummy values) so others know what to configure.

---

## 4. Suggested Repo Layout (for clarity)

Conceptually you can think of it as:

```
dplay/
├── API/                    # REST API (Slim) – only clean “BE” in the repo
│   ├── src/
│   ├── public/
│   ├── composer.json
│   └── .env.example
├── public or webroot       # (optional later) document root: index, header, footer, .htaccess
├── app/                    # (optional later) move root PHP pages here
│   ├── pages/              # index, court-book, coach-detail, etc.
│   └── includes/           # header, footer, config loader
├── iadmin/                 # Admin panel
├── user/                   # User dashboard
├── assets/                 # Shared CSS/JS/images
├── checkout1..5 / rpay1/   # Checkout and payment flows
├── config.example.php
├── .gitignore
├── composer.json           # (recommended) root deps: Google, Razorpay, PHPMailer, etc.
└── README.md
```

You don’t have to rename everything at once; the main win for GitHub is: **ignore `vendor/`, `staging/`, `google1/`, `google2/`, duplicate libs, and secrets** so the repo is small and safe.

---

## 5. Steps to Upload to GitHub

1. **Back up the full project** (including `staging/`, `vendor/`, `google1/` if you need them on the server).
2. **Ensure secrets are not committed:**
   - Copy `config.example.php` to `config.php`, fill in real values locally, and rely on `.gitignore` so `config.php` is never committed.
   - Same for `API/.env`: use `API/.env.example` as template, keep real `API/.env` out of git.
3. **Add root `.gitignore`** (already done) and optionally `API/.env.example` (with placeholder keys).
4. **Initialize git (if not already):**
   ```bash
   cd /path/to/dplay
   git init
   ```
5. **Check what will be committed:**
   ```bash
   git add -n .
   ```
   You should **not** see `vendor/`, `staging/`, `google1/`, `google2/`, `config.php`, `.env`.
6. **Commit and push:**
   ```bash
   git add .
   git commit -m "Initial commit: DPlay site + API (vendor/staging/secrets ignored)"
   git remote add origin https://github.com/YOUR_USER/YOUR_REPO.git
   git branch -M main
   git push -u origin main
   ```
7. **On the server (or any deploy):** Install dependencies and restore secrets:
   - `cd API && composer install`
   - When you add root `composer.json`: `composer install` at root.
   - Copy `config.example.php` → `config.php` and `API/.env.example` → `API/.env` and fill with production values (or use env vars only).

---

## 6. Solid-Principles / Cleanup (later)

- **Single responsibility:** Split large PHP files into smaller ones (e.g. one file per page or action).
- **Config:** Use `config.php` only to read from environment (or `.env`), not hardcoded credentials.
- **One entry point:** Consider a single `index.php` with routing (like API) instead of 60+ root PHP files.
- **Dependencies:** One Composer root for the legacy app; no duplicated `razorpay-php`, `google1`, `PHPMailer` in the tree.
- **BE/FE separation:** API is already BE; the “FE” is the PHP views and assets – you can later move views into a `templates/` or `views/` and keep only routing and business logic in PHP.

Doing the steps above (`.gitignore`, no secrets, optional `config.example.php` / `.env.example`) gets the project in good shape for GitHub; the rest can be refactors over time.
