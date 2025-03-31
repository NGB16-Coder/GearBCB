<?php

class Taikhoan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM taikhoan WHERE email= :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $taikhoan = $stmt->fetch();
            // var_dump($taikhoan);
            if ($email == "" || $mat_khau == "") {
                return "Vui lòng nhập đầy đủ email và mật khẩu!";
            } elseif (($email === $taikhoan['email']) && ($mat_khau === $taikhoan['mat_khau'])) {
                if ($taikhoan['role'] === 0) {
                    return $taikhoan['email']; // đăng nhập vào trang admin

                } else {
                    return 'Trang client'; // đăng nhập vào trang client
                }
            } else {
                return "Sai tài khoản hoặc mật khẩu!";
            }
        } catch (Exception $e) {
            echo 'Lỗi checkLogin() '.$e->getMessage();
            return false;
        }
    }

    public function inserttaikhoan($ho_ten, $email, $sdt, $dia_chi, $mat_khau)
    {
        try {
            $sql = "INSERT INTO taikhoan(ho_ten, email, sdt, dia_chi, mat_khau) 
                    VALUES (:ho_ten,:email,:sdt,:dia_chi,:mat_khau)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':sdt' => $sdt,
                ':dia_chi' => $dia_chi,
                ':mat_khau' => $mat_khau,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi insettaikhoan() '.$e->getMessage();
        }
    }

    public function getAlltaikhoan()
    {
        try {
            $sql = "SELECT * FROM taikhoan";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi getAlltaikhoan() '.$e->getMessage();
        }
    }

    public function getTKById($tk_id)
    {
        try {
            $sql = "SELECT * FROM taikhoan WHERE tk_id = :tk_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi getTKById() '.$e->getMessage();
        }
    }

    public function editInfo($tk_id, $ho_ten, $sdt, $email, $dia_chi, $mat_khau)
    {
        try {
            $sql = "UPDATE taikhoan SET ho_ten=:ho_ten, dia_chi=:dia_chi, email=:email, sdt=:sdt, mat_khau=:mat_khau 
                    WHERE tk_id = :tk_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tk_id' => $tk_id,
                ':ho_ten' => $ho_ten,
                ':dia_chi' => $dia_chi,
                ':email' => $email,
                ':sdt' => $sdt,
                ':mat_khau' => $mat_khau,
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi editInfo() '.$e->getMessage();
        }
    }
}
