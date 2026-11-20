<?php

declare(strict_types=1);

use Astral\TemplateNova\Template;

?>
<!doctype html>
<html lang="fr" data-nova-theme="green" data-nova-mode="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0d7a45">
    <title><?= htmlspecialchars($title ?? 'Astral Starter', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="icon" href="/assets/app/branding/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="/assets/app/css/app.css">
    <!-- Nova : config JS + boot (CDN ou local) — pas de résolution PHP -->
    <script src="/assets/nova/nova-config.js"></script>
    <script src="/assets/nova/nova-boot.js"></script>
</head>
<body>
<header class="nova-header" data-nova-header>
    <div class="nova-header-inner">
        <a class="nova-brand" href="/">
            <span class="nova-brand-mark" aria-hidden="true">A</span>
            <span class="nova-brand-text">
                <strong>Astral Starter</strong>
                <small>Le point de départ de vos applications Astral</small>
            </span>
        </a>
        <?= Template::partial('navigation/mobile-toggle', [
            'controls' => 'app-nav-panel',
            'label' => 'Ouvrir le menu',
        ]) ?>
        <div class="nova-header-panel" id="app-nav-panel">
            <nav class="nova-header-nav" aria-label="Navigation principale">
                <a href="/"><?= Template::partial('interface/icon', ['name' => 'home']) ?> Accueil</a>
                <a href="/#features"><?= Template::partial('interface/icon', ['name' => 'layout']) ?> Fonctionnalités</a>
                <a href="https://astral-php.dev/" target="_blank" rel="noopener"><?= Template::partial('interface/icon', ['name' => 'file-text']) ?> Documentation</a>
            </nav>
            <div class="nova-header-actions">
                <button class="nova-btn nova-btn-outline nova-theme-toggle" type="button" data-nova-theme-toggle aria-label="Changer le thème" title="Changer le thème"><?= Template::partial('interface/icon', ['name' => 'sun']) ?></button>
                <?php if ($auth->check()): ?>
                    <a class="nova-btn nova-btn-secondary" href="/profile"><?= Template::partial('interface/icon', ['name' => 'user']) ?> Profil</a>
                    <?php if ($auth->is(\Core\Auth\Role::Admin)): ?>
                        <a class="nova-btn nova-btn-secondary" href="/admin/users">Administration</a>
                    <?php endif ?>
                    <form method="POST" action="/logout" style="display:inline">
                        <?= $csrf->field() ?>
                        <button class="nova-btn nova-btn-primary" type="submit">Déconnexion</button>
                    </form>
                <?php else: ?>
                    <a class="nova-btn nova-btn-secondary" href="/login"><?= Template::partial('interface/icon', ['name' => 'user']) ?> Connexion</a>
                    <a class="nova-btn nova-btn-primary" href="/register"><?= Template::partial('interface/icon', ['name' => 'user-plus']) ?> Créer un compte</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</header>

<?php if ($session->hasFlash('success')): ?>
    <div class="nova-container nova-flash-wrap">
        <div class="nova-alert nova-alert-success" role="status"><?= htmlspecialchars((string) $session->getFlash('success'), ENT_QUOTES, 'UTF-8') ?></div>
    </div>
<?php endif ?>
<?php if ($session->hasFlash('error')): ?>
    <div class="nova-container nova-flash-wrap">
        <div class="nova-alert nova-alert-danger" role="alert"><?= htmlspecialchars((string) $session->getFlash('error'), ENT_QUOTES, 'UTF-8') ?></div>
    </div>
<?php endif ?>

<main><?= $content ?? '' ?></main>

<footer class="nova-footer">
    <div class="nova-footer-inner">
        <div class="nova-footer-brand">
            <span class="nova-brand-mark nova-brand-mark--sm" aria-hidden="true">A</span>
            <strong>Astral Starter</strong>
            <span class="nova-badge">Nova: green</span>
        </div>
        <nav class="nova-footer-nav" aria-label="Liens de pied de page">
            <a href="https://astral-php.dev/">Documentation</a>
            <a href="https://github.com/astral-php/astral-starter">GitHub</a>
            <a href="https://github.com/astral-php/astral-starter/blob/main/LICENSE">Licence</a>
            <a href="https://github.com/astral-php/astral">Astral PHP</a>
        </nav>
        <span class="nova-footer-note">Une base solide pour vos projets <?= Template::partial('interface/icon', ['name' => 'heart']) ?></span>
    </div>
</footer>
</body>
</html>
