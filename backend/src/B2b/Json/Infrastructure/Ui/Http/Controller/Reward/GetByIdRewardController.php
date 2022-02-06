<?php

namespace B2b\Json\Infrastructure\Ui\Http\Controller\Reward;

use B2b\Json\Application\Query\Reward\GetByIdRewardHandler;
use B2b\Json\Application\Request\Reward\GetByIdRewardRequest;
use B2b\Json\Domain\Model\Reward\RewardNotExist;
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
        try {
            $reward = ($this->getByIdRewardHandler)(
                new GetByIdRewardRequest($request->get('id'))
            );
            $response = new JsonResponse([
                'status' => 'ok',
                'hits' => [
                    $reward->toArray(),
                ],
            ], 200);
        } catch (RewardNotExist $e) {
            $response = new JsonResponse([
                'status' => 'error',
                'errorMesage' => 'The reward <'.$request->get('id').'> does not exist'
            ], 500);
        }
        $response->headers->set('Content-Type', 'application/json');
        // Permitir todos los sitios web
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
}
