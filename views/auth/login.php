<?php

use Astral\TemplateNova\Template;

?>
<!-- Vue : auth/login -->
<section class="nova-auth-layout">
    <div class="nova-card">
        <div class="nova-auth-mark" aria-hidden="true"><?= Template::partial('interface/icon', ['name' => 'user', 'size' => 'lg']) ?></div>
        <h1 class="nova-heading">Connexion</h1>
        <p class="nova-text-muted">Accédez à votre espace Astral Starter</p>

        <form method="POST" action="/login" class="nova-stack">
            <?= $csrf->field() ?>

            <div class="nova-form-group">
                <label class="nova-label" for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" autocomplete="email" autofocus
                       value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                       class="nova-input<?= !empty($errors['email']) ? ' is-invalid' : '' ?>"
                       <?= !empty($errors['email']) ? 'aria-invalid="true"' : '' ?>
                       placeholder="vous@exemple.com">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'email', 'errors' => $errors ?? []]) ?>
            </div>

            <div class="nova-form-group">
                <div class="nova-cluster-between">
                    <label class="nova-label" for="password">Mot de passe</label>
                    <a class="nova-link" href="/forgot-password">Mot de passe oublié ?</a>
                </div>
                <input type="password" id="password" name="password" autocomplete="current-password"
                       class="nova-input<?= !empty($errors['password']) ? ' is-invalid' : '' ?>"
                       <?= !empty($errors['password']) ? 'aria-invalid="true"' : '' ?>
                       placeholder="••••••••">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'password', 'errors' => $errors ?? []]) ?>
            </div>

            <button type="submit" class="nova-btn nova-btn-primary nova-btn-block">Se connecter</button>
        </form>

        <p class="nova-auth-footer">
            Pas encore de compte ?
            <a href="/register">Créer un compte</a>
        </p>
    </div>
</section>
