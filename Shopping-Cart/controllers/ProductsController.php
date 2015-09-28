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
}
