<?php

class AccountController extends BaseController {

    private $db;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function register() {
        if($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($username == null || strlen($username) < 5){
                $this->addErrorMessage(INVALID_USERNAME);
                $this->redirect("account", "register");
            }

            if($password == null || strlen($password) < 5){
                $this->addErrorMessage(INVALID_PASSWORD);
                $this->redirect("account", "register");
            }
            $isRegistered = $this->db->register($username, $password);
            if($isRegistered) {
                $_SESSION['isAdmin'] = $this->isAdmin();
                $_SESSION['username'] = $username;
                $this->addInfoMessage(REGISTRATION_SUCCESS);
                $this->redirect("products", 'index');
            } else {
                $this->addErrorMessage(REGISTRATION_FAILURE);
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function login(){
        if($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLoggedIn = $this->db->login($username, $password);

            if($isLoggedIn) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage(LOGIN_SUCCESS);
                return $this->redirect("products", "index");
            } else {
                $this->addErrorMessage(LOGIN_ERROR);
                return $this->renderView(__FUNCTION__);
            }
        }
        $this->renderView(__FUNCTION__);
    }

    /*public function isAdmin() {
        $username = $_POST['username'];
        $isAdmin = $this->db->isAdmin($username);
        if($isAdmin) {
            return true;
        }

        return false;
    }*/

    public function logout() {
        $this->authorize();

        unset($_SESSION['username']);
        $this->addInfoMessage(BYE_MESSAGE);
        $this->redirectToUrl('/');
    }
}