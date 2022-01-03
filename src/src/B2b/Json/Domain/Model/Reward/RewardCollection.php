<?php

namespace B2b\Json\Domain\Model\Reward;

use B2b\Json\Domain\Collection\ObjectCollection;

class RewardCollection extends ObjectCollection
{
    protected function className(): string
    {
        return Reward::class;
    }
}