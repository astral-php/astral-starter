<?php
// Les messages d'exception et les traces ne sont jamais exposés par cette vue.
echo \Astral\TemplateNova\Template::partial('feedback/error-page', [
    'code' => 500,
    'reference' => isset($errorReference) ? (string) $errorReference : '',
]);
