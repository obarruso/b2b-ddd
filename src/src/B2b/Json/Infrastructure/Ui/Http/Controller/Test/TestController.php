<?php

namespace B2b\Json\Infrastructure\Ui\Http\Controller\Test;

use Symfony\Component\HttpFoundation\JsonResponse;

class TestController
{
    public function __invoke()
    {
    
        $response = new JsonResponse([
            'status' => 'ok'
        ]);
        return $response;
    }
}