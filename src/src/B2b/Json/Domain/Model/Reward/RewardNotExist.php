<?php

namespace B2b\Json\Domain\Model\Reward;

use B2b\Json\Domain\Exception\DomainError;

class RewardNotExist extends DomainError
{
    public function __construct(private RewardId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'reward_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The reward <%s> does not exist', $this->id->value());
    }
}