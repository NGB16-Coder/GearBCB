<?php

class AdminProductController
{
    public $modelProduct;
    public $modelCategory;
    public $modelSize;

    public function __construct()
    {
        $this->modelProduct = new AdminProduct();
        $this->modelCategory = new AdminCategory();
        $this->modelSize = new AdminSize();
    }
    public function listProduct()
    {
        $listProduct = $this->modelProduct->getAllProduct();
        $listSize = $this->modelSize->getAllSize(); // lấy dữ liệu vào mục size
        require_once "./views/manageProduct/listProduct.php";
    }

    public function formAddProduct()
    {
        // dùng để hiển thị Form nhập

        $listCategory = $this->modelCategory->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục
        $listSize = $this->modelSize->getAllSize(); // lấy dữ liệu vào mục size
        // $listProduct = $this->modelProduct->getAllProduct();

        require_once "./views/manageProduct/addProduct.php";
        deleteSessionError(); // xóa session sau khi load trang
    }

    public function addProduct() // Dùng để thêm dữ liệu
    {

        // kiểm tra xem dữ liệu có submit vào không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $dm_id = $_POST['dm_id'] ?? '';
            $ten_sp = $_POST['ten_sp'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $gia_sp = $_POST['gia_sp'] ?? '';
            $km_sp = $_POST['km_sp'] ?? '';
            $img_sp = $_FILES['img_sp'] ?? null;
            $so_luong = $_POST['so_luong'] ?? '';
            $size_id = $_POST['size_id'] ?? '';

            // Lưu hình ảnh vào
            $file_thumb = uploadFile($img_sp, 'assets/img/product/');


            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($dm_id)) {
                $errors['dm_id'] = 'Bắt buộc chọn sản phẩm thuộc danh mục!';
            }
            if (empty($ten_sp)) {
                $errors['ten_sp'] = 'Tên sản phẩm không được để trống!';
            }
            if (empty($gia_sp)) {
                $errors['gia_sp'] = 'Giá sản phẩm không được để trống!';
            }
            if (empty($km_sp)) {
                $errors['km_sp'] = 'Khuyến mãi sản phẩm không được để trống!';
            }
            if ($img_sp['error'] !== 0) {
                $errors['img_sp'] = 'Bắt buộc chọn ảnh sản phẩm!';
            }
            if ($so_luong < 0) {
                $errors['so_luong'] = 'Số lượng sản phẩm bắt buộc nhập!';
            }
            if (empty($size_id)) {
                $errors['size_id'] = 'Size sản phẩm bắt buộc chọn!';
            }


            $_SESSION['error'] = $errors; // Lưu biến lỗi
            // Nếu không lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu errors rỗng thì tiến hành thêm
                $this->modelProduct->insertProduct($ten_sp, $gia_sp, $km_sp, $so_luong, $dm_id, $file_thumb, $mo_ta, $size_id);
                header('location:' . BASE_URL_ADMIN . '?act=listProduct');
                exit();
            } else {
                // Trả về form và lỗi

                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location:' . BASE_URL_ADMIN . '?act=formAddProduct');
                exit();
            }
        }

    }

    public function formEditProduct()
    {
        /* dùng để hiển thị Form nhập */

        // Lấy ra thông tin sản phẩm cần sửa
        $listProduct = $this->modelProduct->getAllProduct();
        $listCategory = $this->modelCategory->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục
        $listSize = $this->modelSize->getAllSize(); // lấy dữ liệu vào mục size
        $spbt_id = $_GET['id'];
        // var_dump($sp_id);
        // die;
        $product = $this->modelProduct->getDetailProduct($spbt_id);
        // print_r($product);
        // die;
        if ($product) {
            require_once "./views/manageProduct/editProduct.php";
            deleteSessionError();
        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=listProduct');
        }
    }

    public function editProduct()
    {
        // Dùng để thêm dữ liệu

        // kiểm tra xem dữ liệu có submit vào không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy dữ liệu cũ của sản phẩm
            $spbt_id = (int)$_POST['spbt_id'] ?? '';
            $sp_id = (int)$_POST['sp_id'] ?? '';
            // $size_id = (int)$_POST['size_id'] ?? '';
            // truy vấn
            $productOld = $this->modelProduct->getDetailProduct($spbt_id);
            $old_file = $productOld['img_sp']; // lấy ảnh cũ sửa ảnh

            // lấy ra dữ liệu
            $dm_id = (int)$_POST['dm_id'] ?? '';
            $ten_sp = $_POST['ten_sp'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $gia_sp = (int)$_POST['gia_sp'] ?? '';
            $km_sp = (int)$_POST['km_sp'] ?? '';
            $img_sp = $_FILES['img_sp'] ?? null;
            $so_luong = (int)$_POST['so_luong'] ?? '';
            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            $_SESSION['error'] = $errors; // Lưu biến lỗi
            // print_r($sp_id.'---'.$spbt_id);
            // die;

            // logic sửa ảnh
            if (isset($img_sp) && $img_sp['error'] == UPLOAD_ERR_OK) {
                // upload ảnh mới lên
                $new_file = uploadFile($img_sp, 'assets/img/product/');
                // nếu có ảnh cũ thì xóa đi
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file; // nếu không có ảnh mới thì giữ nguyên ảnh cũ
            }
            // print_r($new_file);
            // die;
            // Nếu không lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu errors rỗng thì tiến hành thêm
                // print_r($sp_id.'---'.$spbt_id);
                // die;
                $this->modelProduct->updateProduct($ten_sp, $mo_ta, $new_file, $dm_id, $gia_sp, $km_sp, $so_luong, $spbt_id, $sp_id);
                header('location:' . BASE_URL_ADMIN . '?act=listProduct');
                exit();
            } else {
                // Trả về form và lỗi

                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location:' . BASE_URL_ADMIN . '?act=formEditProduct&id='.$spbt_id);
                exit();


            }
        }
    }

    public function xoaProduct()
    {
        // Lấy ra thông tin sản phẩm cần xóa
        $sp_id = $_GET['id'];
        // var_dump($sp_id);die;
        $product = $this->modelProduct->getSanPham($sp_id);

        if ($product) {
            deleteFile($product['img_sp']);
            $this->modelProduct->deleteProduct($sp_id);
        }
        header('location: '.BASE_URL_ADMIN.'?act=listProduct');
        exit();

    }

    public function formAddSize()
    {

        // Lấy ra thông tin sản phẩm
        $spbt_id = $_GET['id'];
        $product = $this->modelProduct->getDetailProduct($spbt_id);
        $listSize = $this->modelSize->getAllSize(); // lấy dữ liệu vào mục size
        $listCategory = $this->modelCategory->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục
        if ($product) {
            require_once "./views/manageProduct/addSize.php";
            deleteSessionError(); // xóa session sau khi load trang
        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=listProduct');
            deleteSessionError(); // xóa session sau khi load trang

        }
    }
    public function addSize() // Dùng để thêm dữ liệu
    {

        // kiểm tra xem dữ liệu có submit vào không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $sp_id = $_POST['sp_id'] ?? '';
            $gia_sp = $_POST['gia_sp'] ?? '';
            $km_sp = $_POST['km_sp'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $size_id = $_POST['size_id'] ?? '';
            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($gia_sp)) {
                $errors['gia_sp'] = 'Giá sản phẩm không được để trống!';
            }
            if (empty($km_sp)) {
                $errors['km_sp'] = 'Khuyến mãi sản phẩm không được để trống!';
            }
            if ($so_luong < 0) {
                $errors['so_luong'] = 'Số lượng sản phẩm bắt buộc nhập!';
            }
            if (empty($size_id)) {
                $errors['size_id'] = 'Size sản phẩm bắt buộc chọn!';
            }

            $checkSize = $this->modelProduct->checkSize($sp_id);
            foreach ($checkSize as $size) {
                $size['size_id'];
                if ($size['size_id'] == $size_id) {
                    $errors['size_id'] = 'Size sản phẩm đã có!';
                }
            };
            // print_r($errors['size_id']);
            // die;
            $_SESSION['error'] = $errors; // Lưu biến lỗi
            // Nếu không lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu errors rỗng thì tiến hành thêm
                $this->modelProduct->insertSize($sp_id, $gia_sp, $km_sp, $so_luong, $size_id);
                header('location:' . BASE_URL_ADMIN . '?act=listProduct');
                exit();
            } else {
                // Trả về form và lỗi

                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location:' . BASE_URL_ADMIN . '?act=formAddSize&id='.$sp_id);
                exit();
            }
        }
    }
}
