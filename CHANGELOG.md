# Changelog

## [2.1.1] — 2026-10-31

### Modifié

- Identité UI explicitée **nova-green** (footer / home)

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
