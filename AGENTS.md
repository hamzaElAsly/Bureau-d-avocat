# Bureau-d-avocat — Contexte projet

Cabinet d'avocats (gestion de dossiers, clients, audiences, RDV). Laravel 11 + PHP 8.4, base SQLite.

## Commandes utiles
- `php artisan migrate:fresh --seed` — recrée la base + données démo
- `php artisan test` — 18 tests (Unit, Feature Clients/Dossiers, Security)
- `php artisan serve --host=0.0.0.0 --port=12000` — serveur local

## État des modules
- **Clients** : CRUD complet (liste paginée + recherche, création, fiche, modification, suppression). Validation via `StoreClientRequest`/`UpdateClientRequest`. Routes : `clients`, `addCl`, `addCl.store`, `infoCl`, `updateCl`, `updateCl.store`, `deleteCl`.
- **Dossiers** : CRUD complet Phase 1 (liste paginée + recherche + filtres statut/priorité, création, fiche, modification, suppression). Relations client/avocat/user/cas. Routes : `dossiers`, `addDoss`, `addDoss.store`, `dossiers.show`, `dossiers.edit`, `dossiers.update`, `dossiers.destroy`.

## Conventions clés
- **Primary keys** non-standard : `Client.idClient`, `Dossier.idDossier`, `Avocat.idAvocat`, `Cas.idCas`, `Audience.idAudience`. Toujours définir `$primaryKey` dans les modèles.
- **Colonnes** : noms en français (`nomClient`, `prenomClient`, `tel1`, `tel2`, `adressClient`, `emailClient`, `imageClient`). Dossier : `nomDossier`, `titre`, `numero_dossier`, `dateDossier`, `date_fermeture`, `description`, `statut`, `priorite`, `idAv`, `idCl`, `idCa`, `assigned_user_id`.
- **Dossier::STATUTS** : ['nouveau','en_cours','en_attente','suspendu','cloture','archive']
- **Dossier::PRIORITES** : ['basse','normale','haute','urgente']
- `idAv` et `idCa` sont **nullable** (responsabilité portée par `assigned_user_id`/User). Migration `2025_01_01_000002`.
- **Factories** : auto-contenues (pas de récursion circulaire). `DossierFactory` crée Avocat/Client/Cas/User via factory.
- **Seeder** : idempotent pour l'admin (`User::updateOrCreate`), `CasSeeder`+`ClientSeeder`+`Dossier::factory(10)`.

## TODO (phases ultérieures)
- Calendrier/RDV, gestion des tâches, factures/dépenses.
- Hardening .env (APP_KEY, debug=false en prod), gestion d'erreurs.
- Protéger les routes métier (Clients/Dossiers) avec middleware `auth` + login fonctionnel.

## Authentification Fortify (audit + fix réalisés)
- **Stack** : laravel/fortify v1.38 + laravel/sanctum + spatie/laravel-permission (dépendances installées via composer).
- **Root cause du crash auth** : `App\Providers\FortifyServiceProvider` et `app/Actions/Fortify/CreateNewUser.php` manquants → `Target [Laravel\Fortify\Contracts\CreatesNewUsers] is not instantiable`. Maintenant créés.
- **Fichiers auth créés** :
  - `app/Providers/FortifyServiceProvider.php` — `Fortify::createUsersUsing()`, `authenticateUsing()` (email+password+Hash::check), rate limiters `login`/`two-factor`/`passkeys` (`Limit::perMinute(5)->by(...)`).
  - `app/Actions/Fortify/CreateNewUser.php` — valide `nom`, `prenon`, `tel` (integer), `email` (unique), `password` (confirmed), crée User, hash password.
  - `app/Actions/Fortify/PasswordValidationRules.php` — trait (Password::default() + confirmed).
  - `app/Support/AuthRedirect.php` — `path($user)` retourne `/` (redirect des users déjà authentifiés depuis les pages guest).
  - `app/Http/Middleware/EnsureUserIsActive.php` — placeholder (no-op tant qu'aucune colonne is_active).
- **Modifié** :
  - `app/Models/User.php` — `$fillable` étendu : `name, nom, prenon, tel, email, password, image`.
  - `config/fortify.php` — `home` `/` (welcome=dashboard), `views` false (vues custom /Connexion et /Register servies par web.php).
  - `bootstrap/app.php` — retiré aliases `store.access`/`store.selected`/`store.context` (dead code template e-commerce, classes inexistantes). Gardé `EnsureUserIsActive`, alias Spatie `role`/`permission`/`role_or_permission`.
  - `resources/views/signin.blade.php` — vrai `<form method=POST action=login.store>` avec @csrf, `name=email/password`, errors, old().
  - `resources/views/signup.blade.php` — vrai `<form method=POST action=register.store>` avec @csrf, champs `nom/prenon/tel/email/password/password_confirmation`, errors, old().
  - `resources/views/layout.blade.php` — Déconnexion = `<form POST route('logout')>` avec @csrf (au lieu de `<a>`).
  - `tests/Feature/ExampleTest.php` — ajouté `use RefreshDatabase` (la route `/` interroge `clients`).
- **Migration** : `2025_01_01_000003_add_profile_columns_to_users` — ajoute `nom, prenon, tel (integer), image` à `users` (additif, non-destructif ; la colonne `name` reste nullable pour compat seeder admin).
- **Routes auth** (Fortify, prefix vide) : `POST /register` (register.store), `POST /login` (login.store), `POST /logout` (logout). GET views désactivées (views=false) ; les vues custom sont `/Connexion` (signin) et `/Register` (signup).
- **Tests** : `tests/Feature/AuthTest.php` — 10 tests (register+hachage, validation champs requis, tel integer, email unique, password confirmation, login valide/mauvais mdp/inexistant, logout, rendu vues). Suite complète : 28 tests, 93 assertions, tout passe.
- **Spatie Permission** : `config/permission.php` existe MAIS tables non migrées et User n'a pas `HasRoles`. Ne pas inventer de rôles tant que la migration `vendor:publish` de Spatie n'est pas exécutée + User n'a pas le trait.
- **Schema users note** : la migration de base `0001_01_01_000000` est le skeleton Laravel (`name`, pas `nom/prenon/tel/image`). Les colonnes métier sont ajoutées par `2025_01_01_000003` (additif).
