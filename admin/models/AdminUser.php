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
}
