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
            $sql = 'SELECT san_pham.*, danh_muc.ten_dm, tb_size.size_value,tb_size.size_id, sp_bien_the.*
            FROM san_pham 
            INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id
            INNER JOIN sp_bien_the ON san_pham.sp_id = sp_bien_the.sp_id
            INNER JOIN tb_size ON tb_size.size_id = sp_bien_the.size_id
            ORDER BY san_pham.ngay_tao DESC LIMIT 12';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllProduct() '.$e->getMessage();
        }
    }

    public function insertProduct($ten_sp, $gia_sp, $km_sp, $so_luong, $dm_id, $img_sp, $mo_ta, $size_id)
    {
        try {
            $sql = "INSERT INTO san_pham(dm_id, ten_sp, mo_ta, img_sp) 
                    VALUES(:dm_id, :ten_sp,:mo_ta,:img_sp)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':dm_id' => $dm_id,
                ':ten_sp' => $ten_sp,
                ':mo_ta' => $mo_ta,
                ':img_sp' => $img_sp
            ]);
            $sp_id = $this->conn->lastInsertId();

            $sql = "INSERT INTO sp_bien_the(sp_id, gia_sp, km_sp, so_luong, size_id) 
                    VALUES(:sp_id, :gia_sp, :km_sp, :so_luong, :size_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id,
                ':gia_sp' => $gia_sp,
                ':km_sp' => $km_sp,
                ':so_luong' => $so_luong,
                ':size_id' => $size_id,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi insetProduct() '.$e->getMessage();
        }
    }
    public function insertSize($sp_id, $gia_sp, $km_sp, $so_luong, $size_id)
    {
        try {
            $sql = "INSERT INTO sp_bien_the(sp_id, gia_sp, km_sp, so_luong, size_id) 
                    VALUES(:sp_id,:gia_sp, :km_sp, :so_luong, :size_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id,
                ':gia_sp' => $gia_sp,
                ':km_sp' => $km_sp,
                ':so_luong' => $so_luong,
                ':size_id' => $size_id,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi insetSize() '.$e->getMessage();
        }
    }

    public function getDetailProduct($spbt_id)
    {
        try {
            $sql = 'SELECT san_pham.sp_id,san_pham.ten_sp,san_pham.img_sp,san_pham.mo_ta,san_pham.dm_id, danh_muc.ten_dm,sp_bien_the.spbt_id,sp_bien_the.gia_sp,sp_bien_the.km_sp,sp_bien_the.so_luong, tb_size.size_id
            FROM san_pham 
            INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id
            INNER JOIN sp_bien_the ON san_pham.sp_id = sp_bien_the.sp_id
            INNER JOIN tb_size ON tb_size.size_id = sp_bien_the.size_id
            WHERE sp_bien_the.spbt_id = :spbt_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':spbt_id' => $spbt_id
            ]);
            return $stmt->fetch();
            // var_dump($stmt);
            // die;
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

    public function updateProduct($ten_sp, $mo_ta, $new_file, $dm_id, $gia_sp, $km_sp, $so_luong, $spbt_id, $sp_id)
    {
        try {
            // var_dump($ten_sp.'---');
            // var_dump($gia_sp);
            // die;
            $sql = "UPDATE san_pham SET ten_sp = :ten_sp, mo_ta = :mo_ta, img_sp = :new_file, dm_id = :dm_id WHERE sp_id = :sp_id;
            UPDATE sp_bien_the SET gia_sp = :gia_sp, km_sp = :km_sp, so_luong = :so_luong WHERE spbt_id = :spbt_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_sp' => $ten_sp,
                ':mo_ta' => $mo_ta,
                ':new_file' => $new_file,
                ':dm_id' => $dm_id,
                ':gia_sp' => $gia_sp,
                ':km_sp' => $km_sp,
                ':so_luong' => $so_luong,
                ':spbt_id' => $spbt_id,
                ':sp_id' => $sp_id
            ]);
            return true;
        } catch (Exception $e) {
            // var_dump($ten_sp);
            // die;
            echo 'Lỗi UpdateProduct() '.$e->getMessage();
        }
    }

    public function deleteProduct($sp_id)
    {
        try {
            $sql = "DELETE FROM sp_bien_the WHERE sp_id=:sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);

            // $sql = "SELECT * FROM san_pham WHERE sp_id = :sp_id";
            // $stmt = $this->conn->prepare($sql);
            // $stmt->execute([
            //     ':sp_id' => $sp_id
            // ]);
            // $checkPrd = $stmt->fetchAll();
            // if ($checkPrd['sp_id']) {
                $sql = "DELETE FROM san_pham WHERE sp_id=:sp_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':sp_id' => $sp_id
                ]);
            // }
            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteProduct() '.$e->getMessage();
        }
    }

    public function checkSize($sp_id)
    {
        try {
            $sql = "SELECT size_id FROM sp_bien_the WHERE sp_id = :sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi checkSize() '.$e->getMessage();
        }
    }
}
