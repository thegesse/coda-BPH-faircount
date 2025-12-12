<?php
class UserManager extends AbstractManager {
    public function findAll(): array {
        $query = $this->db->prepare("SELECT * FROM `users`");
        $query->execute();
        $results = $query->fetchAll(pdo::FETCH_ASSOC);
        $users = [];
        foreach ($results as $result) {
            $user = new User($result["id"], $result["name"], $result["email"], $result["password"]);
            $users[] = $user;
        }
        return $users;
    }
    public function findOne(int $id): ?User {
        $query = $this->db->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $parameters = ["id" => $id];
        $query->execute($parameters);
        $results = $query->fetch(pdo::FETCH_ASSOC);

        if($results) {
            $user = new User($results["id"], $results["user_name"], $results["email"], $results["password"]);
            return $user;
        }
        return null;
    }

    public function findOneByEmail(string $email): ?User {
        $query = $this->db->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $parameters = ["email" => $email];
        $query->execute($parameters);
        $results = $query->fetch(pdo::FETCH_ASSOC);

        if($results) {
            $user = new User($results["id"], $results["user_name"], $results["email"], $results["password"]);
            return $user;
        }
        return null;
    }

    public function createUser(string $name, string $email, string $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->db->prepare("INSERT INTO `users` (`user_name`, `email`, `password`) VALUES (:name, :email, :password)");
        $parameters = ["name" => $name, "email" => $email, "password" => $hashedPassword];
        $query->execute($parameters);
    }
}
