<?php

class AdminEvaluation
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllEvaluations($spbt_id = null)
    {
        try {
            // Câu lệnh SQL sử dụng JOIN để lấy dữ liệu từ các bảng liên quan
            $sql = 'SELECT 
                        danh_gia.dg_id,
                        danh_gia.noi_dung,
                        danh_gia.so_sao,
                        danh_gia.an_hien,
                        danh_gia.ngay_tao,
                        san_pham.ten_sp,
                        tb_size.size_value,
                        taikhoan.ho_ten
                    FROM 
                        danh_gia
                    JOIN  sp_bien_the  ON   danh_gia.spbt_id = sp_bien_the.spbt_id
                    JOIN  taikhoan  ON   danh_gia.tk_id = taikhoan.tk_id
                    JOIN san_pham ON san_pham.sp_id = sp_bien_the.sp_id
                    JOIN tb_size ON tb_size.size_id = sp_bien_the.size_id ';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng kết hợp
        } catch (Exception $e) {
            echo 'Lỗi getAllReviews(): ' . $e->getMessage();
        }
    }
    

    public function deleteEvaluation($dg_id)
    {
        try {
            $sql = "DELETE FROM danh_gia WHERE dg_id=:dg_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':dg_id' => $dg_id
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteDanhGia() '.$e->getMessage();
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
