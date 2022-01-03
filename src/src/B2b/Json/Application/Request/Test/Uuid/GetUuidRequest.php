<?php

namespace B2b\Json\Application\Request\Test\Uuid;

use B2b\Json\Domain\Id;

class GetUuidRequest 
{
    private string $uuid;

    public function __construct()
    {
        $this->uuid = Id::newUuid();
    }

    public function uuid(): string
    {
        return $this->uuid;
    }
}