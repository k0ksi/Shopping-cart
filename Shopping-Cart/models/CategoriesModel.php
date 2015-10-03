<?php

class CategoriesModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query(
            "SELECT * FROM categories ORDER BY id");
                return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function createCategory($name) {
        if (!isset($_POST['xsrf-token']) ||($_POST['xsrf-token'] != $_SESSION['xsrf-token'])) {
            return false;
        }

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
                p.price,
                p.quantity,
                p.id
                FROM categories c
                INNER JOIN products p
                ON p.category_id = c.id
                WHERE c.id = ? AND p.quantity > 0"
        );
        $statement->bind_param('i', $id);
        $statement->execute();
        return $statement->get_result()->fetch_all();
    }
}
