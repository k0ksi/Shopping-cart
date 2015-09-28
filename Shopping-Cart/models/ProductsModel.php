<?php

class ProductsModel extends BaseModel
{
    public function getAll() {
        $stmt = self::$db->query(
            "SELECT id, name FROM products"
        );
        $result = $stmt->fetch_all();

        return $result;
    }

    public function getFilteredProducts($from, $size) {
        $stmt = self::$db->prepare(
            "SELECT id, name FROM products LIMIT ?, ?"
        );
        $stmt->bind_param('ii', $from, $size);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all();

        return $result;
    }
}