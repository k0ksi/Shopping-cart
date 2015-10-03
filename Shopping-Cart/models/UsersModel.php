<?php

class UsersModel extends  BaseModel
{
    public function getAll() {
        $stmt = self::$db->query(
            "SELECT id, username FROM users"
        );
        $result = $stmt->fetch_all();

        return $result;
    }

    public function getFilteredUsers($from, $size) {
        $stmt = self::$db->prepare(
            "SELECT id, username, is_admin, is_editor FROM users LIMIT ?, ?"
        );
        $stmt->bind_param('ii', $from, $size);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all();

        return $result;
    }

    public function deleteUser($id) {
        $stmt = self::$db->prepare(
            "SELECT cash FROM users WHERE id = ?"
        );
        $stmt->bind_param('i', $id);
        $result = $stmt->get_result();
        if($result > 0) {
            return false;
        }
        $statement = self::$db->prepare(
            "DELETE FROM users WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function editUserRights($isAdmin, $isEditor, $userId) {
        if (!isset($_POST['xsrf-token']) ||($_POST['xsrf-token'] != $_SESSION['xsrf-token'])) {
            return false;
        }
        $statement = null;
        $stmt = null;

        $stmtUserAdminRole = self::$db->prepare(
            "SELECT is_admin FROM users WHERE id = ?"
        );
        $stmtUserAdminRole->bind_param("i", $userId);
        $isAdminDb = $stmtUserAdminRole->get_result();

        $stmtUserEditorRole = self::$db->prepare(
            "SELECT is_editor FROM users WHERE id = ?"
        );
        $stmtUserEditorRole->bind_param("i", $userId);
        $isEditorDb = $stmtUserEditorRole->get_result();

        if(!$isAdminDb) {
            if($isAdmin) {
                $admin = 1;
                $statement = self::$db->prepare(
                    "UPDATE users SET is_admin = ? WHERE id = ?"
                );
                $statement->bind_param("ii", $admin, $userId);
                $statement->execute();
            }
        } else {
            echo "This user already has the specified rights";
            return true;
        }

        if($isEditorDb) {
            if($isEditor) {
                $editor = 1;
                $stmt = self::$db->prepare(
                    "UPDATE users SET is_editor = ? WHERE id = ?"
                );
                $stmt->bind_param("ii", $editor, $userId);
                $stmt->execute();
            }
        } else {
            echo "This user already has the specified rights";
        }


        if($statement == null && $stmt == null) {
            return false;
        }

        if($statement != null) {
            return $statement->affected_rows > 0;
        }

        if($stmt != null) {
            return $stmt->affected_rows > 0;
        }
    }
}