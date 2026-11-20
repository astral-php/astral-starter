# Changelog

## [2.2.1] — 2026-11-20 (dev)

### Modifié

- `nova:publish` **retiré** du `post-create-project-cmd` (create-project plus rapide)
- CSS app unique : `app.css` · suppression `starter.css` (deprecated vide)
- Nova **100 % JS** : `nova-config.js` + `nova-boot.js` · plus de `config/nova.php`
- JS unique : `nova.iife.min.js` (`window.Nova`) — CDN ou local

### Notes

- `source: cdn` : CSS + JS IIFE `@1.2.0` · icons `@1.0.0`
- Après `composer update` Nova (local) → `composer nova:publish`

## [2.2.0] — 2026-11-13

### Ajouté

- **Nova Design** `^1.1` (css · icons · template-nova) + `composer nova:publish`
- CLI **`php astral`** (Factory core) · `config/console.php` · `app/Console/`
- Primitives layout `.nova-grid-auto` / `.nova-split` · adaptateurs Tailwind v3/v4 (opt-in)
- `astral-testing` + `astral-debug` en require-dev

### Modifié

- Fusion du bac `astral-starter-nova` → starter officiel (feuille 2.2)
- README / layouts / assets Nova

### Notes

- Require `astral-core:^2.2` + `astral-nova-design:^1.1` (Packagist).
- Dev local : path Composer optionnels (hors package publié).

## [2.1.0] — 2026-10-30

### Modifié

- `astral-php/astral-core` **^2.1** (readonly / Override / VO opt-in côté core — API app inchangée)

### Notes

- PHP `^8.3` inchangé. Guide core : [`UPGRADE-2.1.md`](https://github.com/astral-php/astral-core/blob/main/UPGRADE-2.1.md).

## [2.0.0] — 2026-10-29

### Breaking

- PHP **^8.3**
- `astral-php/astral-core` **^2.0**
- `Role::Admin` / `User` / `Guest` (enum) — valeurs string inchangées

### Ajouté

- `UPGRADE-2.0.md`

## [0.1.2] — 2026-10-08

### Ajouté

- Suite PHPUnit : smokes HTTP (`tests/Http`) via `Router::handle()` (status 200/302).
- Dépendance `astral-php/astral-core:^1.2.4`.

## [0.1.1] — 2026-10-04

### Ajouté

- `.htaccess` racine : redirection Apache vers `public/` (déploiement mutualisé / OVH, comme Astral MVC).
- `public/.htaccess` : `Options -Indexes` + flag `QSA`.

## [0.1.0] — 2026-09-29

### Ajouté

- Première version locale d’**astral-starter** (`type: project`).
- Squelette : auth, profil, users, admin rôles, accueil + liens GitHub / site.
- Dépendance `astral-php/astral-core:^1.2`.
- Sans métier démo (pas d’articles / API / docs embarquées).
