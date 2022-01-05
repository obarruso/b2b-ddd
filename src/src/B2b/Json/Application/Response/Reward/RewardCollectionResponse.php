<?php

namespace B2b\Json\Application\Response\Reward;

use B2b\Json\Domain\Model\Reward\RewardCollection;
use B2b\Json\Application\Response\AbstractResponse;

class RewardCollectionResponse extends AbstractResponse
{
    private array $rewards;

    public function __construct(RewardCollection $rewardCollection)
    {
        $this->rewards = [];
        foreach($rewardCollection->getCollection() as $reward) {
            $this->rewards[] = new RewardResponse($reward);
        }

        
    }

    public function rewards(): array
    {
        return $this->rewards;
    }

    public function toArray(): array
    {
        return \array_map(function($reward){
            return $reward->toArray();
        }, $this->rewards);
    }
}