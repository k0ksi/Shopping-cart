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
                $this->addErrorMessage("Username is invalid!
                Your name must be at least 5 characters long.");
                $this->redirect("account", "register");
            }

            if($password == null || strlen($password) < 5){
                $this->addErrorMessage("Password is invalid!
                Your password must be at least 5 characters long.");
                $this->redirect("account", "register");
            }
            $isRegistered = $this->db->register($username, $password);
            if($isRegistered) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Successful registration!");
                $this->redirect("books", 'index');
            } else {
                $this->addErrorMessage("Registration failed!");
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
                $this->addInfoMessage("Logged in successfully!");
                return $this->redirect("books", "index");
            } else {
                $this->addErrorMessage("Login error!");
                return $this->renderView(__FUNCTION__);
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function logout() {
        $this->authorize();

        unset($_SESSION['username']);
        $this->addInfoMessage('Bye! See you soon!');
        $this->redirectToUrl('/');
    }
}