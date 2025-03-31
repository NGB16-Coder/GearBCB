<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:01 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Giỏ hàng</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="assets/css/plugins/jqueryui.min.css">
    <!-- main style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Start Header Area -->
    <?php include_once "views/layout/header.php" ?>
    <!-- end Header Area -->

    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="<?= BASE_URL?>"><i
                                                class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row justify-content-center">
                    <!-- Login Content Start -->
                    <div class="col-lg-12 ">
                        <div class="card-body">
                            <?php if (!empty($cartItems)): ?>
                            <form method="POST"
                                action="<?= BASE_URL . '?act=thanh-toan&id='.$tk_id ?>">
                                <table id="example1" class="table table-bordered table-striped"
                                    style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th><input style="width:15px;height:15px;" type="checkbox" id="select-all">
                                                Chọn tất cả</th>
                                            <th>Ảnh sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Size</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tongTatCaTien = 0;
                                foreach ($cartItems as $item):
                                    $thanhTien = $item['km_sp'] * $item['so_luong'];
                                    $tongTatCaTien += $thanhTien;
                                    ?>
                                        <tr>
                                            <td>
                                                <input style="width:20px;height:20px;" type="checkbox"
                                                    class="select-product" name="select-product[]"
                                                    data-price="<?= $item['km_sp'] * $item['so_luong'] ?>"
                                                    value="<?= $item['id'] ?>">
                                            </td>
                                            <td><img style="max-width: 100px;"
                                                    src="<?= $item['img_sp'] ?>"
                                                    alt="Ảnh sản phẩm"></td>
                                            <td>
                                                <p style="font-size: 1.1vw;">
                                                    <?= $item['ten_sp'] ?>
                                                </p>
                                            </td>
                                            <td><?= $item['size_value'] ?>
                                            </td>
                                            <td>
                                                <p style="font-size: 1.3vw; font-weight:700;color:red">
                                                    <?= number_format($item['km_sp']) ?>₫
                                                </p>
                                                <p style="font-size: 1.1vw; text-decoration:line-through;color:gray">
                                                    <?= number_format($item['gia_sp']) ?>₫
                                                </p>
                                            </td>
                                            <td><?= $item['so_luong'] ?>
                                            </td>
                                            <td class="thanh-tien"
                                                style="font-size: 1.1vw; font-weight:400;color:green">
                                                <?= number_format($thanhTien) ?>₫
                                            </td>
                                            <td>
                                                <a href="<?= BASE_URL . '?act=xoa-gio-hang&id='.$item['id'] ?>"
                                                    class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" style="text-align:right; font-weight:bold;">Tổng tiền các
                                                sản phẩm đã chọn:</td>
                                            <td style="font-size: 1.1vw; font-weight:700;color:green"
                                                id="tongTienDaChon">0₫</td>
                                            <td>
                                                <button type="submit" id="thanh-toan-link" class="btn btn-success">Thanh
                                                    toán</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </form>
                            <?php else: ?>
                            <div
                                style="text-align: center; margin: 20px; font-size: 1.5rem; font-weight: bold; margin-bottom:20vw">
                                Giỏ hàng chưa có sản phẩm
                            </div>
                            <?php endif; ?>
                            <p class="d-flex justify-content-end"><a
                                    href="<?= BASE_URL . '?act=lich-su-don&id=' . $tk_id ?>"
                                    style="text-decoration: none; font-size:1.2vw" class="btn btn-info">Lịch sử đơn
                                    hàng</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php include_once "./views/layout/footer.php" ?>
    <!-- footer area end -->
    <!-- JS
============================================ -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll(".select-product"); // Lấy danh sách các checkbox
            const selectAllCheckbox = document.getElementById("select-all"); // Checkbox "Chọn tất cả"
            const totalSelectedElement = document.getElementById(
                "tongTienDaChon"); // Hiển thị tổng tiền đã chọn
            const thanhToanLink = document.getElementById("thanh-toan-link"); // Link Thanh toán

            // Hàm cập nhật tổng tiền và trạng thái nút
            function updateTotalSelected() {
                let total = 0; // Tổng tiền
                let hasChecked = false; // Kiểm tra checkbox được chọn

                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        total += parseInt(checkbox.getAttribute("data-price")); // Tính tổng tiền
                        hasChecked = true; // Có ít nhất 1 sản phẩm được chọn
                    }
                });

                // Cập nhật hiển thị tổng tiền
                totalSelectedElement.textContent = total.toLocaleString() + "₫";

                // Vô hiệu hóa/thay đổi trạng thái nút Thanh toán
                if (hasChecked) {
                    thanhToanLink.classList.remove("disabled");
                    thanhToanLink.style.pointerEvents = "auto"; // Cho phép click
                } else {
                    thanhToanLink.classList.add("disabled");
                    thanhToanLink.style.pointerEvents = "none"; // Ngăn không cho click
                }
            }

            // Xử lý checkbox "Chọn tất cả"
            selectAllCheckbox.addEventListener("change", function() {
                const isChecked = this.checked;
                checkboxes.forEach(checkbox => {
                    checkbox.checked = isChecked;
                });
                updateTotalSelected(); // Cập nhật tổng tiền và trạng thái nút
            });

            // Xử lý từng checkbox sản phẩm
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", function() {
                    if (!this.checked) {
                        selectAllCheckbox.checked = false; // Bỏ chọn "Chọn tất cả"
                    }
                    if (Array.from(checkboxes).every(cb => cb.checked)) {
                        selectAllCheckbox.checked =
                            true; // Chọn "Chọn tất cả" nếu tất cả được chọn
                    }
                    updateTotalSelected();
                });
            });

            // Ngăn liên kết "Thanh toán" hoạt động nếu không có sản phẩm được chọn
            thanhToanLink.addEventListener("click", function(event) {
                if (thanhToanLink.classList.contains("disabled")) {
                    event.preventDefault(); // Ngăn chặn hành động click
                    alert("Vui lòng chọn ít nhất một sản phẩm để thanh toán!");
                }
            });

            // Cập nhật trạng thái ban đầu
            updateTotalSelected();
        });
    </script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="assets/js/plugins/image-zoom.min.js"></script>
    <!-- Images loaded JS -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- mail-chimp active js -->
    <script src="assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from htmldemo.net/corano/corano/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:01 GMT -->

</html>