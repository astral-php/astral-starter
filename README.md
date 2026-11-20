# astral-starter

Application **from scratch** pour [Astral](https://github.com/astral-php) — auth, admin utilisateurs, **Nova Design**, CLI `php astral`.

[![PHP](https://img.shields.io/badge/PHP-8.3%2B-777BB4?logo=php&logoColor=white)](https://www.php.net)
[![Version](https://img.shields.io/badge/version-2.2.1-blue)](./CHANGELOG.md)

> Écosystème : [Astral MVC](https://github.com/astral-php/astral) · [Packagist astral-php](https://packagist.org/packages/astral-php/)  
> Feuille **2.2** : fusion du bac `astral-starter-nova` (Nova 1.1 + CLI).

## Installation

```bash
composer create-project astral-php/astral-starter:^2.2 mon-app
cd mon-app
cp .env.example .env   # si besoin (souvent déjà copié au create)
php astral serve
```

Puis http://127.0.0.1:8082 → **Créer le compte admin** (`/register`).

## Compatibilité

- PHP `^8.3`
- `astral-php/astral-core` `^2.1` (ligne CLI 2.2 en local / tag à venir)
- `astral-php/astral-nova-design` `^1.1`

## Contenu

| Élément | Statut |
|---------|--------|
| Nova Design (css · icons · template-nova) | ✅ ^1.1 |
| CLI `php astral` (+ `bin/console`) | ✅ |
| `composer nova:publish` | ✅ |
| Login / register / admin users | ✅ |
| Primitives layout `.nova-grid-auto` / `.nova-split` | ✅ |
| Adaptateurs Tailwind (opt-in) | ✅ v3 preset · v4 `@theme` |
| Articles / API / docs embarquées | ❌ volontairement absents |

## CLI

```bash
php astral list
php astral serve
php astral make:module Article [--api] [--no-migrate]
php astral migrate
```

Commandes app : `app/Console/` via `config/console.php`.

## Nova

Config **100 % JS** : [`public/assets/nova/nova-config.js`](./public/assets/nova/nova-config.js)  
Boot : [`public/assets/nova/nova-boot.js`](./public/assets/nova/nova-boot.js) (injecte CSS/icons + **un** JS IIFE)

| `source` | Usage |
|----------|--------|
| `local` | tout sous `/assets/nova/` (offline) |
| `cdn` (défaut) | CSS + JS IIFE `@1.2.0` · icons `@1.0.0` |

```bash
composer nova:publish   # mode local : après composer update Nova
```

- Composition app : `public/assets/app/css/app.css`
- Layout : uniquement `nova-config.js` + `nova-boot.js` (pas de résolution PHP)

## Licence

MIT
