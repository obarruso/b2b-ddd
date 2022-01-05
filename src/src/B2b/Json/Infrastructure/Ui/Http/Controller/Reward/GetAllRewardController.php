<?php

namespace B2b\Json\Infrastructure\Ui\Http\Controller\Reward;

use B2b\Json\Application\Query\Reward\GetAllRewardHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetAllRewardController
{
    private GetAllRewardHandler $getAllRewardHandler;

    public function __construct(GetAllRewardHandler $getAllRewardHandler)
    {
        $this->getAllRewardHandler = $getAllRewardHandler;
    }

    public function __invoke(Request $request)
    {
        $rewards = ($this->getAllRewardHandler)();
        $response = new JsonResponse([
            'status' => 'ok',
            'hits' => [
                $rewards->toArray(),
            ],
        ], 200);
        return $response;
    }
}