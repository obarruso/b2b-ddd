<?php 

namespace B2b\Json\Application\Command\Reward;

use B2b\Json\Domain\Id;
use B2b\Json\Domain\Model\Reward\Reward;
use B2b\Json\Domain\Model\Reward\RewardId;
use B2b\Json\Domain\Model\Reward\RewardRepository;
use B2b\Json\Application\Response\Reward\RewardResponse;
use B2b\Json\Application\Request\Reward\CreateOneRewardResquest;
use B2b\Json\Application\Response\Error\ErrorResponse;
use B2b\Json\Application\Response\AbstractResponse;

class CreateOneRewardHandler
{
    private RewardRepository $rewardRepository;
    private Reward $reward;

    public function __construct(RewardRepository $rewardRepository)
    {
        $this->rewardRepository = $rewardRepository;
    }

    public function __invoke(CreateOneRewardResquest $createRewardRequest): AbstractResponse
    {
        $this->reward = new Reward(
            new RewardId(Id::newUuid()),
            $createRewardRequest->saleDate(),
            $createRewardRequest->client(),
            $createRewardRequest->product(),
            $createRewardRequest->paid(),
            $createRewardRequest->toPay(),
            $createRewardRequest->incident()
        );

        //return new RewardResponse($reward);
        
        if($this->rewardRepository->insertOne($this->reward))
        {
            return new RewardResponse($this->reward);
        }else{
            // throw new Exception("Error Processing Request", 1);
            
            return new ErrorResponse('An error while safe in database');
        }
    }

    public function toArray(): array {
        return $this->reward->toArray();
    }
}