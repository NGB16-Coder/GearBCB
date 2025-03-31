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


    <main class="mb-5">
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/bancoc1.jpg">

                    </div>
                </div>
                <!-- single slider item start -->

                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/bancoc2.jpg">

                    </div>
                </div>
                <!-- single slider item start -->

                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/bancoc3.jpg">

                    </div>
                </div>
                <!-- single slider item end -->
            </div>
        </section>
        <!-- hero slider area end -->

        <!-- service policy area start -->
        <div class="service-policy section-padding">
            <div class="container">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Free Shipping</h6>
                                <p>Free shipping all order</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Support 24/7</h6>
                                <p>Support 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Money Return</h6>
                                <p>30 days for free return</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>100% Payment Secure</h6>
                                <p>We ensure secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- banner statistics area start -->
        <div class="banner-statistics-area">
            <div class="container">
                <div class="row row-20 mtn-20">
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/bancoc4.png" alt="product banner">
                            </a>

                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/bancoc5.png" alt="product banner">
                            </a>

                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/bancoc1.png" alt="product banner">
                            </a>

                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/bancoc3.png" alt="product banner">
                            </a>

                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner statistics area end -->

        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm mới</h2>
                            <p class="sub-title">Thêm sản phẩm của chúng tôi vào giỏ hàng</p>
                        </div>
                        <!-- section title end -->
                    </div>
                </div>
                <div class="row justify-content-left">
                    <?php
                        $tempProducts = []; // Mảng để lưu trữ các ID đã hiển thị
    foreach ($listProduct as $product) {
        // Kiểm tra nếu sản phẩm đã được hiển thị
        if (in_array($product['sp_id'], $tempProducts)) {
            continue; // Bỏ qua nếu sản phẩm đã hiển thị
        }
        $tempProducts[] = $product['sp_id'];?>

                    <div class="col-3 mb-4">
                        <div class="product-item text-center">
                            <a
                                href="<?php echo BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['spbt_id'].'&size_id='.$product['size_id'].'&sp_id='.$product['sp_id']; ?>">
                                <div class="product-thumb">
                                    <img src="<?php echo $product['img_sp']; ?>"
                                        alt="Ảnh sản phẩm" class="img-fluid">
                                    <!-- Thêm lớp img-fluid để hình ảnh co giãn -->
                                </div>
                                <p style="font-size: 1.3vw; font-weight:700;color:red">
                                    <?php echo number_format($product['km_sp']); ?>₫
                                    <span style="font-size: 1.1vw; text-decoration:line-through;color:gray">
                                        <?php echo number_format($product['gia_sp']); ?>₫
                                    </span>
                                </p>
                                <p style="color:burlywood; font-size:1.2vw">
                                    <?php echo $product['ten_sp']; ?>
                                </p>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </section>

        <!-- product area start -->

        <!-- product area end -->

        <!-- product banner statistics area start -->
        <section class="product-banner-statistics">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="product-banner-carousel slick-row-10">
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="assets/img/banner/bancoc1.png" alt="product banner">
                                    </a>

                                </figure>
                            </div>
                            <!-- banner single slide start -->
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="assets/img/banner/bancoc2.png" alt="product banner">
                                    </a>

                                </figure>
                            </div>
                            <!-- banner single slide start -->
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="assets/img/banner/bancoc3.png" alt="product banner">
                                    </a>

                                </figure>
                            </div>
                            <!-- banner single slide start -->
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="assets/img/banner/bancoc4.png" alt="product banner">
                                    </a>

                                </figure>
                            </div>
                            <!-- banner single slide start -->
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="assets/img/banner/bancoc5.png" alt="product banner">
                                    </a>

                                </figure>
                            </div>
                            <!-- banner single slide start -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product banner statistics area end -->

        <!-- </div> -->
        <!-- brand logo area end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php include_once "./views/layout/footer.php" ?>
    <!-- footer area end -->

    <!-- Quick view modal start -->
    <!-- Quick view modal end -->

    <!-- offcanvas mini cart start -->
    <!-- offcanvas mini cart end -->

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