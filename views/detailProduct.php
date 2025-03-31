<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:00 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Corano - Jewelry Shop eCommerce Bootstrap 5 Template</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <!-- Start Header Area -->
    <?php
    include "views/layout/header.php"
    ?>
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
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết
                                        <?= $product['ten_sp'] ?>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        <div class="pro-large-img img-zoom">
                                            <img src="<?= $product['img_sp'] ?>"
                                                alt="product-details" />

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 ms-3">
                                    <div class="product-details-des">
                                        <h2 class="product-name">
                                            <?= $product['ten_sp'] ?>
                                        </h2>
                                        <div class="ratings d-flex">
                                            
                                            <?php
                                            $sosao = round($sosaoData['sosao'], 1); // Làm tròn đến 1 chữ số
    $sodanhgia = $sosaoData['sodanhgia'];
                                            echo'<h5>'. $sosao .'/5&nbsp</h5>';
    // Hiển thị ngôi sao (đầy hoặc trống)
    for ($i = 1; $i <= 5; $i++): ?>
                                            <?php if ($i <= floor($sosao)): ?>
                                            <span><i class="fa fa-star"></i></span> <!-- Sao đầy -->
                                            <?php elseif ($i - $sosao < 1): ?>
                                            <span><i class="fa fa-star-half-o"></i></span> <!-- Sao nửa -->
                                            <?php else: ?>
                                            <span><i class="fa fa-star-o"></i></span> <!-- Sao trống -->
                                            <?php endif; ?>
                                            <?php endfor; ?>
                                            <div class="pro-review">
                                                <span><?= $sodanhgia ?>
                                                    Đánh giá</span>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h6>Danh mục:
                                                <b><?= $product['ten_dm'] ?></b>
                                            </h6>
                                        </div>
                                        <p class="pro-desc">
                                            <?= $product['mo_ta'] ? $product['mo_ta'] : "Không có mô tả" ?>
                                        </p>
                                        <form method="POST"
                                            action="<?= BASE_URL . '?act=them-vao-gio-hang' ?>">
                                            <h6 class="option-title">Size:</h6>
                                            <div class="row">
                                                <?php foreach ($variants as $variant): ?>
                                                <button type="button" class="btn btn-info ms-2 size-btn"
                                                    style="width:50px"
                                                    data-size-id="<?= $variant['size_id'] ?>"
                                                    data-price="<?= $variant['gia_sp'] ?>"
                                                    data-discount="<?= $variant['km_sp'] ?>"
                                                    data-stock="<?= $variant['so_luong'] ?>"
                                                    data-spbt-id="<?= $variant['spbt_id'] ?>">
                                                    <?= $variant['size_value'] ?>
                                                </button>
                                                <?php endforeach; ?>
                                            </div>

                                            <!-- Các input bên trong form -->
                                            <input type="hidden" class="selected-spbt-id" name="spbt_id"
                                                value="<?= $selectedVariant['spbt_id'] ?>">
                                            <input type="hidden" class="selected-size-id" name="size_id"
                                                value="<?= $selectedVariant['size_id'] ?>">

                                            <div class="price-box mt-3">
                                                <span id="selected-price" class="price-regular"
                                                    style="font-size: 1.3vw; font-weight:700;color:red">
                                                    <?= number_format($selectedVariant['km_sp'] ?: $selectedVariant['gia_sp']) ?>₫
                                                </span>
                                                <?php if ($selectedVariant['km_sp']): ?>
                                                <span id="original-price"
                                                    style="font-size:1.1vw;text-decoration:line-through;color:grey;">
                                                    <?= number_format($selectedVariant['gia_sp']) ?>₫
                                                </span>
                                                <?php endif; ?>

                                                <h6 class="option-title mt-3">Còn:
                                                    <span id="selected-stock" style="font-weight: 700;">
                                                        <?= $selectedVariant['so_luong'] ?>
                                                    </span> sản phẩm
                                                </h6>
                                            </div>

                                            <div class="quantity-cart-box mt-2">
                                                <h6 class="option-title">Số lượng:</h6>
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="number" id="quantity-input" name="so_luong"
                                                            value="1" min="1"
                                                            max="<?= $selectedVariant['so_luong'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <br> <br>
                                            <button type="submit" class="btn btn-cart2" id="add-to-cart-btn">Thêm
                                                vào giỏ hàng</button>
                                        </form>

                                        <!-- Các input ngoài form -->
                                        <input type="hidden" class="selected-spbt-id"
                                            value="<?= $selectedVariant['spbt_id'] ?>">
                                        <input type="hidden" class="selected-size-id"
                                            value="<?= $selectedVariant['size_id'] ?>">




                                        <div class="like-icon">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_one">Xem Đánh Giá</a>
                                            </li>

                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_two">Xem Bình Luận</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_three">Bình Luận</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <!-- hiển thị đánh giá -->
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <h6 class="text-secondary mb-3">
                                                    <i class="bi bi-star-fill me-2"></i>Danh sách đánh giá
                                                </h6>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Nội Dung</th>
                                                            <th scope="col">Số Sao</th>
                                                            <th scope="col">Size</th>
                                                            <th scope="col">Người Đánh Giá</th>
                                                            <th scope="col">Ngày Đánh Giá</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($listEvaluation)): ?>
                                                        <?php foreach ($listEvaluation as $Evaluation): ?>
                                                        <tr>
                                                            <td><?php echo htmlspecialchars($Evaluation['noi_dung']); ?>
                                                            </td>
                                                            <td><?php echo htmlspecialchars($Evaluation['so_sao']); ?>
                                                                Sao</td>
                                                            <td><?php echo htmlspecialchars($Evaluation['size_value']); ?>
                                                            </td>
                                                            <td><?php echo htmlspecialchars($Evaluation['ho_ten']); ?>
                                                            </td>
                                                            <td>
                                                                <span>
                                                                    <?php echo date('d-m-Y', strtotime($Evaluation['ngay_tao'])); ?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                        <?php else: ?>
                                                        <tr>
                                                            <td colspan="4" class="text-center text-danger">
                                                                <i class="bi bi-exclamation-circle-fill"></i> Không có
                                                                đánh giá nào!
                                                            </td>
                                                        </tr>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- Phần hiển thị comment -->
                                            <div class="tab-pane fade" id="tab_two">
                                                <div class="tab-comments mt-4">
                                                    <h6 class="text-secondary mb-3">
                                                        <i class="bi bi-chat-left-text-fill me-2"></i>Danh sách bình
                                                        luận
                                                    </h6>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>

                                                                <th scope="col">Nội Dung</th>
                                                                <th scope="col">Người Bình Luận</th>
                                                                <th scope="col">Ngày Bình Luận</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($listComment)): ?>
                                                            <?php foreach ($listComment as $index => $comment): ?>
                                                            <tr>

                                                                <td scope="row">
                                                                    <?php echo htmlspecialchars($comment['noi_dung']); ?>
                                                                </td>
                                                                <td scope="row">
                                                                    <?php echo htmlspecialchars($comment['ho_ten']); ?>
                                                                </td>
                                                                <td scope="row">
                                                                    <span>
                                                                        <?php echo date('d-m-Y', strtotime($comment['ngay_tao'])); ?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                            <?php else: ?>
                                                            <tr>
                                                                <td colspan="4" class="text-center text-danger">
                                                                    <i class="bi bi-exclamation-circle-fill"></i> Không
                                                                    có bình luận nào!
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>


                                                </div>

                                            </div>

                                            <!-- Phần Người Dùng Comment -->
                                            <div class="tab-pane fade" id="tab_three">
                                                <form
                                                    action="<?php echo BASE_URL . '?act=addBinhLuan'; ?>"
                                                    method="POST" class="review-form">
                                                    <input type="hidden" id="selected-spbt-id" name="spbt_id"
                                                        value="<?= $selectedVariant['spbt_id'] ?>">
                                                    <input type="hidden" id="selected-size-id" name="size_id"
                                                        value="<?= $selectedVariant['size_id'] ?>">
                                                    <input type="hidden" name="sp_id"
                                                        value="<?= $sp_id ?>">

                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label">
                                                                <span class="text-danger">*</span> Nội dung bình luận
                                                            </label>
                                                            <textarea name="noi_dung" class="form-control" rows="3"
                                                                placeholder="Nhập bình luận của bạn..."
                                                                required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="buttons mt-3">
                                                        <button class="btn btn-sqr btn-primary" type="submit">Gửi bình
                                                            luận</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">SẢN PHẨM LIÊN QUAN</h2>
                            <p class="sub-title">Hãy tham khảo thêm một số mẫu liên quan</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->

                            <?php
                            $tempProducts = []; // Mảng để lưu trữ các ID đã hiển thị
    foreach ($productCategory as $product) {
        // Kiểm tra nếu sản phẩm đã được hiển thị
        if (in_array($product['sp_id'], $tempProducts)) {
            continue; // Bỏ qua nếu sản phẩm đã hiển thị
        }
        $tempProducts[] = $product['sp_id']; ?>
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a
                                        href="<?php echo BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['spbt_id'].'&size_id='.$product['size_id'].'&sp_id='.$product['sp_id']; ?>">
                                        <img src="<?php echo $product['img_sp']; ?>"
                                            alt="Ảnh sản phẩm" class="img-fluid">
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
                                </figure>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php
    include "views/layout/footer.php"
    ?>
    <!-- footer area end -->

    <!-- JS
============================================ -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sizeButtons = document.querySelectorAll('.size-btn'); // Lấy tất cả nút size

            sizeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Lấy dữ liệu từ các thuộc tính data-
                    const sizeId = this.dataset.sizeId;
                    const price = parseInt(this.dataset.price);
                    const discount = parseInt(this.dataset.discount || 0);
                    const stock = parseInt(this.dataset.stock);
                    const spbtId = this.dataset.spbtId;

                    // Cập nhật tất cả các input có class tương ứng (trong và ngoài form)
                    document.querySelectorAll('.selected-size-id').forEach(input => {
                        input.value = sizeId;
                    });

                    document.querySelectorAll('.selected-spbt-id').forEach(input => {
                        input.value = spbtId;
                    });

                    // Cập nhật giá và giá khuyến mãi
                    const selectedPrice = document.getElementById('selected-price');
                    const originalPrice = document.getElementById('original-price');
                    const selectedStock = document.getElementById('selected-stock');
                    const quantityInput = document.getElementById('quantity-input');
                    const addToCartBtn = document.getElementById('add-to-cart-btn');

                    if (discount > 0) {
                        selectedPrice.textContent = discount.toLocaleString() + '₫';
                        originalPrice.textContent = price.toLocaleString() + '₫';
                        originalPrice.style.display = 'inline';
                    } else {
                        selectedPrice.textContent = price.toLocaleString() + '₫';
                        originalPrice.style.display = 'none';
                    }

                    // Cập nhật số lượng sản phẩm
                    selectedStock.textContent = stock;
                    quantityInput.max = stock;
                    quantityInput.value = stock > 0 ? 1 :
                        0; // Reset số lượng về 1 hoặc 0 nếu hết hàng
                    addToCartBtn.disabled = stock === 0; // Vô hiệu hóa nút nếu hết hàng
                });
            });
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


<!-- Mirrored from htmldemo.net/corano/corano/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:00 GMT -->

</html>