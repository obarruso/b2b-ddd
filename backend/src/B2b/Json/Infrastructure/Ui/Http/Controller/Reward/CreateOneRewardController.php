<?php

namespace B2b\Json\Infrastructure\Ui\Http\Controller\Reward;

use B2b\Json\Application\Command\Reward\CreateOneRewardHandler;
use B2b\Json\Application\Request\Reward\CreateOneRewardResquest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CreateOneRewardController
{
    private CreateOneRewardHandler $createOneRewardHandler;
    public function __construct(CreateOneRewardHandler $createOneRewardHandler)
    {
        $this->createOneRewardHandler = $createOneRewardHandler;
    }
    public function __invoke(Request $request)
    {
        $reward = ($this->createOneRewardHandler)(new CreateOneRewardResquest(
            $request->get('saleDate'),
            $request->get('client'),
            $request->get('product'),
            $request->get('paid'),
            $request->get('toPay'),
            $request->get('incident')
        ));
        // try catch 
        $response = new JsonResponse([
            'status' => 'ok',
            'hits' => [
                $reward->toArray(),
            ]
        ],200);
        return $response;
    }
}