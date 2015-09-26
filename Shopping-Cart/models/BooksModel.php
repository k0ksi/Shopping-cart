<?php

class BooksModel extends BaseModel
{
    public function getAll() {
        $stmt = self::$db->query(
            "SELECT id, name FROM books"
        );
        $result = $stmt->fetch_all();

        return $result;
    }

    public function getFilteredBooks($from, $size) {
        $stmt = self::$db->prepare(
            "SELECT id, name FROM books LIMIT ?, ?"
        );
        $stmt->bind_param('ii', $from, $size);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all();

        return $result;
    }
}