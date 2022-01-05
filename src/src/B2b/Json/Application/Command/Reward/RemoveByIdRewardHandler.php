<?php

namespace B2b\Json\Application\Command\Reward;

use B2b\Json\Application\Request\Reward\RemoveByIdRewardRequest;
use B2b\Json\Application\Response\AbstractResponse;
use B2b\Json\Application\Response\Reward\RewardResponse;
use B2b\Json\Domain\Model\Reward\RewardId;
use B2b\Json\Domain\Model\Reward\RewardRepository;

class RemoveByIdRewardHandler
{
    private RewardRepository $rewardRepository;

    public function __construct(RewardRepository $rewardRepository)
    {
        $this->rewardRepository = $rewardRepository;
    }
    public function __invoke(RemoveByIdRewardRequest $removeByIdRewardRequest): AbstractResponse
    {
        $reward = $this->rewardRepository->findById(
            new RewardId($removeByIdRewardRequest->id())
        );
        $this->rewardRepository->remove($reward);
        return new RewardResponse($reward);

    }
}