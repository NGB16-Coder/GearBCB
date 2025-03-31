<?php

class AdminSize
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSize()
    {
        try {
            $sql = 'SELECT *FROM tb_size';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAllSize() '.$e->getMessage();
        }
    }
}
