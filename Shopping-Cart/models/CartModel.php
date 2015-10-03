<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 3.10.2015 ã.
 * Time: 10:30
 */
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

    public function checkoutProducts() {
        $substr = '';
        for($i = 0; $i < count($_SESSION['cart_elements']); $i++) {
            $substr .= $_SESSION['cart_elements'][$i] . ', ';
        }
        $range = substr($substr, 0, strlen($substr) - 2);
        $stmt = self::$db->prepare(
            "UPDATE products
            SET quantity = (quantity - 1)
              WHERE id IN (?)"
        );
        $stmt->bind_param('s', $range);
        $stmt->execute();
    }
}