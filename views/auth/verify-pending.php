<?php

use Astral\TemplateNova\Template;

?>
<!-- Vue : auth/verify-pending -->
<section class="nova-auth-layout">
    <div class="nova-card" aria-labelledby="auth-title">
        <div class="nova-auth-mark" aria-hidden="true"><?= Template::partial('interface/icon', ['name' => 'mail', 'size' => 'lg']) ?></div>
        <h1 id="auth-title" class="nova-heading">Vérifiez vos e-mails</h1>
        <p class="nova-text-muted">
            Un lien de confirmation vient d’être envoyé.<br>
            Cliquez dessus pour activer votre compte.
        </p>

        <div class="nova-alert nova-alert-warning" role="status">
            <div>
                <p style="margin:0 0 .5rem;font-weight:650">Vous ne trouvez pas l’e-mail ?</p>
                <ul style="margin:0;padding-inline-start:1.2rem">
                    <li>Vérifiez Spam / Courrier indésirable</li>
                    <li>L’e-mail peut prendre quelques minutes</li>
                </ul>
            </div>
        </div>

        <p class="nova-auth-footer">
            <a href="/login">← Retour à la connexion</a>
        </p>
    </div>
</section>
