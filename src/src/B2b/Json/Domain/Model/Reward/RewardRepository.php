<?php

namespace B2b\Json\Domain\Model\Reward;

interface RewardRepository
{
    public function findAll(): RewardCollection;
    public function insertCollection(RewardCollection $rewardCollection): bool;
    public function insertOne(Reward $reward): bool;
}