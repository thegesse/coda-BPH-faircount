<?php
class SpendingParticipantManager extends AbstractManager {
    public function findAll(): array {
        $query = $this->db->prepare("SELECT * FROM spending_participant");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $spendingParticipants = [];
        foreach ($results as $result) {
            $spendingParticipant = new SpendingParticipants($result["id"], $result["spending_id"], $result["user_paying"], $result["ammount"]);
            $spendingParticipants[] = $spendingParticipant;

        }
        return $spendingParticipants;
    }

    public function findOne(int $id): ?SpendingParticipants {
        $query = $this->db->prepare("SELECT * FROM spending_participant WHERE 'id' = ':id'");
        $parameters = ["id" => $id];
        $query->execute($parameters);
        $results = $query->fetch(PDO::FETCH_ASSOC);

        if ($results) {
            $spendingParticipants = new SpendingParticipants($results["id"], $results["spending_id"], $results["user_paying"], $results["ammount"]);
            return $spendingParticipants;
        }
        return null;
    }
}
