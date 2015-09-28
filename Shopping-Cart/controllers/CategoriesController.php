<?php

class CategoriesController extends BaseController {
    private $db;

    public function onInit() {
        $this->title = "Categories";
        $this->db = new CategoriesModel();
    }

    public function index() {
        $this->authorize();

        $this->categories = $this->db->getAll();

        $this->renderView();
    }

    public function create() {
        $this->authorize();

        if ($this->isPost) {
            $name = $_POST['category_name'];
            if(strlen($name) < 5) {
                $this->addFieldValue('category_name', $name);
                $this->addValidationError('category_name', CATEGORY_VALIDATION_ERROR);
                return $this->renderView(__FUNCTION__);
            }

            if ($this->db->createCategory($name)) {
                $this->addInfoMessage(CATEGORY_CREATED);
                $this->redirect('categories');
            } else {
                $this->addErrorMessage(CATEGORY_CREATION_ERROR);
            }
        }

        $this->renderView(__FUNCTION__);
    }

    public function delete($id) {
        $this->authorize();

        if ($this->db->deleteCategory($id)) {
            $this->addInfoMessage(CATEGORY_DELETED);
        } else {
            $this->addErrorMessage(CATEGORY_NOT_DELETED);
        }
        $this->redirect('categories');
    }
}