<?php

namespace B2b\Json\Application\Query\Test\Uuid;

use B2b\Json\Domain\Id;
use B2b\Json\Application\Request\Test\Uuid\GetUuidRequest;


class GetUuidHandler
{
    public function __invoke(GetUuidRequest $getUuidRequest): Id
    {
        return new Id($getUuidRequest->uuid());
    }
}