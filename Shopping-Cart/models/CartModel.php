<?php

class CartModel extends BaseModel
{
    public function getProductsFromDb() {
        $substr = '';
        for($i = 0; $i < count($_SESSION['cart_elements']); $i++) {
            $substr .= $_SESSION['cart_elements'][$i] . ', ';
        }
        $range = substr($substr, 0, strlen($substr) - 2);
        $stmt = self::$db->query(
            "SELECT id, name, price, quantity FROM products
              WHERE id IN ($range)"
        );
        $result = $stmt->fetch_all();

        return $result;
    }

    public function clearCart(){
        unset($_SESSION['cart_elements']);
        $_SESSION['cart_elements'] = array();
    }

    public function checkForZeroQuantity() {
        $substr = '';
        for($i = 0; $i < count($_SESSION['cart_elements']); $i++) {
            $substr .= $_SESSION['cart_elements'][$i] . ', ';
        }
        $range = substr($substr, 0, strlen($substr) - 2);
        $stmt = self::$db->query(
            "SELECT id, name, price, quantity FROM products
              WHERE id IN ($range)"
        );
        $result = $stmt->fetch_all();
        foreach ($result as $product) {
            if((int)$product[3] === 0) {
                return false;
            }
        }

        return true;
    }

    public function checkIfUserHasCash() {
        $userId = $_SESSION['user_id'];
        $stmt = self::$db->query(
            "SELECT cash FROM users
            WHERE id = $userId"
        );
        $result = $stmt->fetch_all();
        if((int)$result[0][0] < (int)$_SESSION['price_to_pay']) {
            return false;
        }
        return true;
    }

    public function updateQuantities() {
        $substring = '';
        for($i = 0; $i < count($_SESSION['cart_elements']); $i++) {
            $substring .= $_SESSION['cart_elements'][$i] . ', ';
        }
        $range = substr($substring, 0, strlen($substring) - 2);
        $query = "UPDATE products
            SET quantity = (quantity - 1)
              WHERE id IN (?)";
        $stmtUpdate = self::$db->prepare($query);
        $stmtUpdate->bind_param('s', $range);
        $stmtUpdate->execute();

        return $stmtUpdate->affected_rows > 0;
    }

    public function updateUserCash() {
        $price = $_SESSION['price_to_pay'];
        $userId = $_SESSION['user_id'];
        $query = "UPDATE users
            SET cash = (cash - ?)
            WHERE id = ?";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param('di', $price, $userId);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }
}