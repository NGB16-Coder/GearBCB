<?php

require_once "models/AdminProduct.php";
require_once "models/AdminCategory.php";

class AdminProductController
{
    private $modelProduct;
    private $modelCategory;

    public function __construct()
    {
        $this->modelProduct = new AdminProduct();
        $this->modelCategory = new AdminCategory();
    }

    public function listProduct()
    {
        $listProduct = $this->modelProduct->getAllProduct();
        require_once "./views/manageProduct/listProduct.php";
    }

    public function formAddProduct()
    {
        $listCategory = $this->modelCategory->getAllCategory();
        require_once "./views/manageProduct/addProduct.php";
        deleteSessionError();
    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_sp = $_POST['ten_sp'] ?? '';
            $gia_sp = $_POST['gia_sp'] ?? '';
            $km_sp = $_POST['km_sp'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $dm_id = $_POST['dm_id'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $errors = [];

            // Validate
            if (empty($ten_sp)) {
                $errors['ten_sp'] = 'Tên sản phẩm không được để trống!';
            }
            if (empty($gia_sp)) {
                $errors['gia_sp'] = 'Giá sản phẩm không được để trống!';
            }
            if ($so_luong === '' || $so_luong < 0) {
                $errors['so_luong'] = 'Số lượng sản phẩm bắt buộc nhập!';
            }
            if (empty($dm_id)) {
                $errors['dm_id'] = 'Danh mục sản phẩm bắt buộc chọn!';
            }
            if (empty($mo_ta)) {
                // $errors['mo_ta'] = 'Mô tả sản phẩm không được để trống!';
                $mo_ta = "";
            }
            if (empty($km_sp)) {
                // $errors['km_sp'] = 'Khuyến mãi sản phẩm không được để trống!';
                $km_sp = null;
            }

            $img_sp = $_FILES['img_sp'];
            if ($img_sp['error'] == 0) {
                $extension = pathinfo($img_sp['name'], PATHINFO_EXTENSION);
                if (!in_array(strtolower($extension), ['jpg', 'png', 'jpeg', 'gif'])) {
                    $errors['img_sp'] = 'Ảnh không đúng định dạng!';
                }
            } else {
                $errors['img_sp'] = 'Ảnh sản phẩm bắt buộc chọn!';
            }

            // Nếu có lỗi: lưu lỗi và giá trị cũ vào session
            if (!empty($errors)) {
                $_SESSION['error'] = $errors;
                $_SESSION['old'] = $_POST;
                header('Location: ' . BASE_URL_ADMIN . '?act=formAddProduct');
                exit();
            }

            // Nếu không có lỗi: xử lý upload và lưu dữ liệu
            $file_thumb = uploadFile($img_sp, 'assets/img/product/');
            $this->modelProduct->insertProduct($ten_sp, $gia_sp, $km_sp, $so_luong, $dm_id, $file_thumb, $mo_ta);

            // Xóa dữ liệu cũ khỏi session
            unset($_SESSION['old']);
            unset($_SESSION['error']);

            header('Location: ' . BASE_URL_ADMIN . '?act=listProduct');
            exit();
        }
    }


    public function formEditProduct()
    {
        $sp_id = $_GET['id'];
        $product = $this->modelProduct->getDetailProduct($sp_id);
        $listCategory = $this->modelCategory->getAllCategory();
        if ($product) {
            require_once "./views/manageProduct/editProduct.php";
            deleteSessionError();
        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=listProduct');
            deleteSessionError();
        }
    }

    public function editProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sp_id = $_POST['sp_id'] ?? '';
            $ten_sp = $_POST['ten_sp'] ?? '';
            $gia_sp = $_POST['gia_sp'] ?? '';
            $km_sp = $_POST['km_sp'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $dm_id = $_POST['dm_id'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
    
            $errors = [];
            if (empty($ten_sp)) {
                $errors['ten_sp'] = 'Tên sản phẩm không được để trống!';
            }
            if (empty($gia_sp)) {
                $errors['gia_sp'] = 'Giá sản phẩm không được để trống!';
            }
            if ($so_luong < 0 || $so_luong === '') {
                $errors['so_luong'] = 'Số lượng sản phẩm bắt buộc nhập!';
            }
            if (empty($dm_id)) {
                $errors['dm_id'] = 'Danh mục sản phẩm bắt buộc chọn!';
            }
            if (empty($mo_ta)) {
                $mo_ta = "";
            }
            if (empty($km_sp)) {
                $km_sp = null;
            }
    
            $product = $this->modelProduct->getSanPham($sp_id);
            $img_sp = $_FILES['img_sp'];
    
            if ($img_sp['error'] == 0) {
                $extension = pathinfo($img_sp['name'], PATHINFO_EXTENSION);
                if (!in_array(strtolower($extension), ['jpg', 'png', 'jpeg', 'gif'])) {
                    $errors['img_sp'] = 'Ảnh không đúng định dạng!';
                }
            }
    
            $_SESSION['error'] = $errors;
    
            if (empty($errors)) {
                if ($img_sp['error'] == 0) {
                    deleteFile($product['img_sp']);
                    $file_thumb = uploadFile($img_sp, 'assets/img/product/');
                } else {
                    $file_thumb = $product['img_sp'];
                }
    
                $this->modelProduct->updateProduct($ten_sp, $mo_ta, $file_thumb, $dm_id, $gia_sp, $km_sp, $so_luong, $sp_id);
                header('location:' . BASE_URL_ADMIN . '?act=listProduct');
                exit();
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['old'] = $_POST; 
                header('location:' . BASE_URL_ADMIN . '?act=formEditProduct&id=' . $sp_id);
                exit();
            }
        }
    }
    


    public function xoaProduct()
    {
        $sp_id = $_GET['id'];
        $product = $this->modelProduct->getSanPham($sp_id);

        if ($product) {
            deleteFile($product['img_sp']);
            $this->modelProduct->deleteProduct($sp_id);
        }
        header('location: ' . BASE_URL_ADMIN . '?act=listProduct');
        exit();
    }
}
