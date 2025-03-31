<?php

class AdminCategory
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllCategory()
    {
        try {
            $sql = "SELECT * FROM danh_muc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllCategory() '.$e->getMessage();
        }
    }

    public function insertCategory($ten_dm)
    {
        try {
            $sql = "INSERT INTO danh_muc(ten_dm) VALUES(:ten_dm)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_dm' => $ten_dm
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi insertCategory() '.$e->getMessage();
        }
    }

    public function getDetailCategory($dm_id)
    {
        try {
            $sql = "SELECT * FROM danh_muc WHERE dm_id = :dm_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':dm_id' => $dm_id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getDetailCategory() '.$e->getMessage();
        }
    }

    public function updateCategory($dm_id, $ten_dm)
    {
        try {
            $sql = "UPDATE danh_muc SET ten_dm=:ten_dm WHERE dm_id=:dm_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_dm' => $ten_dm,
                ':dm_id' => $dm_id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi updateCategory() '.$e->getMessage();
        }
    }

    public function deleteCategory($dm_id)
    {
        try {
            $sql = "DELETE FROM danh_muc WHERE dm_id=:dm_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':dm_id' => $dm_id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi deleteCategory() '.$e->getMessage();
        }
    }
}
