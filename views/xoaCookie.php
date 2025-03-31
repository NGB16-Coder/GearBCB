<?php

if (isset($_COOKIE['email']) || isset($_COOKIE['mat_khau'])) {
    setcookie("email", $email, time() - (86400 * 7));
    setcookie("mat_khau", $mat_khau, time() - (86400 * 7));
    echo '<script language="javascript">alert("Xóa thành công"); window.location="?act=dang-nhap";</script>';
} else {
    echo '<script language="javascript">alert("Không có tài khoản nào được lưu!");window.location="?act=dang-nhap";</script>';
}
