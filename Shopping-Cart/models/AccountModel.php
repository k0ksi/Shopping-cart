<?php

class AccountModel extends BaseModel {

    /*public function isAdmin($username) {
        $statement = self::$db->prepare(
            "SELECT is_admin FROM users WHERE username = ?"
        );
        $statement->bind_param('s', $_SESSION['username']);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();

        if($result[0][0]) {
            return true;
        }

        return false;
    }*/

    public function register($username, $password) {
        $statement = self::$db->prepare(
            "SELECT COUNT(id) FROM users WHERE username = ?"
        );
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        if($result['COUNT(id)']) {
            return false;
        }

        $hash_pass = md5($password);
        $registerStatement = self::$db->prepare(
            "INSERT INTO users (username, password) VALUES (?, ?)"
        );
        $registerStatement->bind_param("ss", $username, $hash_pass);
        $registerStatement->execute();
        return true;
    }

    public function login($username, $password) {
        $statement = self::$db->prepare(
            "SELECT id, username, password FROM users WHERE username = ?"
        );
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        if(md5($password) === $result['password']) {
            return true;
        }

        return false;
    }
}