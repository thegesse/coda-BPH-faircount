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
    public function findOne(int $id): ?Spendings {
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
}
