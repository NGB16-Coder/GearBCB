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
    public function getAllComments()
    {
        try {
            $sql = 'SELECT binh_luan.*, san_pham.ten_sp, taikhoan.ho_ten
                    FROM binh_luan
                    INNER JOIN san_pham ON binh_luan.sp_id = san_pham.sp_id
                    INNER JOIN taikhoan ON binh_luan.tk_id = taikhoan.tk_id
                    ORDER BY binh_luan.ngay_tao DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllComments() '.$e->getMessage();
        }
    }

    public function getCommentById($bl_id)
    {
        try {
            $sql = 'SELECT binh_luan.*, san_pham.ten_sp, taikhoan.ho_ten
                    FROM binh_luan
                    INNER JOIN san_pham ON binh_luan.sp_id = san_pham.sp_id
                    INNER JOIN taikhoan ON binh_luan.tk_id = taikhoan.tk_id
                    WHERE binh_luan.bl_id = :bl_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':bl_id' => $bl_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getCommentById() '.$e->getMessage();
        }
    }

    public function deleteComment($bl_id)
    {
        try {
            $sql = "DELETE FROM binh_luan WHERE bl_id = :bl_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':bl_id' => $bl_id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteComment() '.$e->getMessage();
        }
    }
}
