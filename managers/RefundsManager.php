<?php
class RefundsManager extends AbstractManager {
    public function findAll(): array {
        $query = $this->db->prepare("SELECT * FROM `refunds`");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $refunds = [];
        foreach ($results as $result) {
            $refund = new Refunds($result["id"], $result["paid_by"], $result["amount"], $result["category"]);
            $refunds[] = $refund;
        }
        return $refunds;
    }
    public function findOne(int $id): ?Refunds {
        $query = $this->db->prepare("SELECT * FROM `refunds` WHERE `id` = :id");
        $parameters = ["id" => $id];
        $results = $query->execute($parameters);

        if($results) {
            $refunds = new refunds($results["id"], $results["paid_by"], $results["amount"], $results["category"]);
            return $refunds;
        }
        return null;
    }
}
