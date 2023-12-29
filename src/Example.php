<?php

namespace App;

use Aop\Annotation\HttpClientAnnotation;

class Example
{
    public function test()
    {
        echo "test 1\n";
    }

    /**
     * Test cacheable by annotation
     *
     * @HttpClientAnnotation
     *
     */
    public function test2(string $headers, string $param2) {
        echo "ECHO headers=$headers param2=$param2\n";
    }
}