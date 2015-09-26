<?php

class AuthorsController extends BaseController
{
    private static $db;

    public function onInit() {
        $this->title = "Authors";
        $this->db = new AuthorsModel();
    }

    public function create() {
        if($this->isPost){
            $name = $_POST['name'];
            $password = password_hash($_POST['password'], 1);
            // $this->authors = $this->db->createAuthor($name, $password);
            if($_POST['password'] != '' && $this->db->createAuthor($name, $password)) {
                $this->authors = $this->db->createAuthor($name, $password);
                $this->addInfoMessage("Author created.");
                $this->redirect('authors');
            } else {
                $this->addErrorMessage("Error while trying to create author.");
            }
        }
    }

    public function delete($id) {
        if($this->db->deleteAuthor($id)) {
            $this->addInfoMessage("Author deleted.");
        } else {
            $this->addErrorMessage("Cannot delete author.");
        }
        $this->redirect('authors');
    }

    public function index() {
        $this->authors = $this->db->getAll();
    }
}