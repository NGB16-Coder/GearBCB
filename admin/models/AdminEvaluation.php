<?php

class AdminEvaluation
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllEvaluations($sp_id = null)
    {
        try {
            $sql = 'SELECT danh_gia.*, san_pham.ten_sp, taikhoan.ho_ten
                    FROM danh_gia
                    INNER JOIN san_pham ON danh_gia.sp_id = san_pham.sp_id
                    INNER JOIN taikhoan ON danh_gia.tk_id = taikhoan.tk_id
                    ORDER BY danh_gia.ngay_tao DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllEvaluations() '.$e->getMessage();
        }
    }

    public function getEvaluationById($dg_id)
    {
        try {
            $sql = 'SELECT danh_gia.*, san_pham.ten_sp, taikhoan.ho_ten
                    FROM danh_gia
                    INNER JOIN san_pham ON danh_gia.sp_id = san_pham.sp_id
                    INNER JOIN taikhoan ON danh_gia.tk_id = taikhoan.tk_id
                    WHERE danh_gia.dg_id = :dg_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':dg_id' => $dg_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getEvaluationById() '.$e->getMessage();
        }
    }

    public function deleteEvaluation($dg_id)
    {
        try {
            $sql = "DELETE FROM danh_gia WHERE dg_id = :dg_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':dg_id' => $dg_id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteEvaluation() '.$e->getMessage();
        }
    }

    // Phương thức ẩn đánh giá
    public function hideEvaluation($dg_id)
    {
        try {
            $sql = 'UPDATE danh_gia SET an_hien = 0 WHERE dg_id = :dg_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':dg_id', $dg_id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Phương thức hiện đánh giá
    public function showEvaluation($dg_id)
    {
        try {
            $sql = 'UPDATE danh_gia SET an_hien = 1 WHERE dg_id = :dg_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':dg_id', $dg_id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

}
