<?php

class AuthorsModel extends BaseModel
{
    public function getAll() {
        $stmt = self::$db->query("
        SELECT * FROM authors ORDER BY id");

        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function createUser($name, $password) {
        if($name == '') {
            return false;
        }

        $stmt = self::$db->prepare(
            "INSERT INTO authors VALUES(NULL, ?, ?)");
        $stmt->bind_param("ss", $name, $password);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }

    public function deleteUser($id) {
        $stmt = self::$db->prepare(
            "DELETE FROM authors WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }
}