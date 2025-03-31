<?php

session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/ProductController.php';
require_once './controllers/CartController.php';
require_once './controllers/OrderController.php';

// Require toàn bộ file Models
require_once './models/Product.php';
require_once './models/Category.php';
require_once './models/Taikhoan.php';
require_once './models/Cart.php';
require_once './models/Order.php';

// Route
$act = $_GET['act'] ?? 'trang-chu';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    'trang-chu' => (new HomeController())->trangchu(),
    'gioi-thieu' => (new HomeController())->gioiThieu(),
    'chi-tiet-san-pham' => (new ProductController())->chiTietProduct(),
    'san-pham-theo-danh-muc' => (new ProductController())->productCategory(),
    'dang-nhap' => (new HomeController())->formDangNhap(),
    'check-dang-nhap' => (new HomeController())->dangNhap(),
    'dang-ky' => (new HomeController())->formDangKy(),
    'check-dang-ky' => (new HomeController())->dangKy(),
    'dang-xuat' => (new HomeController())->logout(),
    'xoa-ghi-nho' => (new HomeController())->xoaCookie(),
    'lien-he' => (new HomeController())->lienHe(),
    'thanh-toan' => (new HomeController())->thanhToan(),
    'them-vao-gio-hang' => (new CartController())->addToCart(),
    'gio-hang' => (new CartController())->showCart(),

    'xoa-gio-hang' => (new CartController())->deleteCart(),
    'xac-nhan-don' => (new OrderController())->xacNhanDon(),
    'lich-su-don' => (new OrderController())->orderHistory(),
    'chi-tiet-don-hang' => (new OrderController())->detailOrder(),
    'info-Acc' => (new HomeController())-> infoAcc(),
    'edit-thong-tin' => (new HomeController())-> editInfo(),

    // chuc nang binh luan
    'addBinhLuan' => (new HomeController())->addBinhLuan(),
    // 'listCommentByProduct' => (new HomeController())->listCommentByProduct(),

    // chức năng đánh giá
    'danh-gia' => (new OrderController())->showReviewForm(),
    'addEvaluation' => (new HomeController())->addEvaluation(),
    // 'listEvaluationByProduct' => (new HomeController())->listEvaluationByProduct(),
};
