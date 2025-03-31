<?php

class CartController
{
    private $cartModel;
    public $category;
    public $taikhoan;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->category = new Category();
        $this->taikhoan = new taikhoan();

    }

    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $spbt_id = (int)$_POST['spbt_id'];
            $size_id = (int)$_POST['size_id'];
            $so_luong = (int)$_POST['so_luong'];
            // var_dump($spbt_id);
            // die;
            $listtaikhoan = $this->taikhoan->getAlltaikhoan();
            if (!$_SESSION['taikhoan']) {
                $_SESSION['error'] = "Đăng nhập để thêm sản phẩm vào giỏ";
                header('location: '.BASE_URL.'?act=dang-nhap');
                exit;
            } else {
                foreach ($listtaikhoan as $value) {
                    if ($_SESSION['taikhoan'] == $value['email']) {
                        $tk_id = $value['tk_id'];
                        break;
                    }
                }
            }

            // var_dump($spbt_id.'-'. $size_id .'-'. $so_luong.'-'.$tk_id);die;
            $checkAddCart = $this->cartModel->addToCart($tk_id, $spbt_id, $size_id, $so_luong);
            if ($checkAddCart) {
                header('Location: ' . BASE_URL . '?act=gio-hang');
                exit;
            } else {
                header('Location: ' . BASE_URL . '?act=chi-tiet-san-pham&id='.$spbt_id.'&size_id='.$size_id);
                exit;
            }
        }
        deleteSessionError();
    }

    public function showCart()
    {
        $listCategory = $this->category->getAllCategory();
        $listtaikhoan = $this->taikhoan->getAlltaikhoan();
        if (!$_SESSION['taikhoan']) {
            header('location: '.BASE_URL.'?act=dang-nhap');
            $_SESSION['error'] = "Đăng nhập để thêm sản phẩm vào giỏ";
        } else {
            foreach ($listtaikhoan as $value) {
                if ($_SESSION['taikhoan'] == $value['email']) {
                    $tk_id = $value['tk_id'];
                }
            }
        }
        if (!$tk_id) {
            $_SESSION['error'] = 'Vui lòng đăng nhập để xem giỏ hàng!';
            header('Location: ' . BASE_URL . '?act=dang-nhap');
            exit;
        }

        $cartItems = $this->cartModel->getCartItems($tk_id);
        // var_dump($cartItems);
        // die;
        require_once './views/giohang.php';
    }

    public function deleteCart()
    {
        $id = $_GET['id'];
        // var_dump($id);die;
        $cart = $this->cartModel->getCartById($id);
        if ($cart) {
            $this->cartModel->deleteCart($id);
            header('location: '.BASE_URL.'?act=gio-hang');
            exit();
        } else {
            header('location: '.BASE_URL.'?act=gio-hang');
        }
    }

}
