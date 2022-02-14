<?php

namespace B2b\Json\Infrastructure\Ui\Http\Controller\Reward;

use B2b\Json\Application\Command\Reward\UpdateByIdRewardHandler;
use B2b\Json\Application\Request\Reward\UpdateByIdRewardRequest;
use B2b\Json\Domain\Model\Reward\RewardNotExist;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UpdateByIdRewardController
{
    private UpdateByIdRewardHandler $updateByIdRewardHandler;

    public function __construct(UpdateByIdRewardHandler $updateByIdRewardHandler)
    {
        $this->updateByIdRewardHandler = $updateByIdRewardHandler;
    }

    public function __invoke(Request $request)
    {
        try {
            $reward = ($this->updateByIdRewardHandler)(
                new UpdateByIdRewardRequest(
                    $request->get('id'),
                    $request->get('saleDate'),
                    $request->get('client'),
                    $request->get('product'),
                    $request->get('paid'),
                    $request->get('toPay'),
                    $request->get('incident')
                )
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
                'errorMesage' => 'The reward <' . $request->get('id') . '> does not exist'
            ], 500);
        }
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'X-Requested-With');
        return $response;
    }
}
