<?php

class Category
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

    
}
