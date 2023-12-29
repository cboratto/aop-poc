<?php

declare(strict_types = 1);

use Aop\Kernel\ApplicationAspectKernel;
use Go\Aop\Features;

require_once __DIR__ . '/../vendor/autoload.php';

// Initialize demo aspect container
ApplicationAspectKernel::getInstance()->init([
    'debug'    => true,
    'cacheDir' => '/tmp',
    'features' => Features::INTERCEPT_FUNCTIONS,
    'excludePaths' => [
        __DIR__.'/../vendor'
    ]
]);