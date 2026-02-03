# DPlay API

Slim 4 based API for:
- Authentication (JWT + refresh tokens)
- Discover venues
- Court booking

## Setup

1. Copy `.env.example` to `.env` and set DB + JWT.
2. Import your main DB and run `schema_auth_tokens.sql`.
3. Run `composer install` and `composer dump-autoload`.
4. Point web server to `public/` (or use `php -S localhost:8080 -t public`).
5. Test endpoints under `/api/v1/...`.
