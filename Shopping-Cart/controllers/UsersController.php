<?php

class UsersController extends BaseController
{
    private $db;

    public function onInit() {
        $this->isAdmin();
        $this->db = new UsersModel();
        $this->title = "Users";
    }

    public function index($page = DEFAULT_PAGE_NUMBER, $pageSize = DEFAULT_PAGE_SIZE) {
        $this->authorize();
        $this->isAdmin();

        $usersCount = count($this->db->getAll());
        $from = $page * ($pageSize);

        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->maxPageSize = (int)($usersCount / $pageSize);
        $this->users = $this->db->getFilteredUsers($from, 8);
        $this->renderView();
    }

    public function showUsers() {
        $this->isAdmin();
        $this->users = $this->db->getAll();
        $this->renderView(__FUNCTION__, false);
    }

    public function delete($id) {
        $this->authorize();
        $this->isAdmin();

        if ($this->db->deleteUser($id)) {
            $this->addInfoMessage("User removed from system");
        } else {
            $this->addErrorMessage("An error occurred while trying to remove the user from the system");
        }
        $this->redirect('users');
    }

    public function edit() {
        $this->authorize();
        $this->isAdmin();

        if($this->isPost){
            $isAdmin = strpos($_POST['user_roles'], 'admin');
            if(is_int($isAdmin)) {
                $isAdmin = 1;
            } else {
                $isAdmin = 0;
            }
            $isEditor = strpos($_POST['user_roles'], 'editor');
            if(is_int($isEditor)) {
                $isEditor = 1;
            } else {
                $isEditor = 0;
            }

            if(!$isEditor && !$isAdmin) {
                $this->addErrorMessage("An error occurred while editing the user rights. Most likely you entered faulty values. Please enter admin or editor or both if you like.");
            }
            $userId = (int)$_POST['user_id'];
            $isEdited = $this->db->editUserRights($isAdmin, $isEditor, $userId);

            if ($isEdited) {
                $this->addInfoMessage("User roles have been edited");
                $this->redirect('users');
            }
        }

        $this->renderView(__FUNCTION__);
    }
}