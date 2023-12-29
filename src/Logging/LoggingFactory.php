<?php

namespace Logging;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggingFactory
{
    public static function getLogger(string $name) : Logger
    {
        $logger = new Logger($name);

        $stream_handler = new StreamHandler("php://stdout");
        $logger->pushHandler($stream_handler);

        return $logger;
    }
}
