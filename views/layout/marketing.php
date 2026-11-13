<?php
$theme = $theme ?? 'white'; $mode = $mode ?? 'system';
$assetBase = rtrim((string) ($novaAssetBase ?? '/vendor/astral-php/astral-nova-css/dist'), '/');
$links = $marketingNav ?? [['href' => '/', 'label' => 'Accueil'], ['href' => '/docs', 'label' => 'Documentation']];
?>
<!doctype html>
<html lang="<?= htmlspecialchars((string) ($lang ?? 'fr'), ENT_QUOTES, 'UTF-8') ?>" data-nova-theme="<?= htmlspecialchars((string) $theme, ENT_QUOTES, 'UTF-8') ?>" data-nova-mode="<?= htmlspecialchars((string) $mode, ENT_QUOTES, 'UTF-8') ?>">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars((string) ($title ?? 'Astral'), ENT_QUOTES, 'UTF-8') ?></title>
<?php if (($novaEnabled ?? true) === true): ?><link rel="stylesheet" href="<?= htmlspecialchars((string) ($novaCss ?? $assetBase . '/nova.css'), ENT_QUOTES, 'UTF-8') ?>"><?php endif ?>
<?php if (!empty($head)): ?><?= $head ?><?php endif ?></head>
<body>
<a class="nova-skip-link" href="#main-content">Aller au contenu</a>
<header class="nova-topbar"><a href="<?= htmlspecialchars((string) ($brandHref ?? '/'), ENT_QUOTES, 'UTF-8') ?>"><strong><?= htmlspecialchars((string) ($brand ?? 'Astral'), ENT_QUOTES, 'UTF-8') ?></strong></a>
<nav class="nova-cluster" aria-label="Navigation principale"><?php foreach ($links as $link): ?><a class="nova-nav-link" href="<?= htmlspecialchars((string)($link['href']??'#'), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars((string)($link['label']??''), ENT_QUOTES, 'UTF-8') ?></a><?php endforeach ?></nav></header>
<main id="main-content" class="nova-page"><?= $content ?? '' ?></main>
<footer class="nova-page-footer"><?= htmlspecialchars((string) ($footer ?? 'Propulsé par Astral MVC'), ENT_QUOTES, 'UTF-8') ?></footer>
<?php if (!empty($novaJs)): ?><script src="<?= htmlspecialchars((string) $novaJs, ENT_QUOTES, 'UTF-8') ?>" defer></script><?php endif ?>
<?php if (!empty($scripts)): ?><?= $scripts ?><?php endif ?>
</body></html>
