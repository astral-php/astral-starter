<?php

declare(strict_types=1);

$errors = is_array($errors ?? null) ? $errors : [];
$flat = [];
foreach ($errors as $messages) {
    foreach ((array) $messages as $message) {
        if (is_scalar($message) && (string) $message !== '') {
            $flat[] = (string) $message;
        }
    }
}
if ($flat === []) {
    return;
}
?>
<div class="nova-alert nova-alert-danger" role="alert" aria-live="assertive">
    <div>
        <p style="margin:0 0 .5rem;font-weight:650">Veuillez corriger les erreurs suivantes :</p>
        <ul style="margin:0;padding-inline-start:1.2rem">
            <?php foreach ($flat as $message): ?>
                <li><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
