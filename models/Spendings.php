<?php
class Spendings {
    public function __construct(int $id, private int $paidBy, private float $ammount, private int $category) {}

    public function getPaidBy(): int
    {
        return $this->paidBy;
    }

    public function setPaidBy(int $paidBy): void
    {
        $this->paidBy = $paidBy;
    }

    public function getAmmount(): float
    {
        return $this->ammount;
    }

    public function setAmmount(float $ammount): void
    {
        $this->ammount = $ammount;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function setCategory(int $category): void
    {
        $this->category = $category;
    }
}
