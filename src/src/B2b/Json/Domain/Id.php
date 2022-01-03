<?php

namespace B2b\Json\Domain;

use Ramsey\Uuid\Uuid;

class Id
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
    public static function newUuid(): string
    {
        return Uuid::uuid4()->toString();
    }
}
