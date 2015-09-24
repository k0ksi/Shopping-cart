<?php

class UsersController extends BaseController
{
    public function create() {
        $this->renderView("create");
    }

    public function delete() {
        $this->renderView("index");
    }

    public function index() {
        $this->users = array (
            array('id' => 1, 'name' =>"Ivan"),
            array('id' => 2, 'name' =>"Pesho"),
            array('id' => 3, 'name' =>"Maria")
        );
    }
}