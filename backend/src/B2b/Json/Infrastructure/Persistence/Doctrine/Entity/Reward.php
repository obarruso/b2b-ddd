<?php

namespace B2b\Json\Infrastructure\Persistence\Doctrine\Entity;

use B2b\Json\Domain\Model\Reward\Reward as RewardDomain;
use B2b\Json\Domain\Model\Reward\RewardId;

class Reward
{
    private string $id;
    private \DateTimeInterface $saleDate;
    private string $client;
    private string $product;
    private float $paid;
    private float $toPay;
    private string $incident;
    private \DateTimeInterface $createdAt;
    private \DateTimeInterface $updatedAt;

    public function __construct(string $id, \DateTime $saleDate, string $client, string $product, float $paid, float $toPay, string $incident, \DateTimeInterface $createdAt, \DateTimeInterface $updatedAt)
    {
        $this->id = $id;
        $this->saleDate = $saleDate;
        $this->client = $client;
        $this->product = $product;
        $this->paid = $paid;
        $this->toPay = $toPay;
        $this->paid = $paid;
        $this->incident = $incident;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
    public function toDomain(): RewardDomain
    {
        return new RewardDomain(
            new RewardId($this->id),
            $this->saleDate,
            $this->client,
            $this->product,
            $this->paid,
            $this->toPay,
            $this->paid,
            $this->incident,
            $this->createdAt,
            $this->updatedAt
        );
    }
    public static function toInfrastructure(RewardDomain $reward): self
    {
        return new self(
            $reward->id()->value(),
            $reward->saleDate(),
            $reward->client(),
            $reward->product(),
            $reward->paid(),
            $reward->toPay(),
            $reward->incident(),
            $reward->createdAt(),
            $reward->updatedAt()
        );
    }
    public function id(): string
    {
        return $this->id;
    }

    public function saleDate(): \DateTimeInterface
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

    public function createdAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }
    public function updatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }
}
