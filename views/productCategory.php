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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        a,
        a:hover {
            text-decoration: none;
        }

        .product-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body>
    <!-- Start Header Area -->
    <?php include_once "views/layout/header.php" ?>
    <!-- end Header Area -->


    <main>
        <!-- hero slider area start -->
        <!-- hero slider area end -->

        <!-- service policy area start -->
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
                                    <?php foreach ($listCategory as $category) {
                                        if ($category['dm_id'] == $_GET['id']) { ?>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <?=$category['ten_dm']?>
                                    </li><?php }
                                        }; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- banner statistics area start -->
        <!-- banner statistics area end -->

        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <!-- sidebar area start -->
                    <div class="col-lg-3 order-2">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">Danh mục</h5>
                                <div class="sidebar-body">
                                    <ul class="shop-categories">
                                        <?php foreach ($listCategory as $category) {?>
                                        <li><a
                                                href="<?php echo BASE_URL.'?act=san-pham-theo-danh-muc&id='.$category['dm_id'] ?>"><?= $category['ten_dm'] ?></a>
                                        </li>
                                        <?php }; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                        </aside>
                    </div>
                    <!-- sidebar area end -->

                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1">
                        <div class="shop-product-wrapper">
                            <!-- product item list wrapper start -->
                            <div class="row justify-content-start">
                                <?php
    $tempProducts = []; // Mảng lưu trữ các ID đã hiển thị
    if (empty($productCategory)) { ?>
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted fs-4">Không có sản phẩm nào trong danh mục này.</p>
                                </div>
                                <?php } else {
                                    foreach ($productCategory as $product) {
                                        // Kiểm tra nếu sản phẩm đã được hiển thị
                                        if (in_array($product['sp_id'], $tempProducts)) {
                                            continue; // Bỏ qua nếu sản phẩm đã hiển thị
                                        }
                                        $tempProducts[] = $product['sp_id'];
                                        ?>
                                <div class="col-6 col-md-4 col-lg-3 mb-4">
                                    <div class="product-item text-center border rounded p-3 h-100">
                                        <a href="<?php echo BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['sp_id']; ?>"
                                            class="text-decoration-none">
                                            <div class="product-thumb mb-3">
                                                <img src="<?php echo $product['img_sp']; ?>"
                                                    alt="Ảnh sản phẩm" class="img-fluid rounded">
                                            </div>
                                            <div class="product-price mb-2">
                                                <?php if (!empty($product['km_sp']) && $product['km_sp'] < $product['gia_sp']) { ?>
                                                <span class="fw-bold text-danger" style="font-size: 1.3rem;">
                                                    <?php echo number_format($product['km_sp']); ?>₫
                                                </span>
                                                <span class="text-muted text-decoration-line-through"
                                                    style="font-size: 1.1rem;">
                                                    <?php echo number_format($product['gia_sp']); ?>₫
                                                </span>
                                                <?php } else { ?>
                                                <span class="fw-bold text-dark" style="font-size: 1.3rem;">
                                                    <?php echo number_format($product['gia_sp']); ?>₫
                                                </span>
                                                <?php } ?>
                                            </div>
                                            <p class="text-truncate text-warning-emphasis fw-medium"
                                                style="font-size: 1.2rem;">
                                                <?php echo htmlspecialchars($product['ten_sp']); ?>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <!-- product item list wrapper end -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </section>
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
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


<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:43 GMT -->

</html>