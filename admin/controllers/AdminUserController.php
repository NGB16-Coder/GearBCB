<?php

class AdminUserController
{
    public $modeluser;
 
    public function __construct()
    {
        $this->modeluser = new AdminUser();
        
    }
    public function listUser(){
        
            $listUser = $this->modeluser->getAllUser();
            require_once "./views/manageUser/listUser.php";
        
    }
   
    public function deleteUser()
    {
        // Lấy ra thông tin danh mục cần xóa
        $tk_id = $_GET['id'];
       
        if ($tk_id) {
            $this->modeluser->deleteUser($tk_id);
            header('location: '.BASE_URL_ADMIN.'?act=listUser');
            exit();
        } else {
            die;
        }

    }
}
