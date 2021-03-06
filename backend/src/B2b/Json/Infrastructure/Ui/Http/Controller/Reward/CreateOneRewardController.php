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
        //$logger->info("foo");
        $reward = ($this->createOneRewardHandler)(new CreateOneRewardResquest(
            $request->get('saleDate'),
            $request->get('client'),
            $request->get('product'),
            $request->get('paid'),
            $request->get('toPay'),
            $request->get('incident')
        ));
        // @todo try catch 
        $response = new JsonResponse([
            'status' => 'ok',
            'hits' => [
                $reward->toArray(),
            ]
        ],201);
        $response->headers->set('Content-Type', 'application/json');
        // Permitir todos los sitios web
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
}