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
        /*$response = new JsonResponse([
            'status' => 'ok',
            'rewards' => $rewards->toArray(),
        ], 200);*/
        $response = new JsonResponse([
            'rewards' => $rewards->toArray(),
        ], 200);
        $response->headers->set('Content-Type', 'application/json');
        // Permitir todos los sitios web
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
}
