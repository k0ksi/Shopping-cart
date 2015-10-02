<?php

class CategoriesModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query(
            "SELECT * FROM categories ORDER BY id");
                return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function createCategory($name) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO categories VALUES(NULL, ?)");
        $statement->bind_param("s", $name);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function deleteCategory($id) {
        $statement = self::$db->prepare(
            "DELETE FROM categories WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function showCategoryProducts($id) {
        $statement = self::$db->prepare(
                "SELECT
                p.name,
                p.description,
                p.price
                FROM categories c
                INNER JOIN products_categories pc
                ON pc.category_id = c.id
                INNER JOIN products p
                ON p.id = pc.product_id
                WHERE c.id = ? AND p.quantity > 0"
        );
        $statement->bind_param('i', $id);
        $statement->execute();
        return $statement->get_result()->fetch_all();
    }
}
