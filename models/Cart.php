<?php

class CartModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function addToCart($tk_id, $spbt_id, $size_id, $so_luong)
    {
        try {

            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
            $sql = "SELECT * FROM gio_hang WHERE tk_id = :tk_id AND spbt_id = :spbt_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id,
                ':spbt_id' => $spbt_id
            ]);
            $existingCartItem = $stmt->fetch();

            // var_dump($existingCartItem['id']);die;
            if ($existingCartItem) {
                $sql = "UPDATE gio_hang SET so_luong = so_luong + :so_luong WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':so_luong' => $so_luong,
                    ':id' => $existingCartItem['id']
                ]);
                // var_dump($existingCartItem['id']);
                // die;
                return true;
            } else {
                // Nếu chưa tồn tại, thêm mới
                // var_dump($tk_id);
                // var_dump($spbt_id);
                // var_dump($size_id);
                // var_dump($so_luong);
                // die;
                $sql = "INSERT INTO gio_hang (spbt_id, size_id, tk_id, so_luong) VALUES (:spbt_id, :size_id, :tk_id, :so_luong)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':spbt_id' => $spbt_id,
                    ':size_id' => $size_id,
                    ':tk_id' => $tk_id,
                    ':so_luong' => $so_luong
                ]);
                return true;
            }

            return true;
        } catch (Exception $e) {
            echo 'Lỗi addToCart(): ' . $e->getMessage();
            return false;
        }
    }

    public function getCartItems($tk_id)
    {
        try {
            $sql = "SELECT gio_hang.*, san_pham.ten_sp, san_pham.img_sp, sp_bien_the.gia_sp, sp_bien_the.km_sp, tb_size.size_value
                    FROM `gio_hang` 
                    INNER JOIN sp_bien_the ON sp_bien_the.spbt_id = gio_hang.spbt_id
                    INNER JOIN san_pham ON san_pham.sp_id = sp_bien_the.sp_id
                    INNER JOIN tb_size ON tb_size.size_id = gio_hang.size_id
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
