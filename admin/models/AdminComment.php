<?php

class AdminComment
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Phương thức để ẩn bình luận
    public function hideComment($bl_id)
    {
        try {
            $sql = "UPDATE binh_luan SET an_hien = 0 WHERE bl_id = :bl_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':bl_id' => $bl_id]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi hideComment(): ' . $e->getMessage();
            return false;
        }
    }

    // Phương thức để hiển thị bình luận
    public function showComment($bl_id)
    {
        try {
            $sql = "UPDATE binh_luan SET an_hien = 1 WHERE bl_id = :bl_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':bl_id' => $bl_id]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi showComment(): ' . $e->getMessage();
            return false;
        }
    }

    // Phương thức lấy tất cả bình luận
    //     public function getAllComment($sp_id = null)
    // {
    //     try {
    //         $sql = 'SELECT binh_luan.bl_id, binh_luan.noi_dung, binh_luan.ngay_tao,
    //                        taikhoan.ho_ten
    //                 FROM binh_luan
    //                 INNER JOIN taikhoan ON binh_luan.tk_id = taikhoan.tk_id
    //                 WHERE binh_luan.spbt_id = :spbt_id AND binh_luan.an_hien = 1';
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->bindParam(':spbt_id', $spbt_id, PDO::PARAM_INT);
    //         $stmt->execute();
    //         return $stmt->fetchAll();
    //     } catch (Exception $e) {
    //         echo 'Lỗi: ' . $e->getMessage();
    //     }
    // }
    public function getAllComment()
    {
        try {
            // Truy vấn lấy bình luận kèm tên sản phẩm
            $sql = 'SELECT 
        binh_luan.*,
        san_pham.ten_sp,
        taikhoan.ho_ten
    FROM 
        binh_luan
    JOIN 
        san_pham 
    ON 
        binh_luan.sp_id = san_pham.sp_id
    JOIN 
        taikhoan 
    ON 
        binh_luan.tk_id = taikhoan.tk_id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng kết hợp
        } catch (Exception $e) {
            echo 'Lỗi getAllComments(): ' . $e->getMessage();
        }
    }
}
