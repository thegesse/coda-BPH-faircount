<?php
class Refunds {
    public function __construct(private int $id, private int $paidBy, private float $amount, private int $category) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPaidBy(): int
    {
        return $this->paidBy;
    }

    public function setPaidBy(int $paidBy): void
    {
        $this->paidBy = $paidBy;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
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
