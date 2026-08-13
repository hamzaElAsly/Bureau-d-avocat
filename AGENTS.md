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
- Authentification : les routes métier ne sont pas protégées (voir `SecurityTest`). À verrouiller avec middleware `auth` + login fonctionnel.
- Calendrier/RDV, gestion des tâches, factures/dépenses.
- Hardening .env (APP_KEY, debug=false en prod), gestion d'erreurs.
