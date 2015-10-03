<?php

class AccountModel extends BaseModel {

    public function register($username, $password) {
        if (!isset($_POST['xsrf-token']) ||($_POST['xsrf-token'] != $_SESSION['xsrf-token'])) {
            return false;
        }

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
        if (!isset($_POST['xsrf-token']) ||($_POST['xsrf-token'] != $_SESSION['xsrf-token'])) {
            return false;
        }

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

    public function getUserId($username) {
        $statement = self::$db->prepare(
            "SELECT id FROM users WHERE username = ?"
        );
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        return $result;
    }

    public function userRole($username, $password) {
        $statement = self::$db->prepare("SELECT id, username, password, is_admin, is_editor FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        var_dump($result);
        if(md5($password) === $result['password']) {
            if($result['is_admin'] == true) {
                return 'admin';
            }
            elseif ($result['is_editor'] == true) {
                return 'editor';
            }
            else {
                return 'user';
            }
        }
        return false;
    }

    public function getAll() {
        $userId = $_SESSION['user_id'];
        $stmt = self::$db->prepare(
            "SELECT (id) FROM products WHERE quantity > 0 AND user_id = ?"
        );
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all();

        return $result;
    }

    public function getUsersProducts($from, $size) {
        $userId = $_SESSION['user_id'];
        $stmt = self::$db->prepare(
            "SELECT id, name, price, quantity FROM products WHERE quantity > 0 AND user_id = ? LIMIT ?, ?"
        );
        $stmt->bind_param('iii', $userId, $from, $size);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all();

        return $result;
    }
}