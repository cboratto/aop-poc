<?php

declare(strict_types = 1);

use App\ApplicationAspectKernel;
use Go\Aop\Features;

require_once __DIR__ . '/../vendor/autoload.php';

// Initialize demo aspect container
ApplicationAspectKernel::getInstance()->init([
    'debug'    => true,
    'appDir'   => __DIR__  . '..',
    'cacheDir' => __DIR__ . '/cache',
    'features' => Features::INTERCEPT_FUNCTIONS,
    'includePaths' => [
        __DIR__,
        __DIR__.'/../'
    ]
]);