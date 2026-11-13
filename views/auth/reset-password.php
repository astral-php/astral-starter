<?php

use Astral\TemplateNova\Template;

?>
<!-- Vue : auth/reset-password -->
<section class="nova-auth-layout">
    <div class="nova-card" aria-labelledby="auth-title">
        <div class="nova-auth-mark" aria-hidden="true"><?= Template::partial('interface/icon', ['name' => 'lock', 'size' => 'lg']) ?></div>
        <h1 id="auth-title" class="nova-heading">Nouveau mot de passe</h1>
        <p class="nova-text-muted">Choisissez un mot de passe d’au moins 8 caractères</p>

        <form method="POST" action="/reset-password" class="nova-stack">
            <?= $csrf->field() ?>
            <?= $viewEngine->partial('partials/validation-errors', ['errors' => $errors ?? []]) ?>
            <input type="hidden" name="token" value="<?= htmlspecialchars($token, ENT_QUOTES, 'UTF-8') ?>">

            <div class="nova-form-group">
                <label class="nova-label" for="password">Nouveau mot de passe <span class="nova-text-muted">(min. 8)</span></label>
                <input type="password" id="password" name="password" autocomplete="new-password" minlength="8" autofocus
                       class="nova-input<?= !empty($errors['password']) ? ' is-invalid' : '' ?>"
                       placeholder="••••••••">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'password', 'errors' => $errors ?? []]) ?>
            </div>

            <div class="nova-form-group">
                <label class="nova-label" for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password"
                       class="nova-input<?= !empty($errors['password_confirmation']) ? ' is-invalid' : '' ?>"
                       placeholder="••••••••">
                <?= $viewEngine->partial('partials/field-error', ['field' => 'password_confirmation', 'errors' => $errors ?? []]) ?>
            </div>

            <button type="submit" class="nova-btn nova-btn-primary nova-btn-block">Enregistrer</button>
        </form>
    </div>
</section>
