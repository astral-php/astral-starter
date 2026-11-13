<?php

use Astral\TemplateNova\Template;

?>
<!-- Vue : auth/forgot-password -->
<section class="nova-auth-layout">
    <div class="nova-card" aria-labelledby="auth-title">
        <div class="nova-auth-mark" aria-hidden="true"><?= Template::partial('interface/icon', ['name' => 'mail', 'size' => 'lg']) ?></div>
        <h1 id="auth-title" class="nova-heading">Mot de passe oublié</h1>
        <p class="nova-text-muted">Recevez un lien de réinitialisation par e-mail</p>

        <?php if ($sent): ?>
            <div class="nova-alert nova-alert-success" role="status">
                Si cette adresse e-mail est associée à un compte, vous recevrez un lien de réinitialisation dans quelques instants.
            </div>
        <?php else: ?>
            <form method="POST" action="/forgot-password" class="nova-stack">
                <?= $csrf->field() ?>
                <?= $viewEngine->partial('partials/validation-errors', ['errors' => $errors ?? []]) ?>

                <div class="nova-form-group">
                    <label class="nova-label" for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" autocomplete="email" autofocus
                           value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                           class="nova-input<?= !empty($errors['email']) ? ' is-invalid' : '' ?>"
                           placeholder="vous@exemple.com">
                    <?= $viewEngine->partial('partials/field-error', ['field' => 'email', 'errors' => $errors ?? []]) ?>
                </div>

                <button type="submit" class="nova-btn nova-btn-primary nova-btn-block">Envoyer le lien</button>
            </form>
        <?php endif ?>

        <p class="nova-auth-footer">
            <a href="/login">← Retour à la connexion</a>
        </p>
    </div>
</section>
