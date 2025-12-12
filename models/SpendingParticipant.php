<?php
class SpendingParticipants{
    public function __construct(private int $id, private int $spendingId, private int $userPaying, private float $ammount) {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSpendingId(): int
    {
        return $this->spendingId;
    }

    public function setSpendingId(int $spendingId): void
    {
        $this->spendingId = $spendingId;
    }

    public function getUserPaying(): int
    {
        return $this->userPaying;
    }

    public function setUserPaying(int $userPaying): void
    {
        $this->userPaying = $userPaying;
    }

    public function getAmmount(): float
    {
        return $this->ammount;
    }

    public function setAmmount(float $ammount): void
    {
        $this->ammount = $ammount;
    }
}
