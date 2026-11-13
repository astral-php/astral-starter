<!-- Vue : profile/edit -->
<section class="nova-page nova-page--narrow">
    <header class="nova-page-header">
        <div>
            <h1 class="nova-page-title">Mon profil</h1>
            <p class="nova-text-muted">Gérez vos informations personnelles et vos identifiants.</p>
        </div>
    </header>

    <?php $tab = ($password_tab ?? false) ? 'password' : 'profile'; ?>
    <nav class="nova-tabs" aria-label="Sections du profil"><ul class="nova-tab-list">
        <li><a href="/profile" class="nova-tab" aria-selected="<?= $tab === 'profile' ? 'true' : 'false' ?>">Informations</a></li>
        <li><a href="/profile#password" class="nova-tab" aria-selected="<?= $tab === 'password' ? 'true' : 'false' ?>" onclick="document.getElementById('password-section').scrollIntoView({behavior:'smooth'});return false;">Mot de passe</a></li>
    </ul></nav>

    <section class="nova-card" style="margin-block:1.25rem" aria-labelledby="profile-info-title">
        <header class="nova-card-header nova-profile-heading">
            <span class="nova-avatar" aria-hidden="true"><?= htmlspecialchars(mb_strtoupper(mb_substr($user->name ?? '', 0, 1)), ENT_QUOTES, 'UTF-8') ?></span>
            <div>
                <h2 id="profile-info-title"><?= htmlspecialchars($user->name ?? '', ENT_QUOTES, 'UTF-8') ?></h2>
                <p class="nova-text-muted"><?= htmlspecialchars($user->email ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                <span class="nova-badge <?= ($user->role ?? '') === 'admin' ? 'nova-badge-warning' : '' ?>"><?= htmlspecialchars(ucfirst($user->role ?? 'user'), ENT_QUOTES, 'UTF-8') ?></span>
            </div>
        </header>
        <form method="POST" action="/profile" class="nova-stack">
            <?= $csrf->field() ?>
            <?= $viewEngine->partial('partials/validation-errors', ['errors' => $errors ?? []]) ?>
            <div class="nova-form-group">
                <label class="nova-label" for="name">Nom complet</label>
                <input class="nova-input" type="text" id="name" name="name" value="<?= htmlspecialchars($old['name'] ?? $user->name ?? '', ENT_QUOTES, 'UTF-8') ?>" autocomplete="name" aria-invalid="<?= !empty($errors['name']) ? 'true' : 'false' ?>">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'name', 'errors' => $errors ?? []]) ?>
            </div>
            <div class="nova-form-group">
                <label class="nova-label" for="email">Adresse e-mail</label>
                <input class="nova-input" type="email" id="email" name="email" value="<?= htmlspecialchars($old['email'] ?? $user->email ?? '', ENT_QUOTES, 'UTF-8') ?>" autocomplete="email" aria-invalid="<?= !empty($errors['email']) ? 'true' : 'false' ?>">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'email', 'errors' => $errors ?? []]) ?>
            </div>
            <div><button type="submit" class="nova-btn nova-btn-primary">Enregistrer les modifications</button></div>
        </form>
    </section>

    <section id="password-section" class="nova-card" style="margin-block:1.25rem" aria-labelledby="password-title">
        <header class="nova-card-header"><h2 id="password-title">Changer le mot de passe</h2></header>
        <form method="POST" action="/profile/password" class="nova-stack">
            <?= $csrf->field() ?>
            <?= $viewEngine->partial('partials/validation-errors', ['errors' => $errors ?? []]) ?>
            <div class="nova-form-group">
                <label class="nova-label" for="current_password">Mot de passe actuel</label>
                <input class="nova-input" type="password" id="current_password" name="current_password" autocomplete="current-password" placeholder="••••••••" aria-invalid="<?= !empty($errors['current_password']) ? 'true' : 'false' ?>">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'current_password', 'errors' => $errors ?? []]) ?>
            </div>
            <div class="nova-form-group">
                <label class="nova-label" for="password">Nouveau mot de passe <span class="nova-text-muted">(min. 8 caractères)</span></label>
                <input class="nova-input" type="password" id="password" name="password" autocomplete="new-password" minlength="8" placeholder="••••••••" aria-invalid="<?= !empty($errors['password']) ? 'true' : 'false' ?>">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'password', 'errors' => $errors ?? []]) ?>
            </div>
            <div class="nova-form-group">
                <label class="nova-label" for="password_confirmation">Confirmer le nouveau mot de passe</label>
                <input class="nova-input" type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="••••••••" aria-invalid="<?= !empty($errors['password_confirmation']) ? 'true' : 'false' ?>">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'password_confirmation', 'errors' => $errors ?? []]) ?>
            </div>
            <div><button type="submit" class="nova-btn nova-btn-secondary">Modifier le mot de passe</button></div>
        </form>
    </section>
</section>
