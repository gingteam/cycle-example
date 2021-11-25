<?php

declare(strict_types=1);

namespace App;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Logger implements LoggerInterface
{
    use LoggerTrait;

    function log($level, $message, array $context = array())
    {
        file_put_contents(__DIR__.'/../temp/log.txt', "Logger: $level: $message\n", FILE_APPEND);
    }
}
