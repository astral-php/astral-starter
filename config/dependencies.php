<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use Astral\TemplateNova\TemplateServiceProvider;
use Core\Providers\DatabaseServiceProvider;
use Core\Providers\FrameworkServiceProvider;

return [
    FrameworkServiceProvider::class,
    DatabaseServiceProvider::class,
    TemplateServiceProvider::class,
    AppServiceProvider::class,
];
