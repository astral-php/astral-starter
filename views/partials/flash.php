<?php

declare(strict_types=1);

$messages = [];
if ($session->hasFlash('success')) {
    $messages['success'] = (string) $session->getFlash('success');
}
if ($session->hasFlash('error')) {
    $messages['error'] = (string) $session->getFlash('error');
}
if ($messages === []) {
    return;
}

echo \Astral\TemplateNova\Template::partial('feedback/flash', [
    'messages' => $messages,
]);
