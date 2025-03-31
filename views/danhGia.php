<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:03 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lịch sử đơn hàng</title>
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
    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 5px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #f5c518;
        }
    </style>
</head>

<body>
    <!-- Start Header Area -->
    <?php include_once "views/layout/header.php" ?>
    <!-- end Header Area -->


    <main>
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
                                    <li class="breadcrumb-item active" aria-current="page">Đánh giá sản phẩm</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row justify-content-center">
                    <!-- Login Content Start -->
                    <div class="col-lg-12 ">
                        <div class="card-body">
                            <!-- reviewForm.php -->
                            <h3>Đánh Giá Sản Phẩm</h3>
                            <form method="post"
                                action="<?= BASE_URL. '?act=addEvaluation'?>">
                                <?php 
                                // var_dump($orderDetails);var_dump($tk_id);die;
                                foreach ($orderDetails as $product): ?>
                                <div class="row mt-4">
                                    <div class="col-3">
                                        <img style="max-width:100%"
                                            src="<?= $product['img_sp'] ?>"
                                            alt="<?= $product['ten_sp'] ?>" />
                                    </div>
                                    <div class="col-9">
                                    <h3><?= $product['ten_sp'] ?>
                                        (Số lượng:
                                        <?= $product['so_luong_mua'] ?>)
                                        <input type="hidden" name="orderDetails[<?= $product['spbt_id'] ?>][spbt_id]" value="<?= $product['spbt_id'] ?>">
                                        <input type="hidden" name="orderDetails[<?= $product['spbt_id'] ?>][sp_id]" value="<?= $product['sp_id'] ?>">
                                        <input type="hidden" name="orderDetails[<?= $product['spbt_id'] ?>][size_id]" value="<?= $product['size_id'] ?>">
                                    </h3>
                                        <div class="form-group row">
                                            <div class="col">
                                                <label class="col-form-label">
                                                    <span class="text-danger">*</span> Nội dung đánh giá
                                                </label>
                                                <textarea name="orderDetails[<?= $product['spbt_id'] ?>][noi_dung]" class="form-control" rows="3"
                                                    placeholder="Nhập đánh giá của bạn..."></textarea>
                                            </div>
                                        </div>

                                        <!-- Số sao đánh giá -->
                                        <div class="form-group row">
                                            <div class="col">
                                                <label class="col-form-label">
                                                    <span class="text-danger">*</span> Số sao
                                                </label>
                                                <div class="star-rating">
                                                    <input type="radio"
                                                        id="star5-<?= $product['spbt_id'] ?>"
                                                        name="orderDetails[<?= $product['spbt_id'] ?>][so_sao]"
                                                        value="5" checked>
                                                    <label
                                                        for="star5-<?= $product['spbt_id'] ?>"
                                                        title="5 sao">&#9733;</label>

                                                    <input type="radio"
                                                        id="star4-<?= $product['spbt_id'] ?>"
                                                        name="orderDetails[<?= $product['spbt_id'] ?>][so_sao]"
                                                        value="4">
                                                    <label
                                                        for="star4-<?= $product['spbt_id'] ?>"
                                                        title="4 sao">&#9733;</label>

                                                    <input type="radio"
                                                        id="star3-<?= $product['spbt_id'] ?>"
                                                        name="orderDetails[<?= $product['spbt_id'] ?>][so_sao]"
                                                        value="3">
                                                    <label
                                                        for="star3-<?= $product['spbt_id'] ?>"
                                                        title="3 sao">&#9733;</label>

                                                    <input type="radio"
                                                        id="star2-<?= $product['spbt_id'] ?>"
                                                        name="orderDetails[<?= $product['spbt_id'] ?>][so_sao]"
                                                        value="2">
                                                    <label
                                                        for="star2-<?= $product['spbt_id'] ?>"
                                                        title="2 sao">&#9733;</label>

                                                    <input type="radio"
                                                        id="star1-<?= $product['spbt_id'] ?>"
                                                        name="orderDetails[<?= $product['spbt_id'] ?>][so_sao]"
                                                        value="1">
                                                    <label
                                                        for="star1-<?= $product['spbt_id'] ?>"
                                                        title="1 sao">&#9733;</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach; ?>
                                <input type="hidden" name="tk_id" value="<?= $tk_id ?>">  
                                <input type="hidden" name="order_id" value="<?= $order_id ?>">  
                                <p class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success mt-3">Gửi Đánh Giá</button>
                                </p>
                            </form>

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


<!-- Mirrored from htmldemo.net/corano/corano/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:03 GMT -->

</html>