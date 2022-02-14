<?php

namespace B2b\Json\Infrastructure\Persistence\Doctrine\Repository\Reward;

use B2b\Json\Domain\Model\Reward\Reward as RewardDomain;
use B2b\Json\Domain\Model\Reward\RewardCollection;
use B2b\Json\Domain\Model\Reward\RewardId;
use B2b\Json\Domain\Model\Reward\RewardNotExist;
use B2b\Json\Domain\Model\Reward\RewardRepository;
use B2b\Json\Infrastructure\Persistence\Doctrine\Entity\Reward as RewardEntity;
use B2b\Json\Infrastructure\Persistence\Doctrine\Repository\DoctrineRepository;

class DoctrineRewardRepository extends DoctrineRepository implements RewardRepository
{
    protected function entityClassName(): string
    {
        return RewardEntity::class;
    }
    public function findById(RewardId $id): RewardDomain
    {
        $reward = $this->repository->findById($id->value());
        if(empty($reward)) {
            throw new RewardNotExist($id);
        }
        return $reward[0]->toDomain();
    }
    public function removeOne(RewardDomain $reward): bool
    {
        $infrastructureReward = RewardEntity::toInfrastructure($reward);
        $toRemoveReward = $this->entityManager->merge($infrastructureReward); 
        $this->entityManager->remove($toRemoveReward);
        $this->entityManager->flush();
        return $this->entityManager->contains($toRemoveReward);
    }
    public function findAll(): RewardCollection
    {
        /*
        return new RewardCollection();
        */
        $rewards = $this->repository->findAll();

        $rewardCollection = RewardCollection::init();

        if (!empty($rewards)) {
            foreach ($rewards as $reward) {
                $rewardCollection->add($reward->toDomain());
            }
        }
        return $rewardCollection;
    }
    public function insertCollection(RewardCollection $rewardCollection): bool
    {
        return false;
    }
    public function insertOne(RewardDomain $reward): bool
    {
        $infrastructureReward = RewardEntity::toInfrastructure($reward);
        $this->entityManager->persist($infrastructureReward);
        $this->entityManager->flush();
        return $this->entityManager->contains($infrastructureReward);
    }
    public function updateOne(RewardDomain $reward): bool 
    {
        $id = $reward->id();
        $rewardToUpdate = $this->repository->findById($id->value());
        if(empty($rewardToUpdate)) {
            throw new RewardNotExist($id);
        }
        $infrastructureReward = RewardEntity::toInfrastructure($reward);
        $this->entityManager->merge($infrastructureReward);
        $this->entityManager->flush();
        return $this->entityManager->contains($infrastructureReward);
    }
}