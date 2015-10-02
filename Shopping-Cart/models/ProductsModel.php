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

        if (isset($_POST['$name'])) {
            $_SESSION['new_product_name'] = $_POST['$name'];
        }

        $userId = $_SESSION['user_id'];
        $categoryId = $this->getCategoryId($categoryName)['id'];
        if(!is_int($categoryId)) {
            return false;
        } else {
            $_SESSION['new_product_category'] = $categoryId;
        }

        $statement = self::$db->prepare(
            "INSERT INTO products
              VALUES(NULL, ?, ?, ?, ?, ?, ?)"
        );
        $statement->bind_param('ssdiii', $name, $description, $price, $quantity, $userId, $categoryId);
        $statement->execute();

        return $statement->affected_rows > 0;
    }

    public function deleteProduct($id) {
        $statement = self::$db->prepare(
            "DELETE FROM products WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
    /*public function bindProductWithCategory($productName, $categoryId) {
        $stmt = self::$db->query(
            "SELECT id FROM products
              WHERE name = $productName AND category_id = $categoryId"
        );

        $id = intval($stmt->fetch_all()[0][0]);

        $lastStmt = self::$db->prepare(
            "INSERT INTO products_categories
              VALUES(?, ?)"
        );
        $lastStmt->bind_param('ii', $id, $categoryId);
        $lastStmt->execute();
        return $stmt->affected_rows > 0;
    }*/
}