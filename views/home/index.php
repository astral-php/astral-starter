<?php

use Astral\TemplateNova\Template;

$codeHtml = <<<'HTML'
<span class="nova-code-window__kw">&lt;?php</span>

<span class="nova-code-window__kw">namespace</span> App\Controllers;

<span class="nova-code-window__kw">class</span> <span class="nova-code-window__type">HomeController</span>
{
    <span class="nova-code-window__kw">public function</span> <span class="nova-code-window__fn">index</span>(): Response
    {
        <span class="nova-code-window__kw">return</span> $this-&gt;render(<span class="nova-code-window__str">'home/index'</span>, [
            <span class="nova-code-window__str">'title'</span> =&gt; <span class="nova-code-window__str">'Bienvenue'</span>,
        ]);
    }
}
HTML;
?>
<section class="nova-hero">
    <div class="nova-hero-inner">
        <div class="nova-hero-copy">
            <span class="nova-eyebrow">Starter Kit Astral MVC</span>
            <h1 class="nova-display">Votre prochaine <span>application commence ici.</span></h1>
            <p class="nova-lead">Une base Astral MVC propre et légère pour construire votre métier, à votre rythme.</p>
            <div class="nova-hero-actions">
                <?php if (empty($hasUsers)): ?>
                    <a class="nova-btn nova-btn-primary nova-btn-lg" href="/register"><?= Template::partial('interface/icon', ['name' => 'plus']) ?> Créer le compte administrateur →</a>
                    <a class="nova-btn nova-btn-secondary nova-btn-lg" href="#features"><?= Template::partial('interface/icon', ['name' => 'play']) ?> Découvrir le starter</a>
                <?php elseif (!$auth->check()): ?>
                    <a class="nova-btn nova-btn-primary nova-btn-lg" href="/login">Se connecter</a>
                    <a class="nova-btn nova-btn-secondary nova-btn-lg" href="/register">Créer un compte</a>
                <?php else: ?>
                    <a class="nova-btn nova-btn-primary nova-btn-lg" href="/admin/users">Ouvrir l'administration →</a>
                    <a class="nova-btn nova-btn-secondary nova-btn-lg" href="/profile">Mon profil</a>
                <?php endif ?>
            </div>
        </div>

        <div class="nova-hero-visual">
            <span class="nova-watermark" aria-hidden="true">A</span>
            <div class="nova-float-chip nova-float-chip--icon nova-float-chip--code"><?= Template::partial('interface/icon', ['name' => 'code']) ?></div>
            <?= Template::partial('interface/code-window', [
                'title' => 'HomeController.php',
                'label' => 'Exemple de code PHP',
                'tree' => [
                    ['label' => 'app'],
                    ['label' => 'Controller', 'indent' => true],
                    ['label' => 'HomeController.php', 'indent' => true, 'active' => true],
                    ['label' => 'Model', 'indent' => true],
                    ['label' => 'View', 'indent' => true],
                    ['label' => 'config'],
                    ['label' => 'public'],
                ],
                'code' => $codeHtml,
            ]) ?>
            <div class="nova-float-chip nova-float-chip--panel nova-float-chip--checklist">
                <ul class="nova-check-list">
                    <li><?= Template::partial('interface/icon', ['name' => 'check']) ?> Astral MVC</li>
                    <li><?= Template::partial('interface/icon', ['name' => 'check']) ?> Authentification</li>
                    <li><?= Template::partial('interface/icon', ['name' => 'check']) ?> Prêt à développer</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="features" class="nova-feature-grid" aria-label="Fonctionnalités principales">
    <?= Template::partial('interface/feature-card', [
        'href' => '/login',
        'title' => 'Authentification',
        'text' => 'Système complet et sécurisé basé sur Astral Auth.',
        'icon' => 'shield',
    ]) ?>
    <?= Template::partial('interface/feature-card', [
        'href' => '/admin/users',
        'title' => 'Gestion des utilisateurs',
        'text' => 'Administration des comptes, rôles et permissions.',
        'icon' => 'users',
    ]) ?>
    <?= Template::partial('interface/feature-card', [
        'href' => '/profile',
        'title' => 'Profil & sécurité',
        'text' => 'Gestion du profil, mot de passe et paramètres utilisateur.',
        'icon' => 'settings',
    ]) ?>
    <?= Template::partial('interface/feature-card', [
        'href' => 'https://github.com/astral-php/astral',
        'title' => 'Astral Core',
        'text' => 'Une base MVC propre, légère et évolutive.',
        'icon' => 'layers',
    ]) ?>
</section>

<?= Template::partial('content/steps', [
    'title' => 'Le minimum.',
    'titleAccent' => 'Rien de superflu.',
    'lead' => 'Astral Starter fournit uniquement l\'essentiel pour démarrer une application Astral, sans module inutile, afin de vous laisser une liberté totale.',
    'items' => [
        [
            'icon' => 'file-text',
            'number' => '1',
            'title' => 'Une base claire',
            'text' => 'Une structure MVC simple et organisée, conforme aux bonnes pratiques Astral.',
        ],
        [
            'icon' => 'puzzle',
            'number' => '2',
            'title' => 'Prête à étendre',
            'text' => 'Ajoutez vos propres modules, formulaires, API ou composants selon vos besoins.',
        ],
        [
            'icon' => 'palette',
            'number' => '3',
            'title' => 'Votre design, vos règles',
            'text' => 'Personnalisez l\'interface avec Nova et adaptez l\'application à votre métier.',
        ],
    ],
]) ?>
