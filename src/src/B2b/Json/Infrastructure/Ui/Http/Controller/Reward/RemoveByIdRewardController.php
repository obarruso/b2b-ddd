<?php

namespace B2b\Json\Infrastructure\Ui\Http\Controller\Reward;

use B2b\Json\Application\Command\Reward\RemoveByIdRewardHandler;
use B2b\Json\Application\Request\Reward\RemoveByIdRewardRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RemoveByIdRewardController
{
    private RemoveByIdRewardHandler $removeByIdRewardHandler;

    public function __construct(RemoveByIdRewardHandler $removeByIdRewardHandler)
    {
        $this->removeByIdRewardHandler = $removeByIdRewardHandler;
    }

    public function __invoke(Request $request)
    {
        
        $reward = ($this->removeByIdRewardHandler)(
            new RemoveByIdRewardRequest($request->get('id'))
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