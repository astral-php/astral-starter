<?php

use Astral\TemplateNova\Template;

?>
<section class="nova-container" style="padding:2rem 0 3rem;max-width:1100px;margin:0 auto">
    <p style="margin:0 0 1rem"><a class="nova-btn nova-btn-outline" href="/nova-templates">← Galerie</a></p>
    <h1 class="nova-heading" style="margin:0 0 1.5rem">Partials Template Nova</h1>

    <div class="nova-stack" style="gap:2rem">
        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">page-header</h2>
            <?= Template::partial('page-header', [
                'heading'     => 'Titre de page',
                'subtitle'    => 'Sous-titre de démonstration',
                'actionHref'  => '/nova-templates',
                'actionLabel' => 'Action',
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">breadcrumb</h2>
            <?= Template::partial('breadcrumb', [
                'items' => [
                    ['href' => '/', 'label' => 'Accueil'],
                    ['href' => '/nova-templates', 'label' => 'Galerie'],
                    ['href' => '#', 'label' => 'Partials'],
                ],
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">alert</h2>
            <?= Template::partial('alert', ['type' => 'success', 'message' => 'Message de succès de démonstration.']) ?>
            <?= Template::partial('alert', ['type' => 'error', 'message' => 'Message d’erreur de démonstration.']) ?>
            <?= Template::partial('alert', ['type' => 'warning', 'message' => 'Message d’avertissement.']) ?>
            <?= Template::partial('alert', ['type' => 'info', 'message' => 'Message d’information.']) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">feedback/flash</h2>
            <?= Template::partial('feedback/flash', [
                'messages' => [
                    'success' => 'Flash succès.',
                    'error'   => 'Flash erreur.',
                    'warning' => 'Flash avertissement.',
                    'info'    => 'Flash info.',
                ],
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">empty-state</h2>
            <?= Template::partial('empty-state', [
                'title'       => 'Aucun résultat',
                'message'     => 'Aucun élément à afficher pour cette démonstration.',
                'actionHref'  => '/nova-templates',
                'actionLabel' => 'Retour',
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">table</h2>
            <?= Template::partial('table', [
                'headers' => ['Nom', 'E-mail', 'Rôle'],
                'rows'    => [
                    ['Alice Martin', 'alice@example.com', 'Admin'],
                    ['Bob Dupont', 'bob@example.com', 'User'],
                ],
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">data/pagination</h2>
            <?= Template::partial('data/pagination', [
                'currentPage' => 2,
                'totalPages'  => 5,
                'baseUrl'     => '/nova-templates/partials?page=',
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">navigation/sidebar</h2>
            <?= Template::partial('navigation/sidebar', [
                'label' => 'Sidebar démo',
                'items' => [
                    ['href' => '/nova-templates', 'label' => 'Galerie', 'active' => true],
                    ['href' => '/nova-templates/partials', 'label' => 'Partials', 'active' => false],
                    ['href' => '/admin/users', 'label' => 'Admin users', 'active' => false],
                ],
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">navigation/user-menu</h2>
            <?= Template::partial('navigation/user-menu', [
                'userName'     => 'Demo User',
                'userMenuHref' => '/profile',
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">interface/theme-switcher</h2>
            <?= Template::partial('interface/theme-switcher', [
                'theme' => 'green',
                'label' => 'Palette Nova',
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">interface/icon (0.2 / nova-icons 0.2)</h2>
            <p style="display:flex;flex-wrap:wrap;gap:1rem;align-items:center;color:var(--nova-primary)">
                <?= Template::partial('interface/icon', ['name' => 'shield', 'size' => 'lg']) ?>
                <?= Template::partial('interface/icon', ['name' => 'message-circle', 'size' => 'lg']) ?>
                <?= Template::partial('interface/icon', ['name' => 'shopping-bag', 'size' => 'lg']) ?>
                <?= Template::partial('interface/icon', ['name' => 'cloud', 'size' => 'lg']) ?>
                <?= Template::partial('interface/icon', ['name' => 'terminal', 'size' => 'lg']) ?>
                <?= Template::partial('interface/icon', ['name' => 'book-open', 'size' => 'lg']) ?>
                <?= Template::partial('interface/icon', ['name' => 'heart', 'size' => 'lg', 'filled' => true]) ?>
            </p>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">interface/hero-illustration</h2>
            <?= Template::partial('interface/hero-illustration', [
                'src' => '/assets/app/illustrations/hero-custom.svg',
                'alt' => 'Illustration hero Nova',
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">interface/feature-card (0.3)</h2>
            <div class="nova-feature-grid">
                <?= Template::partial('interface/feature-card', [
                    'href' => '/nova-templates',
                    'title' => 'Feature card',
                    'text' => 'Partial Template Nova + classes Nova DEV-3.',
                    'icon' => 'shield',
                ]) ?>
            </div>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">interface/code-window (0.3)</h2>
            <?= Template::partial('interface/code-window', [
                'title' => 'demo.php',
                'tree' => [
                    ['label' => 'app'],
                    ['label' => 'demo.php', 'indent' => true, 'active' => true],
                ],
                'code' => '<span class="nova-code-window__kw">echo</span> <span class="nova-code-window__str">\'Nova\'</span>;',
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">forms/field + forms/field-error</h2>
            <?= Template::partial('forms/field', [
                'id'    => 'demo_email',
                'name'  => 'email',
                'label' => 'E-mail',
                'type'  => 'email',
                'value' => 'demo@astral.local',
                'error' => '',
            ]) ?>
            <?= Template::partial('forms/field-error', [
                'message' => 'Adresse e-mail invalide (démo).',
            ]) ?>
        </section>

        <section class="nova-card" style="padding:1.25rem">
            <h2 style="margin-top:0">feedback/error-page (extrait)</h2>
            <?= Template::partial('feedback/error-page', [
                'code'        => 404,
                'title'       => 'Page introuvable',
                'description' => 'Démonstration du partial d’erreur commun.',
                'homeUrl'     => '/nova-templates',
                'homeLabel'   => 'Retour galerie',
            ]) ?>
        </section>
    </div>
</section>
