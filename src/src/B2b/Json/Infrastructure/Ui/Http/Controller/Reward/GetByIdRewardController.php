<?php

namespace B2b\Json\Infrastructure\Ui\Http\Controller\Reward;

use B2b\Json\Application\Query\Reward\GetByIdRewardHandler;
use B2b\Json\Application\Request\Reward\GetByIdRewardRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetByIdRewardController
{
    private GetByIdRewardHandler $getByIdRewardHandler;

    public function __construct(GetByIdRewardHandler $getByIdRewardHandler)
    {
        $this->getByIdRewardHandler = $getByIdRewardHandler;
    }

    public function __invoke(Request $request)
    {
        $reward = ($this->getByIdRewardHandler)(
            new GetByIdRewardRequest($request->get('id'))
        );
        $response = new JsonResponse([
            'status' => 'ok',
            'hits' => [
                $reward->toArray(),
            ],
        ], 200);
        return $response;
    }
}