<?php

class AdminOrder
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllOrder()
    {
        try {
            $sql = "SELECT don_hang.*, taikhoan.ho_ten, taikhoan.sdt, taikhoan.dia_chi 
            FROM don_hang
            INNER JOIN taikhoan ON taikhoan.tk_id = don_hang.tk_id
            ORDER BY don_hang.ngay_dat DESC ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllOrder() '.$e->getMessage();
        }
    }

    public function getDetailOrder($order_id)
    {
        try {
            $sql = "SELECT chi_tiet_don_hang.ctdh_id, chi_tiet_don_hang.order_id, chi_tiet_don_hang.gia_mua, chi_tiet_don_hang.ngay_tao ,taikhoan.*,don_hang.*
                    FROM don_hang
                    INNER JOIN chi_tiet_don_hang ON chi_tiet_don_hang.order_id = don_hang.order_id
                    INNER JOIN taikhoan ON taikhoan.tk_id = don_hang.tk_id
                    WHERE chi_tiet_don_hang.order_id = :order_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':order_id' => $order_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getDetailOrder() '.$e->getMessage();
        }
    }

    public function getProductOrder($order_id)
    {
        try {
            $sql = "SELECT chi_tiet_don_hang.ctdh_id, chi_tiet_don_hang.order_id, chi_tiet_don_hang.sp_id, chi_tiet_don_hang.gia_mua, chi_tiet_don_hang.so_luong_mua, san_pham.ten_sp
                    FROM chi_tiet_don_hang
                    INNER JOIN san_pham ON chi_tiet_don_hang.sp_id = san_pham.sp_id
                    WHERE chi_tiet_don_hang.order_id = :order_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':order_id' => $order_id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getProductOrder() '.$e->getMessage();
        }
    }

    public function editTrangThai($order_id)
    {
        try {
            // Lấy thông tin đơn hàng
            $order = $this->getDetailOrder($order_id);
            if (!$order) {
                return "Đơn hàng không tồn tại!";
            }

            // Kiểm tra trạng thái
            if ($order['trang_thai'] != 1) {
                return "Đơn hàng không ở trạng thái chờ xác nhận!";
            }

            // Cập nhật trạng thái sang Đang giao hàng (2)
            $sql = "UPDATE don_hang SET trang_thai = :trang_thai WHERE order_id = :order_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai' => 2,
                ':order_id' => $order_id
            ]);

            return "Xác nhận đơn hàng thành công!";
        } catch (Exception $e) {
            echo 'Lỗi confirmOrder(): ' . $e->getMessage();
            return "Lỗi khi xác nhận đơn hàng!";
        }
    }
}
