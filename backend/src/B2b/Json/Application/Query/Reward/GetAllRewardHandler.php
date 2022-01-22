<?php

namespace B2b\Json\Application\Query\Reward;

use B2b\Json\Domain\Model\Reward\RewardRepository;
use B2b\Json\Application\Response\Reward\RewardCollectionResponse;

class GetAllRewardHandler
{
    private RewardRepository $rewardRepository;

    public function __construct(RewardRepository $rewardRepository)
    {
        $this->rewardRepository = $rewardRepository;
    }

    public function __invoke(): RewardCollectionResponse
    {
        $rewards = $this->rewardRepository->findAll();
        return new RewardCollectionResponse($rewards);
    }
}