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
            "SELECT id, name, price, quantity FROM products WHERE quantity > 0 LIMIT ?, ?"
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
        if (!isset($_POST['xsrf-token']) ||($_POST['xsrf-token'] != $_SESSION['xsrf-token'])) {
            return false;
        }

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

    public function editProductCategory($categoryName, $productId) {
        $stmt = self::$db->prepare(
            "SELECT id FROM products
              WHERE id = ?"
        );
        $stmt->bind_param('i', $productId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if($result['id'] != $productId) {
            return false;
        }

        if (!isset($_POST['xsrf-token']) ||($_POST['xsrf-token'] != $_SESSION['xsrf-token'])) {
            return false;
        }

        if($categoryName == '') {
            return false;
        }

        $categoryId = (int)$this->getCategoryId($categoryName)['id'];
        if($categoryId == null) {
            return false;
        }

        $statement = self::$db->prepare(
          "UPDATE products SET category_id = ? WHERE id = ?"
        );
        $statement->bind_param("ii", $categoryId, $productId);
        $statement->execute();

        return $statement->affected_rows > 0;
    }

    public function editProductQuantity($quantity, $productId) {
        $stmt = self::$db->prepare(
            "SELECT id FROM products
              WHERE id = ?"
        );
        $stmt->bind_param('i', $productId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if($result['id'] != $productId) {
            return false;
        }

        if (!isset($_POST['xsrf-token']) ||($_POST['xsrf-token'] != $_SESSION['xsrf-token'])) {
            return false;
        }

        if($quantity == '') {
            return false;
        }

        if($quantity == null) {
            return false;
        }

        $statement = self::$db->prepare(
            "UPDATE products SET quantity = ? WHERE id = ?"
        );
        $statement->bind_param("ii", $quantity, $productId);
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
}