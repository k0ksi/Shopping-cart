<?php

class BooksController extends BaseController {
    private $db;

    public function onInit() {
        $this->db = new BooksModel();
        $this->title = "Books";
    }

    public function index($page = DEFAULT_PAGE_NUMBER, $pageSize = DEFAULT_PAGE_SIZE) {
        $this->authorize();

        $booksCount = count($this->db->getAll());
        $from = $page * ($pageSize);
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->maxPageSize = $booksCount / $pageSize - 1;

        $this->books = $this->db->getFilteredBooks($from, $pageSize);
        $this->renderView();
    }

    public function showBooks() {
        $this->books = $this->db->getAll();
        $this->renderView(__FUNCTION__, false);
    }
}
