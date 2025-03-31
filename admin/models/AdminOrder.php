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
            $sql = "SELECT chi_tiet_don_hang.ctdh_id,chi_tiet_don_hang.order_id,chi_tiet_don_hang.spbt_id,chi_tiet_don_hang.gia_mua,chi_tiet_don_hang.so_luong_mua, tb_size.size_value, san_pham.ten_sp
                    FROM chi_tiet_don_hang
                    INNER JOIN sp_bien_the ON chi_tiet_don_hang.spbt_id = sp_bien_the.spbt_id
                    INNER JOIN tb_size ON tb_size.size_id = sp_bien_the.size_id
                    INNER JOIN san_pham ON sp_bien_the.sp_id = san_pham.sp_id
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
            $sql = "SELECT don_hang.trang_thai FROM don_hang WHERE order_id = :order_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':order_id' => $order_id
            ]);
            $checkOrder = $stmt->fetch();
            // var_dump($checkOrder['trang_thai']);die;
            if ($checkOrder['trang_thai'] <= 4) {
                $sql = "UPDATE don_hang SET trang_thai = :trang_thai + 1  WHERE order_id = :order_id ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':order_id' => $order_id,
                    ':trang_thai' => $checkOrder['trang_thai'],
                ]);
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo 'Lỗi getProductOrder() '.$e->getMessage();
        }
    }
}
