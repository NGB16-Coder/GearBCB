<?php

class OrderModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function createOrder($tk_id, $ten_nhan, $sdt_nhan, $dia_chi_nhan, $items)
    {
        try {
            $totalQuantity = 0;
            $totalAmount = 0;
            foreach ($items as $item) {
                $totalQuantity += $item['so_luong'];
                $totalAmount += $item['km_sp'] * $item['so_luong'];
            }

            $sql = "INSERT INTO don_hang (tk_id,ten_nhan,sdt_nhan,dia_chi_nhan, tong_so_luong, tong_tien) VALUES (:tk_id,:ten_nhan,:sdt_nhan,:dia_chi_nhan, :totalQuantity, :totalAmount)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id,
                ':ten_nhan' => $ten_nhan,
                ':sdt_nhan' => $sdt_nhan,
                ':dia_chi_nhan' => $dia_chi_nhan,
                ':totalQuantity' => $totalQuantity,
                ':totalAmount' => $totalAmount
            ]);
            $order_id = $this->conn->lastInsertId();
            //chi tiết đơn hàng
            foreach ($items as $item) {
                $sqlDetail = "INSERT INTO chi_tiet_don_hang (order_id, sp_id, so_luong_mua, gia_mua) VALUES (:order_id, :sp_id, :so_luong_mua, :gia_mua)";
                $stmtDetail = $this->conn->prepare($sqlDetail);
                $stmtDetail->execute([
                    ':order_id' => $order_id,
                    ':sp_id' => $item['sp_id'],
                    ':so_luong_mua' => $item['so_luong'],
                    ':gia_mua' => $item['km_sp']
                ]);
            }
            // Giảm số lượng tồn kho
            $sql = "UPDATE san_pham SET so_luong = so_luong - :so_luong WHERE sp_id = :sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':so_luong' => $item['so_luong'],
                ':sp_id' => $item['sp_id']
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi createOrder() '.$e->getMessage();
        }
    }

    public function getOrdersByUser($tk_id)
    {
        try {
            $sql = "SELECT * FROM don_hang WHERE tk_id = :tk_id ORDER BY ngay_dat DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tk_id' => $tk_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getOrdersByUser Id(): ' . $e->getMessage();
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

    // kiểm tra mua hàng
    public function checkUserPurchase($tk_id)
    {
        try {
            $sql = 'SELECT COUNT(*) AS count
                FROM chi_tiet_don_hang
                JOIN don_hang ON chi_tiet_don_hang.order_id = don_hang.order_id
                WHERE don_hang.tk_id = :tk_id 
                  AND don_hang.trang_thai = 3'; // Chỉ kiểm tra các đơn hàng đã giao

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tk_id', $tk_id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'] > 0; // Trả về true nếu có giao dịch
        } catch (Exception $e) {
            echo 'Lỗi checkUserPurchase(): ' . $e->getMessage();
            return false;
        }
    }


    public function checkAllProductsRated($tk_id, $order_id)
    {
        try {
            $sql = "
            SELECT chi_tiet_don_hang.sp_id
            FROM chi_tiet_don_hang
            LEFT JOIN danh_gia ON chi_tiet_don_hang.order_id = danh_gia.order_id 
                AND chi_tiet_don_hang.sp_id = danh_gia.sp_id
            WHERE chi_tiet_don_hang.order_id = :order_id
            GROUP BY chi_tiet_don_hang.sp_id
            HAVING COUNT(danh_gia.dg_id) = COUNT(chi_tiet_don_hang.sp_id)"; // Kiểm tra tất cả sản phẩm có đánh giá hay không

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();

            return $stmt->rowCount() === count($this->getOrderItems($order_id)); // So sánh số lượng sản phẩm với số lượng đánh giá
        } catch (Exception $e) {
            echo 'Lỗi checkAllProductsRated(): ' . $e->getMessage();
            return false;
        }
    }

    public function getOrderItems($order_id)
    {
        try {
            $sql = "SELECT * FROM chi_tiet_don_hang WHERE order_id = :order_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi getOrderItems(): ' . $e->getMessage();
            return false;
        }

    }

    public function getOrderDetails($order_id)
    {
        try {
            $sql = "SELECT chi_tiet_don_hang.*, san_pham.ten_sp, san_pham.img_sp, san_pham.sp_id
            FROM chi_tiet_don_hang
            INNER JOIN san_pham ON san_pham.sp_id = chi_tiet_don_hang.sp_id
            WHERE chi_tiet_don_hang.order_id = :order_id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':order_id' => $order_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getOrderDetails(): ' . $e->getMessage();
            return false;
        }
    }

    public function getProductRatings($tk_id, $order_id)
    {
        try {
            $sql = "SELECT sp_id, dg_id
            FROM danh_gia
            WHERE tk_id = :tk_id AND order_id = :order_id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tk_id', $tk_id);
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi getProductRatings(): ' . $e->getMessage();
            return false;
        }
    }



}
