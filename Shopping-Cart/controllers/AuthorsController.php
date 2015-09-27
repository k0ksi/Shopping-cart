<?php

class AuthorsController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Authors";
        $this->db = new AuthorsModel();
    }

    public function index() {
        $this->authorize();

        $this->authors = $this->db->getAll();

        $this->renderView();
    }

    public function create() {
        $this->authorize();

        if ($this->isPost) {
            $name = $_POST['author_name'];
            if(strlen($name) < 5) {
                $this->addFieldValue('author_name', $name);
                $this->addValidationError('author_name', AUTHOR_VALIDATION_ERROR);
                return $this->renderView(__FUNCTION__);
            }

            if ($this->db->createAuthor($name)) {
                $this->addInfoMessage(AUTHOR_CREATED);
                $this->redirect('authors');
            } else {
                $this->addErrorMessage(AUTHOR_CREATION_ERROR);
            }
        }

        $this->renderView(__FUNCTION__);
    }

    public function delete($id) {
        $this->authorize();

        if ($this->db->deleteAuthor($id)) {
            $this->addInfoMessage(AUTHOR_DELETED);
        } else {
            $this->addErrorMessage(AUTHOR_NOT_DELETED);
        }
        $this->redirect('authors');
    }
}