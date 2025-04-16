<?php

class Product
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // hàm lấy danh sách all
    public function getAll()
    {
        try {
            $sql = 'SELECT san_pham.*, danh_muc.ten_dm
            FROM san_pham 
            INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id
            ORDER BY san_pham.ngay_tao';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllProduct() '.$e->getMessage();
        }
    }

    public function getProductById($sp_id)
    {
        try {
            $sql = "SELECT san_pham.*, danh_muc.ten_dm
            FROM san_pham 
            INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id 
            WHERE san_pham.sp_id = :sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getProductById() '.$e->getMessage();
        }
    }

    public function getProductCategory($dm_id)
    {
        try {
            $sql = "SELECT san_pham.*, danh_muc.*
                    FROM san_pham 
                    INNER JOIN danh_muc ON danh_muc.dm_id = san_pham.dm_id
                    WHERE danh_muc.dm_id=:dm_id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':dm_id' => $dm_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getProductCategory() '.$e->getMessage();
        }
    }

    // Thêm bình luận
    public function addBinhLuan($tk_id, $sp_id, $noi_dung)
    {
        try {
            $sql = 'INSERT INTO binh_luan (tk_id, sp_id, noi_dung) 
                    VALUES (:tk_id, :sp_id, :noi_dung)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tk_id', $tk_id, PDO::PARAM_INT);
            $stmt->bindParam(':sp_id', $sp_id, PDO::PARAM_INT);
            $stmt->bindParam(':noi_dung', $noi_dung, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy bình luận theo sản phẩm
    public function getCommentByProduct($sp_id)
    {
        try {
            $sql = 'SELECT binh_luan.bl_id, binh_luan.noi_dung, binh_luan.ngay_tao, 
                           taikhoan.ho_ten 
                    FROM binh_luan 
                    INNER JOIN taikhoan ON binh_luan.tk_id = taikhoan.tk_id
                    WHERE binh_luan.sp_id = :sp_id AND binh_luan.an_hien = 1
                    ORDER BY binh_luan.ngay_tao DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':sp_id', $sp_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // chức năng đánh giá sản phẩm
    public function addEvaluation($tk_id, $sp_id, $order_id, $noi_dung, $so_sao)
    {
        try {
            $sql = 'INSERT INTO danh_gia (tk_id, sp_id, order_id, noi_dung, so_sao) 
                    VALUES (:tk_id, :sp_id, :order_id, :noi_dung, :so_sao)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id,
                ':sp_id' => $sp_id,
                ':order_id' => $order_id,
                ':noi_dung' => $noi_dung,
                ':so_sao' => $so_sao,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: addEvaluation' . $e->getMessage();
            return false;
        }
    }

    public function getSoSao($sp_id)
    {
        try {
            $sql = "SELECT AVG(so_sao) AS sosao, COUNT(*) AS sodanhgia 
                      FROM danh_gia 
                      WHERE sp_id = :sp_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':sp_id' => $sp_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getSoSao ' . $e->getMessage();
            return ['sosao' => 0, 'sodanhgia' => 0];
        }
    }

    // list đánh giá
    public function getEvaluationByProduct($sp_id)
    {
        try {
            $sql = 'SELECT danh_gia.dg_id, danh_gia.noi_dung, danh_gia.so_sao, danh_gia.ngay_tao, taikhoan.ho_ten
                    FROM danh_gia 
                    INNER JOIN taikhoan ON danh_gia.tk_id = taikhoan.tk_id
                    WHERE danh_gia.sp_id = :sp_id AND danh_gia.an_hien = 1
                    ORDER BY danh_gia.ngay_tao DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':sp_id', $sp_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: getEvaluationByProduct' . $e->getMessage();
        }
    }

    public function loc($kw, $km_sp = null, $sp_id = null)
    {
        try {
            $sql = 'SELECT san_pham.*, danh_muc.ten_dm
                    FROM san_pham 
                    INNER JOIN danh_muc ON san_pham.dm_id = danh_muc.dm_id
                    WHERE LOWER(san_pham.ten_sp) LIKE LOWER(:keyword)';

            if ($km_sp !== null) {
                $sql .= " AND san_pham.km_sp = :km_sp";
            }
            if ($sp_id !== null) {
                $sql .= " AND san_pham.sp_id = :sp_id";
            }

            $sql .= " ORDER BY san_pham.ngay_tao";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':keyword', '%' . $kw . '%', PDO::PARAM_STR);

            if ($km_sp !== null) {
                $stmt->bindValue(':km_sp', $km_sp, PDO::PARAM_INT);
            }
            if ($sp_id !== null) {
                $stmt->bindValue(':sp_id', $sp_id, PDO::PARAM_INT);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo 'Lỗi: loc ' . $e->getMessage();
        }
    }
}
