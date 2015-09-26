<?php

class UsersController extends BaseController
{
    private static $db;

    public function onInit() {
        $this->title = "Users";
        $this->db = new UsersModel();
    }

    public function create() {
        if($this->isPost){
            $name = $_POST['username'];
            $password = password_hash($_POST['password'], 1);
            // $this->users = $this->db->createUser($name, $password);
            if($_POST['password'] != '' && $this->db->createUser($name, $password)) {
                $this->users = $this->db->createUser($name, $password);
                $this->addInfoMessage("User created.");
                $this->redirect('users');
            } else {
                $this->addErrorMessage("Error while trying to create author.");
            }
        }
    }

    public function delete($id) {
        if($this->db->deleteUser($id)) {
            $this->addInfoMessage("User deleted.");
        } else {
            $this->addErrorMessage("Cannot delete user.");
        }
        $this->redirect('users');
    }

    public function index() {
        $this->users = $this->db->getAll();
    }
}