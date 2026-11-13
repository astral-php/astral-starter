<?php

declare(strict_types=1);

/**
 * Bootstrap CLI partagé — inclus par `astral` et `bin/console`.
 */

if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

require BASE_PATH . '/vendor/autoload.php';

if (file_exists(BASE_PATH . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
    $dotenv->safeLoad();
}

use Core\Console\ConsoleFactory;

$console = ConsoleFactory::create(
    basePath: BASE_PATH,
    appName: 'Astral Starter Console',
    appCommandClasses: ConsoleFactory::loadAppCommands(BASE_PATH),
);

exit($console->run($_SERVER['argv'] ?? []));
