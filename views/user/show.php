<!-- Vue : user/show -->
<section class="nova-page nova-page--narrow">
    <a href="/users" class="nova-btn nova-btn-outline nova-btn-sm">&larr; Retour à la liste</a>
    <section class="nova-card" style="margin-block:1.25rem">
        <header class="nova-card-header nova-profile-heading">
            <span class="nova-avatar" aria-hidden="true"><?= htmlspecialchars(mb_strtoupper(mb_substr($user->name, 0, 1)), ENT_QUOTES, 'UTF-8') ?></span>
            <div>
                <h1 class="nova-page-title"><?= htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') ?></h1>
                <p class="nova-text-muted">Utilisateur #<?= (int) $user->id ?></p>
                <div class="nova-cluster">
                    <span class="nova-badge <?= $user->role === 'admin' ? 'nova-badge-warning' : '' ?>"><?= htmlspecialchars(ucfirst($user->role), ENT_QUOTES, 'UTF-8') ?></span>
                    <?php if ($user->isVerified()): ?>
                        <span class="nova-badge nova-badge-success">Vérifié</span>
                    <?php else: ?>
                        <span class="nova-badge">Non vérifié</span>
                    <?php endif ?>
                </div>
            </div>
        </header>
        <dl class="nova-description-list">
            <div><dt>E-mail</dt><dd><?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ?></dd></div>
            <div><dt>Rôle</dt><dd><?= htmlspecialchars(ucfirst($user->role), ENT_QUOTES, 'UTF-8') ?></dd></div>
            <div><dt>Membre depuis</dt><dd><?= htmlspecialchars($user->created_at, ENT_QUOTES, 'UTF-8') ?></dd></div>
        </dl>
        <?php if ($auth->is(\Core\Auth\Role::Admin) && $user->id !== $auth->id()): ?>
            <form method="POST" action="/users/<?= (int) $user->id ?>/delete" class="nova-actions-end" onsubmit="return confirm('Supprimer définitivement cet utilisateur ?')">
                <?= $csrf->field() ?>
                <button type="submit" class="nova-btn nova-btn-danger">Supprimer le compte</button>
            </form>
        <?php endif ?>
    </section>
</section>
