# astral-starter

Application **from scratch** pour [Astral](https://github.com/astral-php) — auth, admin utilisateurs, layout simple.

Pas d’articles, pas d’API démo, pas de `/docs` : une base vierge pour votre métier et votre design.

[![PHP](https://img.shields.io/badge/PHP-8.1%E2%80%938.5-777BB4?logo=php&logoColor=white)](https://www.php.net)
[![Version](https://img.shields.io/badge/version-0.1.0-blue)](./CHANGELOG.md)

> Écosystème : [Astral MVC](https://github.com/astral-php/astral) · [Packagist astral-php](https://packagist.org/packages/astral-php/) (Apps / Core / Components).

## Installation

```bash
composer create-project astral-php/astral-starter mon-app
cd mon-app
cp .env.example .env
php -S 127.0.0.1:8082 -t public public/router.php
```

Puis ouvrir http://127.0.0.1:8082 → **Créer le compte admin** (`/register`).

## En local (workspace)

```bash
cd components-astral/astral-starter
composer install
cp .env.example .env
php -S 127.0.0.1:8082 -t public public/router.php
```

## Contenu

| Élément | Statut |
|---------|--------|
| `astral-php/astral-core` | ✅ dépendance |
| Login / register / logout | ✅ |
| Forgot / reset password, verify e-mail | ✅ (selon `AUTH_REGISTRATION`) |
| Admin users / rôles | ✅ `/admin/users` |
| Accueil + liens GitHub / site | ✅ |
| Articles / API / docs embarquées | ❌ volontairement absents |

## Configuration

```env
APP_NAME="Astral Starter"
AUTH_REGISTRATION=direct   # ou confirm
ASTRAL_GITHUB_URL=https://github.com/astral-php
ASTRAL_WEBSITE_URL=https://github.com/astral-php
```

## Ensuite

```bash
php bin/console make:module Article
composer require astral-php/astral-form
composer require astral-php/astral-template
```

## Licence

MIT
