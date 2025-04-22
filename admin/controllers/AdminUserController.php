<?php

class AdminUserController
{
    public $modeluser;

    public function __construct()
    {
        $this->modeluser = new AdminUser();

    }
    public function listUser()
    {

        $listUser = $this->modeluser->getAllUser();
        require_once "./views/manageUser/listUser.php";
        deleteSessionError();
    }

    public function deleteUser()
    {
        $tk_id = $_GET['id'];

        if ($tk_id) {
            $this->modeluser->deleteUser($tk_id);
            header('location: '.BASE_URL_ADMIN.'?act=listUser');
            exit();
        } else {
            $_SESSION['error'] = "Không tồn tại tài khoản này";
            header('location: '.BASE_URL_ADMIN.'?act=listUser');
            exit();
        }

    }
    public function banUser()
    {
        $tk_id = $_GET['id'];

        if ($tk_id) {
            $this->modeluser->banUser($tk_id);
            header('location: '.BASE_URL_ADMIN.'?act=listUser');
            exit();
        } else {
            $_SESSION['error'] = "Không tồn tại tài khoản này";
            header('location: '.BASE_URL_ADMIN.'?act=listUser');
            exit();
        }

    }
    public function unbanUser()
    {
        $tk_id = $_GET['id'];

        if ($tk_id) {
            $this->modeluser->unbanUser($tk_id);
            header('location: '.BASE_URL_ADMIN.'?act=listUser');
            exit();
        } else {
            $_SESSION['error'] = "Không tồn tại tài khoản này";
            header('location: '.BASE_URL_ADMIN.'?act=listUser');
            exit();
        }

    }
}
