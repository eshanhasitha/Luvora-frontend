# Luvora storefront

Customer facing storefront for Luvora, built with Laravel 13, PHP 8.3+, Blade, Vite, and Tailwind CSS 4. The storefront renders the shopping experience and calls the Luvora backend API for catalog, account, cart, order, inventory, delivery, and notification data.

## Applications

This directory contains several independent Laravel applications:

| Directory | Purpose |
| --- | --- |
| [`frontend/`](frontend/) | Customer storefront (main application) |
| [`admin/`](admin/) | Admin application scaffold |
| [`staff/`](staff/) | Staff application scaffold |
| [`delivery/`](delivery/) | Delivery application scaffold |

Each application has its own `composer.json`, `package.json`, and environment configuration. The instructions below are for the customer storefront in `frontend/frontend/`.

## Requirements

- PHP 8.3 or later
- Composer
- Node.js and npm
- A reachable Luvora backend API for API-backed features

## Local setup

Run commands from this directory (`frontend/`):

```bash
cd frontend
composer install
```

Create the environment file and application key if they do not already exist:

```bash
cp .env.example .env
php artisan key:generate
```

Set `LUVORA_API_URL` in `.env` to the base URL of the backend API, then install frontend dependencies and start the app:

```bash
npm install
npm run build
php artisan serve
```

For frontend development with Vite hot reload, use two terminals:

```bash
npm run dev
```

```bash
php artisan serve
```

Open the URL printed by `php artisan serve` (usually `http://127.0.0.1:8000`). Configure Laravel's database, session, cache, and mail settings in `.env` as needed for your environment. The included migrations create Laravel's default users, cache, and jobs tables.

## Configuration

The main backend setting is:

```dotenv
LUVORA_API_URL=http://localhost:5000
```

Use the actual backend origin for your environment. Do not commit `.env` or real credentials. API requests are made server-side by the Laravel app; authenticated requests send the session's access token as a Bearer token. When an authenticated API request returns `401`, the API client attempts to refresh the token through `/api/auth/refresh` and retries the request once.

## Storefront features

- Product catalog, categories, search, collections, product details, and filtering
- Customer registration, login, password reset, profiles, addresses, and preferences
- Cart, checkout pages, order history, order tracking, and notifications
- Product reviews, availability, compare, and recently viewed products
- Store directory, gift guide, journal, information pages, and customer care
- Session-based compare and recently viewed data; browser-local wishlist data

Some screens depend on backend endpoints that are not yet available or integrated. For example, checkout does not submit an order or process a real payment, and return submissions, newsletter signup, contact forms, and gift-card balance checks do not have a usable backend integration. See [`frontend/docs/backend-api-routes.md`](frontend/docs/backend-api-routes.md) for endpoint coverage and known integration limitations.

## Useful commands

Run these from `frontend/frontend/`:

```bash
php artisan route:list
php artisan test
npm run dev
npm run build
```

## Project structure

```text
frontend/
├── app/                 # Controllers, services, and models
├── docs/                # Backend API integration notes
├── resources/views/     # Blade storefront pages and components
├── resources/css/       # Tailwind entry stylesheet
├── resources/js/        # JavaScript entry point
├── routes/web.php       # Storefront routes
└── public/              # Public assets
```

## API integration notes

The API client is in `app/Services/LuvoraApiClient.php`. Keep API behavior and route coverage documentation up to date in [`frontend/docs/backend-api-routes.md`](frontend/docs/backend-api-routes.md) when integrations change. Backend authorization is required for customer-scoped operations; the integration notes call out endpoints that still need backend access checks before production use.
