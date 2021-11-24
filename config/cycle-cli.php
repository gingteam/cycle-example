<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Bootstrap;
use Cycle\ORM\ORMInterface;

return Bootstrap::boot()
    ->createContainer()
    ->getByType(ORMInterface::class);
