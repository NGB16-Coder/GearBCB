<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:03 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Website bán sản phẩm giữ nhiệt BAĐ</title>
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
                                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <form action="<?= BASE_URL . '?act=xac-nhan-don&id='.$tk_id ?>" method="post">
                    <div class="row">
                        <!-- Checkout Billing Details -->
                        <div class="col-lg-6">
                            <div class="checkout-billing-details-wrap">
                                <h5 class="checkout-title">Thông tin thanh toán</h5>
                                <div class="billing-form-wrap">
                                    <div class="single-input-item">
                                        <label for="ho_ten">Họ và tên</label>
                                        <input type="text" placeholder="Tên đăng nhập" name="ho_ten"
                                            value="<?= $TKById['ho_ten'] ?>"
                                            readonly>
                                    </div>
                                    <div class="single-input-item">
                                        <label for="email">Email</label>
                                        <input type="email" placeholder="email@gmail.com" name="email"
                                            value="<?= $TKById['email'] ?>"
                                            readonly>

                                    </div>
                                    <div class="single-input-item">
                                        <label for="sdt">Số điện thoại</label>
                                        <input type="text" placeholder="Số điện thoại" name="sdt"
                                            value="<?= $TKById['sdt'] ?>"
                                            readonly>
                                    </div>
                                    <div class="single-input-item">
                                        <label for="dia_chi">Địa chỉ nơi trốn</label>
                                        <input type="text" placeholder="Địa chỉ nơi trốn" name="dia_chi"
                                            value="<?= $TKById['dia_chi'] ?>"
                                            readonly>
                                    </div>


                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="ship_to_different">
                                                <label class="custom-control-label" for="ship_to_different">Gửi đến
                                                    địa chỉ khác?</label>
                                            </div>
                                        </div>
                                        <div class="ship-to-different single-form-row">
                                            <div class="single-input-item">
                                                <input type="text" placeholder="Tên người nhận" name="ten_nhan" value="">
                                            </div>
                                            <div class="single-input-item">
                                                <input type="text" placeholder="Số điện thoại người nhận" name="sdt_nhan" value="">
                                            </div>
                                            <div class="single-input-item">
                                                <input type="text" placeholder="Địa chỉ người nhận" name="dia_chi_nhan" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Summary Details -->
                        <div class="col-lg-6">
                            <div class="order-summary-details">
                                <h5 class="checkout-title">Tóm tắt đơn hàng của bạn</h5>
                                <div class="order-summary-content">
                                    <!-- Order Summary Table -->
                                    <div class="order-summary-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><b>Tên sản phẩm</b></th>
                                                    <th><b>Số lượng</b></th>
                                                    <th><b>Size</b></th>
                                                    <th><b>Giá</b></th>
                                                    <th><b>Tổng</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                        $tongTien = 0;
                            foreach ($selectedItems as $item):
                                $thanhTien = $item['km_sp'] * $item['so_luong'];
                                $tongTien += $thanhTien;
                                ?>
                                                <tr>
                                                    <td><?= $item['ten_sp'] ?>
                                                    </td>
                                                    <td><?= $item['so_luong'] ?>
                                                    </td>
                                                    <td><?= $item['size_value'] ?>
                                                    </td>
                                                    <td><?= number_format($item['km_sp']) ?>₫
                                                    </td>
                                                    <td><?= number_format($thanhTien) ?>₫
                                                    </td>
                                                    <input type="hidden" name="select-product[]" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="product-quantity[<?= $item['id'] ?>]" value="<?= $item['so_luong'] ?>">
                                    <input type="hidden" name="product-price[<?= $item['id'] ?>]" value="<?= $item['km_sp'] ?>">
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" style="text-align:right; font-size: 1.2vw;"><b>Tổng
                                                            tiền:</b>
                                                    </td>
                                                    <td><strong style="font-size: 1.2vw; font-weight:700;color:green"><?= number_format($tongTien) ?>₫</strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <input type="hidden" name="total_amount" value="<?= $tongTien ?>">
                                    <!-- Order Payment Method -->
                                    <div class="order-payment-method">
                                        <div class="single-payment-method show">
                                            <div class="payment-method-name">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                                        class="custom-control-input" checked />
                                                    <label class="custom-control-label" for="cashon">Thanh toán khi nhận
                                                        hàng</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="summary-footer-area">
                                            <button type="submit" class="btn btn-sqr">Đặt hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <?php include_once "./views/layout/footer.php" ?>
    <!-- JS
============================================ -->

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


<!-- Mirrored from htmldemo.net/corano/corano/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:01 GMT -->

</html>