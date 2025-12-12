<?php
class SpendingManager extends AbstractManager {
    public function findAll(): array {
        $query = $this->db->prepare("SELECT * FROM spending");
        $query->execute();
        $results = $query->fetchAll(pdo::FETCH_ASSOC);
        $spendings = [];
        foreach ($results as $result) {
            $spending = new Spendings($result["id"], $result["paid_by"], $result["ammount"], $result["category"]);
            $spendings[] = $spending;
        }
        return $spendings;

    }
    public function findOne(int $id) : ?Spendings {
        $query = $this->db->prepare("SELECT * FROM spending WHERE id = :id");
        $parameters = ["id" => $id];
        $query->execute($parameters);
        $results = $query->fetch(pdo::FETCH_ASSOC);
        if ($results) {
            $spendings = new Spendings($results["id"], $results["paid_by"], $results["ammount"], $results["category"]);
            return $spendings;
        }
        return null;
    }

    public function insertSpending(string $paidBy, string $ammount, string $category) {
        $query = $this->db->prepare("INSERT INTO `spendings`(`paid_by`, `ammount`, `category`)VALUES(:paidBy, :amount, :category)");
        $parameters = ["paidBy" => $paidBy, "amount" => $ammount, "category" => $category];
        $query->execute($parameters);
    }

    public function findSpendingForUser(int $id) : Spendings {
        $query = $this->db->prepare("SELECT * FROM spending WHERE spending_id = :id");
        $parameters = ["id" => $id];
        $query->execute($parameters);
        $results = $query->fetch(pdo::FETCH_ASSOC);
        $Spendings = [];
        foreach ($results as $result) {
            $Spendings[] = $results;
        }
        return $Spendings;
    }
}
