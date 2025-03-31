<?php

class AdminCategoryController
{
    public $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new AdminCategory();
    }
    public function listCategory()
    {
        $listCategory = $this->modelCategory->getAllCategory();
        require_once "./views/manageCategory/listCategory.php";
        deleteSessionError(); // xóa session sau khi load trang
    }

    public function formAddCategory()
    {
        // dùng để hiển thị Form nhập
        require_once "./views/manageCategory/addCategory.php";
    }

    public function addCategory()
    {
        // Dùng để thêm dữ liệu


        // kiểm tra xem dữ liệu có submit vào không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ten_dm = $_POST['ten_dm'];

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ten_dm)) {
                $errors['ten_dm'] = 'Tên danh mục không được để trống!';
            }

            $_SESSION['error'] = $errors; // Lưu biến lỗi

            // Nếu không lỗi thì tiến hành thêm danh mục
            if (empty($errors)) {
                // Nếu errors rỗng thì tiến hành thêm
                $this->modelCategory->insertCategory($ten_dm);
                header('location: ' . BASE_URL_ADMIN . '?act=listCategory');
                exit();
            } else {
                // Trả về form và lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location:' . BASE_URL_ADMIN . '?act=formAddCategory');
                exit();
            }
        }
    }

    public function formEditCategory()
    {
        /* dùng để hiển thị Form nhập */

        // Lấy ra thông tindanh mục cần sửa
        $dm_id = $_GET['id'];
        $category = $this->modelCategory->getDetailCategory($dm_id);
        if ($category) {
            require_once "./views/manageCategory/editCategory.php";

        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=listCategory');
        }
    }

    public function editCategory()
    {
        // Dùng để thêm dữ liệu


        // kiểm tra xem dữ liệu có submit vào không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $dm_id = $_POST['dm_id'];
            $ten_dm = $_POST['ten_dm'];

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ten_dm)) {
                $errors['ten_dm'] = 'Tên danh mục không được để trống!';
            }
            // Nếu không lỗi thì tiến hành Sửa danh mục
            if (empty($errors)) {
                // Nếu errors rỗng thì tiến hành Sửa
                $this->modelCategory->updateCategory($dm_id, $ten_dm);
                header('location: ' . BASE_URL_ADMIN . '?act=listCategory');
                exit();
            } else {
                // Trả về form và lỗi
                $category = ['dm_id' => $dm_id, 'ten_dm' => $ten_dm];

                require_once "./views/manageCategory/editCategory.php";
            }
        }
    }

    public function xoaCategory()
    {
        // Lấy ra thông tin danh mục cần xóa
        $dm_id = $_GET['id'];
        $category = $this->modelCategory->getDetailCategory($dm_id);
        if ($dm_id) {
            $this->modelCategory->deleteCategory($dm_id);
            header('location: '.BASE_URL_ADMIN.'?act=listCategory');
            exit();
        } else {
            header('location: '.BASE_URL_ADMIN.'?act=listCategory');
        }

    }
}
