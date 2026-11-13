<?php

use Astral\TemplateNova\Template;

?>
<!-- Vue : auth/register -->
<section class="nova-auth-layout">
    <div class="nova-card">
        <div class="nova-auth-mark" aria-hidden="true"><?= Template::partial('interface/icon', ['name' => 'user-plus', 'size' => 'lg']) ?></div>
        <h1 class="nova-heading">Créer un compte</h1>
        <p class="nova-text-muted">Le premier compte devient administrateur</p>

        <form method="POST" action="/register" class="nova-stack">
            <?= $csrf->field() ?>
            <?= $viewEngine->partial('partials/validation-errors', ['errors' => $errors ?? []]) ?>

            <div class="nova-form-group">
                <label class="nova-label" for="name">Nom complet</label>
                <input type="text" id="name" name="name" autocomplete="name" autofocus
                       value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                       class="nova-input<?= !empty($errors['name']) ? ' is-invalid' : '' ?>"
                       <?= !empty($errors['name']) ? 'aria-invalid="true"' : '' ?>
                       placeholder="Jean Dupont">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'name', 'errors' => $errors ?? []]) ?>
            </div>

            <div class="nova-form-group">
                <label class="nova-label" for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" autocomplete="email"
                       value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                       class="nova-input<?= !empty($errors['email']) ? ' is-invalid' : '' ?>"
                       <?= !empty($errors['email']) ? 'aria-invalid="true"' : '' ?>
                       placeholder="jean@exemple.com">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'email', 'errors' => $errors ?? []]) ?>
            </div>

            <div class="nova-form-group">
                <label class="nova-label" for="password">Mot de passe <span class="nova-text-muted">(min. 8 caractères)</span></label>
                <input type="password" id="password" name="password" autocomplete="new-password" minlength="8"
                       class="nova-input<?= !empty($errors['password']) ? ' is-invalid' : '' ?>"
                       <?= !empty($errors['password']) ? 'aria-invalid="true"' : '' ?>
                       placeholder="••••••••">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'password', 'errors' => $errors ?? []]) ?>
            </div>

            <div class="nova-form-group">
                <label class="nova-label" for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password"
                       class="nova-input<?= !empty($errors['password_confirmation']) ? ' is-invalid' : '' ?>"
                       <?= !empty($errors['password_confirmation']) ? 'aria-invalid="true"' : '' ?>
                       placeholder="••••••••">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'password_confirmation', 'errors' => $errors ?? []]) ?>
            </div>

            <button type="submit" class="nova-btn nova-btn-primary nova-btn-block">Créer le compte</button>
        </form>

        <p class="nova-auth-footer">
            Déjà inscrit ?
            <a href="/login">Se connecter</a>
        </p>
    </div>
</section>
