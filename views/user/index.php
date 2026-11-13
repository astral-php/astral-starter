<!-- Vue : user/index -->
<section class="nova-page">
    <header class="nova-page-header">
        <div>
            <h1 class="nova-page-title"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>
            <?php if ($total > 0): ?><p class="nova-text-muted"><?= (int) $total ?> utilisateur<?= $total > 1 ? 's' : '' ?></p><?php endif ?>
        </div>
        <?php if ($auth->is(\Core\Auth\Role::Admin)): ?>
            <a href="/users/create" class="nova-btn nova-btn-primary">+ Nouvel utilisateur</a>
        <?php endif ?>
    </header>
    <?php if (empty($users)): ?>
        <div class="nova-card nova-empty-state">
            <p>Aucun utilisateur enregistré.</p>
            <?php if ($auth->is(\Core\Auth\Role::Admin)): ?><a href="/users/create" class="nova-btn nova-btn-primary nova-btn-sm">Créer le premier</a><?php endif ?>
        </div>
    <?php else: ?>
        <div class="nova-card nova-table-wrap">
            <table class="nova-table">
                <thead><tr><th scope="col">ID</th><th scope="col">Nom</th><th scope="col">E-mail</th><th scope="col">Rôle</th><th scope="col">Créé le</th><th scope="col"><span class="nova-sr-only">Actions</span></th></tr></thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="nova-table-cell-muted">#<?= (int) $user->id ?></td>
                        <td><strong><?= htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') ?></strong><?php if ($user->id === $auth->id()): ?> <span class="nova-badge">Vous</span><?php endif ?></td>
                        <td><?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ?></td>
                        <td><span class="nova-badge <?= $user->role === 'admin' ? 'nova-badge-warning' : '' ?>"><?= htmlspecialchars(ucfirst($user->role), ENT_QUOTES, 'UTF-8') ?></span></td>
                        <td class="nova-table-cell-muted"><?= htmlspecialchars($user->created_at, ENT_QUOTES, 'UTF-8') ?></td>
                        <td><a class="nova-btn nova-btn-outline nova-btn-sm" href="/users/<?= (int) $user->id ?>">Voir</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?= $viewEngine->partial('partials/pagination', ['current' => $current, 'pages' => $pages, 'baseUrl' => '/users']) ?>
    <?php endif ?>
</section>
