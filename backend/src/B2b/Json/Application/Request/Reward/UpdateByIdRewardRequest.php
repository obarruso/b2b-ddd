<?php

namespace B2b\Json\Application\Request\Reward;

use DateTime;

class UpdateByIdRewardRequest {

    private string $id;
    private \DateTime $saleDate;
    private string $client;
    private string $product; 
    private float $paid;
    private float $toPay;
    private string $incident;


    public function __construct(string $id, string $saleDate, string $client, string $product, float $paid, float $toPay, string $incident)
    {
        $this->id = $id;
        $this->saleDate = new DateTime($saleDate);
        $this->client = $client;
        $this->product = $product;
        $this->paid = $paid;
        $this->toPay = $toPay;
        $this->incident = $incident;
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
        return [
            'id' => $this->id(),
            'saleDate' => $this->saleDate(),
            'client' => $this->client(),
            'product' => $this->product(),
            'paid' => $this->paid(),
            'toPay' => $this->toPay(),
            'incident' => $this->incident(),
        ];
    }
}