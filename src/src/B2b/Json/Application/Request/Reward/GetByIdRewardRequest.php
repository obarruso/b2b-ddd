<?php

namespace B2b\Json\Application\Request\Reward;


class GetByIdRewardRequest
{
    private string $id;
    
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}