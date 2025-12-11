<?php
class CategoriesManager extends AbstractManager {
    public function findAll(): array {
        $query = $this->db->prepare("SELECT * FROM categories");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $categories = [];
        foreach ($results as $result) {
            $category = new Categories($result["id"], $result["category_name"]);
            $categories = $category;
        }
        return $categories;

    }

    public function findOne(int $id): ? Categories {
        $query = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $parameters = ["id" => $id];
        $query->execute($parameters);
        $results = $query->fetch(PDO::FETCH_ASSOC);
        if($results) {
            $category = new Categories($results["id"], $results["category_name"]);
            return $category;
        }
        return null;
    }
}
