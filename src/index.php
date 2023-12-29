<?php

namespace App;

require_once __DIR__ . '/autoload_aspect.php';

use Go\Instrument\Transformer\FilterInjectorTransformer;

require_once FilterInjectorTransformer::rewrite(__DIR__ . '/Example.php');

$example = new Example();
$example->test();