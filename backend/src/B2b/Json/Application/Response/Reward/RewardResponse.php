<?php

namespace B2b\Json\Application\Response\Reward;

use B2b\Json\Domain\Model\Reward\Reward;
use B2b\Json\Application\Response\AbstractResponse;

class RewardResponse extends AbstractResponse
{
    private string $id;
    private \DateTime $saleDate;
    private string $client;
    private string $product; 
    private float $paid;
    private float $toPay;
    private string $incident;

    public function __construct(Reward $reward)
    {
        $this->id = $reward->id()->value();
        $this->saleDate = $reward->saleDate();
        $this->client = $reward->client();
        $this->product = $reward->product();
        $this->paid = $reward->paid();
        $this->toPay = $reward->toPay();
        $this->incident = $reward->incident();
    }

    public function id(): string
    {
        return $this->id;
    }

    public function saleDate(): \DateTime
    {
        return $this->saleDate;
    }

    public function client(): string
    {
        return $this->client;
    }

    public function product(): string
    {
        return $this->product;
    }

    public function paid(): float
    {
        return $this->paid;
    }

    public function toPay(): float
    {
        return $this->toPay;
    }

    public function incident(): string
    {
        return $this->incident;
    }
    public function toArray(): array
    {
        /*return [
            'id' => $this->id(),
            'saleDate' => $this->saleDate(),
            'client' => $this->client(),
            'product' => $this->product(),
            'paid' => $this->paid(),
            'toPay' => $this->toPay(),
            'incident' => $this->incident(),
        ];*/
        return [
            'id' => $this->id(),
            'client' => $this->client(),
            'product' => $this->product(),
            'paid' => $this->paid(),
            'toPay' => $this->toPay(),
            'incident' => $this->incident(),
        ];
    }

}