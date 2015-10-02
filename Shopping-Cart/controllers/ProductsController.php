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
        $this->maxPageSize = $productsCount / $pageSize - 1;

        $this->products = $this->db->getFilteredProducts($from, $pageSize);
        $this->renderView();
    }

    public function showProducts() {
        $this->products = $this->db->getAll();
        $this->renderView(__FUNCTION__, false);
    }
    /*public function create()
    {
        $this->authorize();

        $productName = $_POST['product_name'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        if ($this->db->createProduct($productName, $description, $price, $quantity, $_SESSION['user_id'], $category)) {
            $this->addInfoMessage("Product created.");
            $this->redirect("products");
        } else {
            $this->addErrorMessage("Cannot create product.");
        }

    }*/

    public function create() {
        $this->authorize();

        $name = $_POST['product_name'];
        $description = $_POST['description'];
        $price = doubleval($_POST['price']);
        $quantity = intval($_POST['quantity']);
        $category = $_POST['category'];
        $categoryId = intval($this->db->getCategoryId($category)['id']);


        if(strlen($name) < 5) {
            $this->addFieldValue('product_name', $name);
            $this->addValidationError('product_name', PRODUCT_VALIDATION_ERROR);
            return $this->renderView(__FUNCTION__);
        }
        if(strlen($description) < 5) {
            $this->addFieldValue('description', $name);
            $this->addValidationError('description', 'The price description is too short.');
            return $this->renderView(__FUNCTION__);
        }
        if($price == null || $quantity == null) {
            $this->addFieldValue('price', $name);
            $this->addValidationError('price', 'The price or quantity value is missing');
        }

        $isCreated = $this->db->createProduct($name, $description, $price, $quantity, $category);

        var_dump($this->db->getCategoryId('Movies')['id']);
        var_dump($isCreated);
        if ($isCreated) {
            $this->addInfoMessage(PRODUCT_CREATED);
            $this->redirect('products');
        } else {
            $this->addErrorMessage(PRODUCT_CREATION_ERROR);
        }

        $this->renderView(__FUNCTION__);
    }
}
