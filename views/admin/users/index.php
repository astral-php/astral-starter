<!-- Vue : admin/users/index — Gestion des rôles utilisateurs -->
<section class="nova-page">
    <header class="nova-page-header">
        <div>
            <span class="nova-badge nova-badge-warning">Administration</span>
            <h1 class="nova-page-title"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>
            <p class="nova-text-muted"><?= count($users) ?> utilisateur<?= count($users) > 1 ? 's' : '' ?> — <?= (int) $adminCount ?> administrateur<?= $adminCount > 1 ? 's' : '' ?></p>
        </div>
        <a href="/users" class="nova-btn nova-btn-outline">&larr; Retour à la liste</a>
    </header>

    <?php if ($adminCount === 1): ?>
        <div class="nova-alert nova-alert-warning" role="status">Il n'y a qu'un seul administrateur. Vous ne pouvez pas le rétrograder tant qu'aucun autre administrateur n'a été désigné.</div>
    <?php endif ?>

    <?php if (empty($users)): ?>
        <div class="nova-card nova-empty-state">Aucun utilisateur enregistré.</div>
    <?php else: ?>
        <div class="nova-card nova-table-wrap">
            <table class="nova-table">
                <thead><tr><th scope="col">Utilisateur</th><th scope="col">E-mail</th><th scope="col">Rôle actuel</th><th scope="col">Changer le rôle</th><th scope="col">Inscrit le</th></tr></thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <?php
                        $isSelf = $user->id === $auth->id();
                        $isLastAdmin = $user->role === \Core\Auth\Role::Admin->value && $adminCount <= 1;
                        $isDisabled = $isSelf || $isLastAdmin;
                    ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') ?></strong><?php if ($isSelf): ?> <span class="nova-badge">Vous</span><?php endif ?><div class="nova-table-cell-muted">#<?= (int) $user->id ?></div></td>
                        <td><?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ?></td>
                        <td><span class="nova-badge <?= $user->role === 'admin' ? 'nova-badge-warning' : '' ?>"><?= htmlspecialchars(ucfirst($user->role), ENT_QUOTES, 'UTF-8') ?></span></td>
                        <td>
                            <?php if ($isDisabled): ?>
                                <span class="nova-text-muted"><?php if ($isSelf): ?>Votre propre rôle<?php elseif ($isLastAdmin): ?>Dernier administrateur<?php endif ?></span>
                            <?php else: ?>
                                <form method="POST" action="/admin/users/<?= (int) $user->id ?>/role" class="nova-inline-form">
                                    <?= $csrf->field() ?>
                                    <label class="nova-sr-only" for="role-<?= (int) $user->id ?>">Rôle de <?= htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') ?></label>
                                    <select id="role-<?= (int) $user->id ?>" name="role" class="nova-select">
                                        <?php foreach ($roles as $r): ?>
                                            <?php if ($r === \Core\Auth\Role::Guest->value) continue; ?>
                                            <option value="<?= htmlspecialchars($r, ENT_QUOTES, 'UTF-8') ?>" <?= $user->role === $r ? 'selected' : '' ?>><?= htmlspecialchars(ucfirst($r), ENT_QUOTES, 'UTF-8') ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <button type="submit" class="nova-btn nova-btn-primary nova-btn-sm">Appliquer</button>
                                </form>
                            <?php endif ?>
                        </td>
                        <td class="nova-table-cell-muted"><?= htmlspecialchars($user->created_at, ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
</section>
