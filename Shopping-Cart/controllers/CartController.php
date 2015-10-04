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
        if(!$this->db->checkForZeroQuantity()) {
            $this->addErrorMessage("Check quantity of each and every product in your cart. There's a product/s with less then 1 available item.");
            $this->redirect("products", 'index');
        }

        if(!$this->db->checkIfUserHasCash()) {
            $this->addErrorMessage("You don't have enough money to purchase these items.");
            $this->redirect("products", "index");
        }

        if(!$this->db->updateQuantities() || !$this->db->updateUserCash()) {
            $this->addErrorMessage("There was an error during the transaction. No money was withdrawn from your account.");
            $this->redirect("products", "index");
        }

        $_SESSION['price_to_pay'] = 0;
        $_SESSION['cart_elements'] = null;
        $this->addInfoMessage("Congratulations! You've successfully bought all of the selected items.");

        $this->redirect('products', 'index');
    }
}