<?php

class ProductsModel extends BaseModel
{
    public function getAll() {
        $stmt = self::$db->query(
            "SELECT id, name FROM products
              WHERE quantity > 0"
        );
        $result = $stmt->fetch_all();

        return $result;
    }

    public function getFilteredProducts($from, $size) {
        $stmt = self::$db->prepare(
            "SELECT id, name, price FROM products WHERE quantity > 0 LIMIT ?, ?"
        );
        $stmt->bind_param('ii', $from, $size);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all();

        return $result;
    }

    public function getCategoryId($categoryName) {
        $statement = self::$db->prepare(
            "SELECT
            id
            FROM
            categories
            WHERE name = ?");

        $statement->bind_param('s', $categoryName);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function createProduct($name, $description, $price, $quantity, $categoryName) {
        if($name == '' || $description == '' || $price == '' || $quantity == '' || $categoryName == '') {
            return false;
        }

        $userId = $_SESSION['user_id'];
        $categoryId = $this->getCategoryId($categoryName)['id'];
        $statement = self::$db->prepare(
            "INSERT INTO products
              VALUES(NULL, ?, ?, ?, ?, ?, ?)"
        );
        $statement->bind_param('ssdiii', $name, $description, $price, $quantity, $userId, $categoryId);
        $statement->execute();

        return $statement->affected_rows > 0;
    }
}