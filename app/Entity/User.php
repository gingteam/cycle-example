<?php

declare(strict_types=1);

namespace App\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity()]
class User
{
    #[Column(type: 'primary')]
    protected $id;

    #[Column(type: 'string')]
    public string $name;
}
