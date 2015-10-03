<?php
error_reporting(0);

class CartController extends BaseController
{
    private $db;

    public function onInit() {
        $this->title = 'Your cart';
        $this->db = new CartModel();
    }

    public function add() {
        $this->authorize();

        $url = $_SERVER['REQUEST_URI'];
        $productId = (int)substr(strrchr($url, '/'), 1);

        if(!($_SESSION['cart_array'])) {
            $_SESSION['cart_array'] = [];
        }

        if(count($_SESSION['cart_array']) < 8){
            $_SESSION['cart_array'][$productId] = null;
        } else {
            echo '<li class=error">You cannot add more than 8 different products in your cart.</li>';
        }
        $_SESSION['cart_elements'] = array_keys($_SESSION['cart_array']);

        $this->products = $this->db->getProductsFromDb();

        $this->renderView('index');
    }

    public function checkout() {
        var_dump($_SESSION['price_to_pay']);
        var_dump($_SESSION['cart_elements']);
        var_dump($_SESSION['user_id']);

        $this->renderView('checkout');
    }
}