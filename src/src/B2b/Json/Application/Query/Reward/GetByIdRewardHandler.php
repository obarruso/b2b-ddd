<?php

namespace B2b\Json\Application\Query\Reward;

use B2b\Json\Application\Request\Reward\GetByIdRewardRequest;
use B2b\Json\Domain\Model\Reward\RewardRepository;
use B2b\Json\Application\Response\Reward\RewardResponse;
use B2b\Json\Domain\Model\Reward\RewardId;

class GetByIdRewardHandler
{
    private RewardRepository $rewardRepository;

    public function __construct(RewardRepository $rewardRepository)
    {
        $this->rewardRepository = $rewardRepository;
    }

    public function __invoke(GetByIdRewardRequest $getByIdRewardRequest): RewardResponse
    {
        $reward = $this->rewardRepository->findById(
            new RewardId($getByIdRewardRequest->id())
        );
        return new RewardResponse($reward);
    }
}