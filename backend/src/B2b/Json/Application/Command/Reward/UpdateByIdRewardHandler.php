<?php

namespace B2b\Json\Application\Command\Reward;

use B2b\Json\Application\Request\Reward\UpdateByIdRewardRequest;
use B2b\Json\Domain\Model\Reward\Reward;
use B2b\Json\Domain\Model\Reward\RewardId;
use B2b\Json\Domain\Model\Reward\RewardRepository;

use B2b\Json\Application\Response\AbstractResponse;
use B2b\Json\Application\Response\Reward\RewardResponse;

class UpdateByIdRewardHandler {

    private RewardRepository $rewardRepository;
    private Reward $reward;

    public function __construct(RewardRepository $rewardRepository) {
        $this->rewardRepository = $rewardRepository;
    }

    public function __invoke(UpdateByIdRewardRequest $updateByIdRewardRequest): AbstractResponse
    {
        
        $this->reward = new Reward(
            new RewardId($updateByIdRewardRequest->id()),
            $updateByIdRewardRequest->saleDate(),
            $updateByIdRewardRequest->client(),
            $updateByIdRewardRequest->product(),
            $updateByIdRewardRequest->paid(),
            $updateByIdRewardRequest->toPay(),
            $updateByIdRewardRequest->incident()
        );

        $this->rewardRepository->updateOne($this->reward);
        return new RewardResponse($this->reward);
    }
    public function toArray(): array {
        return $this->reward->toArray();
    }
}