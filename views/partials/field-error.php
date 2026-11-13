<?php

declare(strict_types=1);

$field = (string) ($field ?? '');
$errors = is_array($errors ?? null) ? $errors : [];
$message = $errors[$field][0] ?? null;
if (!is_string($message) || $message === '') {
    return;
}

echo \Astral\TemplateNova\Template::partial('forms/field-error', [
    'message' => $message,
]);
