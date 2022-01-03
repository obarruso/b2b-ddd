<?php

namespace B2b\Json\Infrastructure\Ui\Http\Controller\Reward;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetAllRewardController
{
    public function __invoke()
    {
    
        $response = new JsonResponse([
            'status' => 'ok',
            'hits' => [
                'reward' => 'reward',
            ],
        ]);
        return $response;
    }
}