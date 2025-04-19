<?php

class CartModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addToCart($tk_id, $sp_id, $so_luong)
    {
        try {
            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
            $sql = "SELECT * FROM gio_hang WHERE tk_id = :tk_id AND sp_id = :sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id,
                ':sp_id' => $sp_id
            ]);
            $existingCartItem = $stmt->fetch();

            if ($existingCartItem) {
                $sql = "UPDATE gio_hang SET so_luong = so_luong + :so_luong WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':so_luong' => $so_luong,
                    ':id' => $existingCartItem['id']
                ]);
                return true;
            } else {
                // Nếu chưa tồn tại, thêm mới
                $sql = "INSERT INTO gio_hang (sp_id, tk_id, so_luong) VALUES (:sp_id, :tk_id, :so_luong)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':sp_id' => $sp_id,
                    ':tk_id' => $tk_id,
                    ':so_luong' => $so_luong
                ]);
                return true;
            }
        } catch (Exception $e) {
            echo 'Lỗi addToCart(): ' . $e->getMessage();
            return false;
        }
    }

    public function getCartItems($tk_id)
    {
        try {
            $sql = "SELECT gio_hang.*, san_pham.ten_sp, san_pham.img_sp, san_pham.gia_sp, san_pham.km_sp, san_pham.so_luong AS sl_sp
                    FROM `gio_hang` 
                    INNER JOIN san_pham ON san_pham.sp_id = gio_hang.sp_id
                    WHERE tk_id = :tk_id
                    ORDER BY san_pham.ten_sp";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getCartItems(): ' . $e->getMessage();
        }
    }

    public function getCartById($id)
    {
        try {
            $sql = "SELECT * FROM gio_hang WHERE id = :id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getCartById(): ' . $e->getMessage();
        }
    }

    public function deleteCart($id)
    {
        try {
            $sql = "DELETE FROM gio_hang WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteCart(): ' . $e->getMessage();
        }
    }
}
