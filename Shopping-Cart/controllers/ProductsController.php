<?php

class ProductsController extends BaseController {
    private $db;

    public function onInit() {
        $this->db = new ProductsModel();
        $this->title = "Products";
    }

    public function index($page = DEFAULT_PAGE_NUMBER, $pageSize = DEFAULT_PAGE_SIZE) {
        $this->authorize();

        $productsCount = count($this->db->getAll());
        $from = $page * ($pageSize);
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->maxPageSize = (int)($productsCount / $pageSize);

        $this->products = $this->db->getFilteredProducts($from, $pageSize);
        $this->renderView();
    }

    public function showProducts() {
        $this->products = $this->db->getAll();
        $this->renderView(__FUNCTION__, false);
    }

    public function create() {
        $this->authorize();
        $this->isEditor();

        if($this->isPost){
            $name = $_POST['product_name'];
            $description = $_POST['description'];
            $price = doubleval($_POST['price']);
            $quantity = intval($_POST['quantity']);
            $category = $_POST['category'];
            $categoryId = intval($this->db->getCategoryId($category)['id']);

            if(strlen($name) < 2) {
                $this->addFieldValue('product_name', $name);
                $this->addValidationError('product_name', PRODUCT_VALIDATION_ERROR);
                return $this->renderView(__FUNCTION__);
            }
            if(strlen($description) < 5) {
                $this->addFieldValue('description', $name);
                $this->addValidationError('description', 'The price description is too short.');
                return $this->renderView(__FUNCTION__);
            }
            if(!is_double($price) || !is_int($quantity)) {
                $this->addFieldValue('price', $name);
                $this->addValidationError('price', 'The price or quantity value should be numeric');
            }

            if(strlen($description) < 3) {
                $this->addFieldValue('description', $name);
                $this->addValidationError('description', 'The product description is too short.');
                return $this->renderView(__FUNCTION__);
            }

            $isCreated = $this->db->createProduct($name, $description, $price, $quantity, $category);
            
            if ($isCreated) {
                $this->addInfoMessage(PRODUCT_CREATED);
                $this->redirect('products');
            } else {
                $this->addErrorMessage(PRODUCT_CREATION_ERROR);
            }
        }

        $this->renderView(__FUNCTION__);
    }

    public function delete($id) {
        $this->authorize();
        $this->isEditor();

        if ($this->db->deleteProduct($id)) {
            $this->addInfoMessage(PRODUCT_DELETED);
        } else {
            $this->addErrorMessage(PRODUCT_NOT_DELETED);
        }
        $this->redirect('products');
    }

    public function editCategory() {
        $this->authorize();
        $this->isEditor();

        if($this->isPost){
            $productId = $_POST['product_id'];
            $category = $_POST['category'];
            $isEdited = $this->db->editProductCategory($category, $productId);

            if ($isEdited) {
                $this->addInfoMessage("Product category has been edited");
                $this->redirect('products');
            } else {
                $this->addErrorMessage("An error occurred while editing the product category");
            }
        }

        $this->renderView(__FUNCTION__);
    }

    public function editQuantity() {
        $this->authorize();
        $this->isEditor();

        if($this->isPost){
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $isEdited = $this->db->editProductQuantity($quantity, $productId);

            if ($isEdited) {
                $this->addInfoMessage("Product quantity has been edited");
                $this->redirect('products');
            } else {
                $this->addErrorMessage("An error occurred while editing the product quantity");
            }
        }

        $this->renderView(__FUNCTION__);
    }
}
