<?php

class AdminOrderController
{
    public $modelOrder;

    public function __construct()
    {
        $this->modelOrder = new AdminOrder();
    }
    public function listOrder()
    {
        $listOrder = $this->modelOrder->getAllOrder();
        // var_dump($listOrder);die;
        require_once "./views/manageOrder/listOrder.php";
        deleteSessionError(); // xóa session sau khi load trang
    }

    public function detailOrder()
    {
        $order_id = (int)$_GET['id'];
        $detailDonHang = $this->modelOrder->getDetailOrder($order_id);
        $productDonHang = $this->modelOrder->getProductOrder($order_id);
        // var_dump($productDonHang);die;
        if ($detailDonHang && $productDonHang) {
            require_once "./views/manageOrder/chitietOrder.php";
        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=listOrder');
            exit;
        }
    }

    public function editTrangThai()
    {
        $order_id = $_GET['id'];
        // var_dump($order_id);die;
        $editTrangThai = $this->modelOrder->editTrangThai($order_id);
        if ($editTrangThai) {
            $_SESSION['success'] = $editTrangThai;
        } else {
            $_SESSION['loi'] = $editTrangThai;
        }
        header('location: ' . BASE_URL_ADMIN . '?act=listOrder');
        exit;
    }
}
