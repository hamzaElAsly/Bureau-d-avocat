# Project Audit

## Stack

- Laravel 11.31, PHP `^8.2` (validated locally with PHP 8.4), Eloquent and Blade.
- MySQL is configured in `.env`; SQLite is the default in `.env.example`.
- Laravel Fortify and Sanctum are installed. Bootstrap assets are served from `public`; Vite/Tailwind are present but not used by the legacy Blade layout.

## Architecture

- `ClientController` and `DossierController` own the Phase 1 HTTP workflows.
- Form Requests validate writes for Clients and Dossiers.
- The application uses legacy French column names and non-standard primary keys such as `idClient` and `idDossier`.
- Users are Laravel authentication accounts. `assigned_user_id` is the modern responsible-user relation for a dossier; the legacy `avocats` relation remains available.

## Existing Features

| Feature | Status | Evidence |
| --- | --- | --- |
| Authentication | Functional | Fortify routes, configured login/register views, login rate limiter and feature test |
| Profile | Partial | Fortify profile endpoints exist; the legacy profile page has no full profile workflow |
| Users / permissions | Partial | Users authenticate and may be assigned to dossiers; no roles or permissions model exists |
| Clients | Functional | Authenticated CRUD, search, pagination, validation, profile metadata and dossier list |
| Dossiers | Functional | Authenticated CRUD, search, filters, pagination, client/responsible-user relations and central detail page |
| Caisse, invoices, expenses | Absent | Only legacy navigation placeholders exist |
| Calendar, appointments, tasks | Partial / absent | Legacy `rdvs` and `audiences` schema/models exist, without active controllers or UI |

## Working Features

- Clients can be listed, searched by identity/contact details, created, updated, shown and deleted when they have no dossiers.
- Clients retain their dossiers; destructive client deletion is rejected when dossiers exist.
- A dossier belongs to a client and can belong to a responsible Laravel user and/or legacy avocat.
- Dossiers support status, priority, opening/closing dates, description, search and server-side filters.
- Unauthenticated requests are redirected to login before accessing or mutating business resources.

## Broken Features

The audit found and fixed the following confirmed defects:

- `dossiers.idDossier` was a non-auto-incrementing primary key, causing normal Eloquent dossier creates and factories to fail on MySQL.
- Business routes were public although the project contained Fortify.
- Fortify's configured `login` rate limiter did not exist, causing login requests to return HTTP 500.
- Legacy login/register pages contained no working forms.
- Tests inherited `.env` MySQL settings and could reset the local database through `RefreshDatabase`.
- Several Eloquent models lacked their actual non-standard primary key; `Rdv` used the wrong primary key name.

## Missing Features

- No role/permission data model exists. Therefore authorization currently defines the legal office as one authenticated workspace; it cannot express per-user ownership rules without a product decision and schema.
- The finance, calendar, audience management, task and document modules are not implemented in Phase 1.
- The legacy profile/user-management pages require a dedicated future implementation.

## Database Analysis

- `clients.idClient` is auto-incrementing. Phase 1 adds nullable `identifiant`, `notes`, plus defaulted `type_client` and `statut` without changing existing rows.
- `dossiers` has required `idCl`, nullable legacy `idAv`/`idCa`, nullable `assigned_user_id`, status/priority fields and explicit opening/closing dates.
- Migration `2026_08_16_000001_make_dossier_id_auto_increment` corrects the dossier identifier without dropping data.
- The historical migrations create several legacy tables with manually assigned primary keys and out-of-order foreign-key declarations. They were left intact to avoid rewriting already-applied production history; the active Phase 1 model relations now match their columns.
- Two additive migrations are pending on the local MySQL database and must be applied with `php artisan migrate` in each deployed environment.

## Security Issues

- Fixed: authentication is enforced by server-side `auth` middleware for all Phase 1 routes.
- Fixed: login is rate-limited to five attempts per minute per normalized e-mail/IP combination.
- Fixed: all client/dossier writes use Form Requests, CSRF-protected forms and mass-assignment allowlists.
- Fixed: browser-based destructive operations use `DELETE` and confirmation prompts.
- Remaining: role-based authorization cannot be implemented safely until roles and access rules are defined. Authentication does not itself distinguish lawyers, assistants and administrators.
- Production hardening remains operational work: ensure `APP_DEBUG=false`, a private `APP_KEY`, HTTPS and production database credentials.

## Code Quality Issues

- Legacy Blade templates contain duplicated external assets and some historical encoding/layout inconsistencies. These do not block Phase 1 workflows and were not broadly rewritten.
- Legacy navigation includes placeholders for unimplemented modules; no false routes were added for them.

## Test Status

- `php artisan test`: **20 passed, 74 assertions**.
- Tests use in-memory SQLite explicitly through `phpunit.xml`, isolating them from the local MySQL data.
- PHP syntax was checked for every PHP file under `app`, `database`, `routes` and `tests`.

## Phase 0 Fixes

- Isolated tests from the local database.
- Added model key/relationship corrections and date casts.
- Restored Fortify views and missing rate limiters.
- Secured business routes and changed update endpoints to HTTP `PUT`.
- Added safe dossier/client data guards and corrected the dossier primary-key migration.

## Phase 1 Plan

Phase 1 is complete for the core legal workflow. The recommended next work is a deliberately designed authorization/roles phase, followed by calendar/audience workflows. Do not start those modules as part of this delivery.
