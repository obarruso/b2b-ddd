<?php

namespace B2b\Json\Infrastructure\Ui\Http\Controller\Test;

use Symfony\Component\HttpFoundation\JsonResponse;
use B2b\Json\Application\Query\Test\Uuid\GetUuidHandler;
use B2b\Json\Application\Request\Test\Uuid\GetUuidRequest;

class TestUuidController
{
    private GetUuidHandler $getUuidHandler;

    public function __construct(GetUuidHandler $getUuidHandler)
    {
        $this->getUuidHandler = $getUuidHandler;
    }
    public function __invoke()
    {
    
        $newUuid = ($this->getUuidHandler)(
            new GetUuidRequest()
        );
        $response = new JsonResponse([
            'status' => 'ok',
            'hits' => [
                'UUID' => $newUuid->value(),
            ],
        ]);
        return $response;
    }
}