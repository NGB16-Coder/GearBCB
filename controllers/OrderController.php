<?php

class OrderController
{
    public $product;
    private $cartModel;
    private $orderModel;
    public $category;
    public $taikhoan;

    public function __construct()
    {
        $this->product = new Product();
        $this->cartModel = new CartModel();
        $this->orderModel = new OrderModel();
        $this->category = new Category();
        $this->taikhoan = new taikhoan();
    }

    public function xacNhanDon()
    {
        $tk_id = $_GET['id'];
        $cartItems = $this->cartModel->getCartItems($tk_id);
        $selectedItems = [];
        $ten_nhan = $_POST['ten_nhan'] ? $_POST['ten_nhan'] : null ;
        $sdt_nhan = $_POST['sdt_nhan'] ? $_POST['sdt_nhan'] : null ;
        $dia_chi_nhan = $_POST['dia_chi_nhan'] ? $_POST['dia_chi_nhan'] : null ;
        // var_dump($ten_nhan, $sdt_nhan, $dia_chi_nhan);
        // die;
        if (isset($_POST['select-product'])) {
            foreach ($cartItems as $item) {
                if (in_array($item['id'], $_POST['select-product'])) {
                    $selectedItems[] = $item;
                }
            }
        }
        $order_id = $this->orderModel->createOrder($tk_id, $ten_nhan, $sdt_nhan, $dia_chi_nhan, $selectedItems);


        // Xóa sản phẩm đã đặt hàng khỏi giỏ
        foreach ($selectedItems as $item) {
            $this->cartModel->deleteCart($item['id']);
        }
        if ($order_id) {
            echo "<script>
                    alert('Đơn hàng đã được xác nhận thành công!');
                    window.location.href = '" . BASE_URL . "?act=lich-su-don&id=" . $tk_id . "';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Xác nhận đơn hàng thất bại. Vui lòng thử lại.');
                    window.location.href = '" . BASE_URL . "?act=xac-nhan-don&id=" . $tk_id . "';
                  </script>";
            exit;
        }
    }

    public function orderHistory()
    {
        $tk_id = $_GET['id'];
        $listCategory = $this->category->getAllCategory();
        $orders = $this->orderModel->getOrdersByUser($tk_id);

        $allRatedStatus = [];
        foreach ($orders as $order) {
            if ($order['trang_thai'] == 3) {
                // Kiểm tra xem tất cả các sản phẩm trong đơn hàng đã được đánh giá chưa
                $allRatedStatus[$order['order_id']] = $this->orderModel->checkAllProductsRated($tk_id, $order['order_id']);
            } else {
                // Nếu đơn hàng chưa giao, không thể đánh giá
                $allRatedStatus[$order['order_id']] = false;
            }
        }

        require_once './views/historyOrder.php';
        deleteSessionError();
    }


    public function detailOrder()
    {
        $order_id = (int)$_GET['id'];
        $listCategory = $this->category->getAllCategory();
        $detailDonHang = $this->orderModel->getDetailOrder($order_id);
        // var_dump($detailDonHang['tk_id']);die;
        $productDonHang = $this->orderModel->getOrderDetails($order_id);
        // var_dump($productDonHang);die;
        if ($detailDonHang && $productDonHang) {
            require_once "./views/chitietOrder.php";
            deleteSessionError(); // xóa session sau khi load trang
        } else {
            header('location: ' . BASE_URL . '?act=lich-su-don&id='.$detailDonHang['tk_id']);
            deleteSessionError();
            exit;
        }
    }

    public function showReviewForm()
    {
        $order_id = $_GET['order_id'];
        $tk_id = $_GET['tk_id'];
        $listCategory = $this->category->getAllCategory();

        // Lấy thông tin các sản phẩm trong đơn hàng
        $orderDetails = $this->orderModel->getOrderDetails($order_id);

        // Lấy thông tin về trạng thái đánh giá của từng sản phẩm
        $ratings = $this->orderModel->getProductRatings($tk_id, $order_id);

        require_once './views/danhGia.php';
    }

    public function confirmReceived()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $order_id = $_POST['order_id'];
            $tk_id = $_POST['tk_id'];
            $result = $this->orderModel->confirmReceived($order_id);

            if ($result === "Xác nhận nhận hàng thành công!") {
                $_SESSION['success'] = $result;
            } else {
                $_SESSION['error'] = $result;
            }

            // Chuyển hướng về trang danh sách đơn hàng của người dùng
            header('Location: ' . BASE_URL . '?act=lich-su-don&id=' . $tk_id);
            exit();
        }
    }

    /**
     * Xử lý hủy đơn hàng
     */
    public function cancelOrder()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $order_id = $_POST['order_id'];
            $tk_id = $_POST['tk_id'];
            // var_dump($tk_id);die;
            $result = $this->orderModel->cancelOrder($order_id);

            if ($result === "Hủy đơn hàng thành công!") {
                $_SESSION['success'] = $result;
            } else {
                $_SESSION['error'] = $result;
            }

            // Chuyển hướng về trang danh sách đơn hàng của người dùng
            header('Location: ' . BASE_URL . '?act=lich-su-don&id=' . $tk_id);
            exit();
        }
    }

}
