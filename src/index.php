<?php

namespace App;

use App\Example;

require_once __DIR__ . '/bootstrap.php';

$example = new Example();
$example->test2("para1-value", "param2-value" );