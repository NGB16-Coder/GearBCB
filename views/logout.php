<?php

if (isset($_SESSION['taikhoan']) || isset($_SESSION['taikhoan_admin'])) {
    session_unset();
    session_destroy();
    header('location:'.BASE_URL.'?act=dang-nhap');
} else {
    header('location:'.BASE_URL);
}
