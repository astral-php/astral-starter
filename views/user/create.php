<!-- Vue : user/create -->
<section class="nova-page nova-page--narrow">
    <a href="/users" class="nova-btn nova-btn-outline nova-btn-sm">&larr; Retour à la liste</a>
    <section class="nova-card" style="margin-block:1.25rem">
        <header class="nova-card-header"><h1 class="nova-page-title"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1></header>
        <form method="POST" action="/users" class="nova-stack">
            <?= $csrf->field() ?>
            <?= $viewEngine->partial('partials/validation-errors', ['errors' => $errors ?? []]) ?>
            <div class="nova-form-group">
                <label class="nova-label" for="name">Nom complet</label>
                <input class="nova-input" type="text" id="name" name="name" value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>" placeholder="Jean Dupont" autocomplete="name" aria-invalid="<?= !empty($errors['name']) ? 'true' : 'false' ?>">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'name', 'errors' => $errors ?? []]) ?>
            </div>
            <div class="nova-form-group">
                <label class="nova-label" for="email">Adresse e-mail</label>
                <input class="nova-input" type="email" id="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>" placeholder="jean@example.com" autocomplete="email" aria-invalid="<?= !empty($errors['email']) ? 'true' : 'false' ?>">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'email', 'errors' => $errors ?? []]) ?>
            </div>
            <div class="nova-form-group">
                <label class="nova-label" for="password">Mot de passe</label>
                <input class="nova-input" type="password" id="password" name="password" minlength="8" autocomplete="new-password" placeholder="••••••••" aria-invalid="<?= !empty($errors['password']) ? 'true' : 'false' ?>">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'password', 'errors' => $errors ?? []]) ?>
            </div>
            <div><button type="submit" class="nova-btn nova-btn-primary nova-btn-block">Créer le compte</button></div>
        </form>
    </section>
</section>
