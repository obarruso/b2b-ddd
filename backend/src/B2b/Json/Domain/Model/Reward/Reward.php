<?php

namespace B2b\Json\Domain\Model\Reward;


class Reward
{
    private RewardId $id;
    private \DateTime $saleDate;
    private string $client; // future convert as object
    private string $product; // future convert as object
    private float $paid;
    private float $toPay;
    private string $incident; // future convert as object
    private \DateTimeImmutable $createdAt;
    private \DateTime $updatedAt;

    public function __construct(RewardId $id, \DateTime $saleDate, string $client, string $product, float $paid, float $toPay, string $incident)
    {
        $this->id = $id;
        $this->saleDate = $saleDate;
        $this->client = $client;
        $this->product = $product;
        $this->paid = $paid;
        $this->toPay = $toPay;
        $this->incident = $incident;
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTime();
    }

    public function id(): RewardId
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

    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }
    public function updatedAt(): \DateTime
    {
        return $this->updatedAt;
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
            'createdAt' => $this->createdAt(),
            'updatedAt' => $this->updatedAt(),
        ];
    }
}