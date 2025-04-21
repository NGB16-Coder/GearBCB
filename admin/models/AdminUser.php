<?php

class AdminUser
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllUser()
    {
        try {
            $sql = 'SELECT *FROM taikhoan';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllProduct() '.$e->getMessage();
        }
    }

    public function deleteUser($tk_id)
    {
        try {
            $sql = "DELETE FROM taikhoan WHERE tk_id=:tk_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteUser() '.$e->getMessage();
        }
    }

    public function banUser($tk_id)
    {
        try {
            $sql = "UPDATE taikhoan SET trang_thai = 1 WHERE tk_id = :tk_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi banUser(): ' . $e->getMessage();
            return false;
        }
    }
    public function unbanUser($tk_id)
    {
        try {
            $sql = "UPDATE taikhoan SET trang_thai = 0 WHERE tk_id = :tk_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi unbanUser(): ' . $e->getMessage();
            return false;
        }
    }
}
