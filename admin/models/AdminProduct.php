<?php

class AdminProduct
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllProduct()
    {
        try {
            $sql = 'SELECT san_pham.*, danh_muc.ten_dm
            FROM san_pham 
            INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id
            ORDER BY san_pham.ngay_tao DESC LIMIT 12';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllProduct() '.$e->getMessage();
        }
    }

    public function insertProduct($ten_sp, $gia_sp, $km_sp, $so_luong, $dm_id, $img_sp, $mo_ta)
    {
        try {
            $sql = "INSERT INTO san_pham(dm_id, ten_sp, mo_ta, img_sp, gia_sp, km_sp, so_luong) 
                    VALUES(:dm_id, :ten_sp, :mo_ta, :img_sp, :gia_sp, :km_sp, :so_luong)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':dm_id' => $dm_id,
                ':ten_sp' => $ten_sp,
                ':mo_ta' => $mo_ta,
                ':img_sp' => $img_sp,
                ':gia_sp' => $gia_sp,
                ':km_sp' => $km_sp,
                ':so_luong' => $so_luong
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi insetProduct() '.$e->getMessage();
        }
    }

    public function getDetailProduct($sp_id)
    {
        try {
            $sql = 'SELECT san_pham.*, danh_muc.ten_dm
            FROM san_pham 
            INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id
            WHERE san_pham.sp_id = :sp_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getDetailProduct() '.$e->getMessage();
        }
    }

    public function getSanPham($sp_id)
    {
        try {
            $sql = 'SELECT * FROM san_pham WHERE sp_id = :sp_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getSanPham() '.$e->getMessage();
        }
    }

    public function updateProduct($ten_sp, $mo_ta, $new_file, $dm_id, $gia_sp, $km_sp, $so_luong, $sp_id)
    {
        try {
            $sql = "UPDATE san_pham SET ten_sp = :ten_sp, mo_ta = :mo_ta, img_sp = :new_file, 
                    dm_id = :dm_id, gia_sp = :gia_sp, km_sp = :km_sp, so_luong = :so_luong 
                    WHERE sp_id = :sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_sp' => $ten_sp,
                ':mo_ta' => $mo_ta,
                ':new_file' => $new_file,
                ':dm_id' => $dm_id,
                ':gia_sp' => $gia_sp,
                ':km_sp' => $km_sp,
                ':so_luong' => $so_luong,
                ':sp_id' => $sp_id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi UpdateProduct() '.$e->getMessage();
        }
    }

    public function deleteProduct($sp_id)
    {
        try {
            $sql = "DELETE FROM san_pham WHERE sp_id=:sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteProduct() '.$e->getMessage();
        }
    }

    public function showProduct($sp_id)
    {
        try {
            $sql = "UPDATE san_pham SET an_hien = 1 WHERE sp_id = :sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi banUser(): ' . $e->getMessage();
            return false;
        }
    }
    public function hideProduct($sp_id)
    {
        try {
            $sql = "UPDATE san_pham SET an_hien = 0 WHERE sp_id = :sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi unbanUser(): ' . $e->getMessage();
            return false;
        }
    }
}
