<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header top start -->
        <div class="header-top bdr-bottom">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="welcome-message text-center">
                        <strong>Chào mừng đến Website Bán Sản Phẩm Giữ Nhiệt BAĐ</strong>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->

        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="<?= BASE_URL ?>">
                                <img src="assets/img/logo/logo-bad-cut-removebg.png" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->

                    <!-- main menu area start -->
                    <div class="col-lg-6 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <?php include_once 'views/layout/menu.php' ?>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->

                    <!-- mini cart area start -->
                    <div class="col-lg-4">
                        <div
                            class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                            <div class="header-search-container">
                                <button class="search-trigger d-xl-none d-lg-block"><i
                                        class="pe-7s-search"></i></button>
                                <form class="header-search-box d-lg-none d-xl-block" role="search" method="post">
                                    <input type="search" name="search" value="<?= $_POST['search'] ?? "" ?>" placeholder="Tìm kiếm sản phẩm" class="header-search-field">
                                    <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li class="user-hover">
                                        <a href="">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            <div>
                                                <?php if (isset($_SESSION['taikhoan'])) { ?>
                                                <p><span style="font-weight: 600;">Acc:
                                                    </span>
                                                    <a
                                                        style="font-size: 11px;" href="<?= BASE_URL.'?act=info-Acc&id='.$tk_id ?>"><?=$_SESSION['taikhoan']?></a>

                                                </p>
                                                <br>
                                                <p><a style="font-size: 14px;"
                                                        href="<?=BASE_URL.'?act=dang-xuat'?>"
                                                        onclick="return confirm('Bạn muốn đăng xuất?')">Đăng xuất</a>
                                                </p>

                                                <?php } elseif (isset($_SESSION['taikhoan_admin'])) { ?>

                                                <p><span style="font-weight: 600;">Acc:
                                                    </span><span
                                                        style="font-size: 11px;"><?=$_SESSION['taikhoan_admin']?></span>
                                                </p>
                                                <br>
                                                <span><a style="font-size: 14px;"
                                                        href="<?=BASE_URL.'?act=dang-xuat'?>"
                                                        onclick="return confirm('Bạn muốn đăng xuất?')">Đăng
                                                        xuất</a></span> <br> <br>
                                                <span><a style="font-size: 14px;"
                                                        href="<?=BASE_URL_ADMIN?>">Quay
                                                        lại admin</a></span>
                                                <?php } else { ?>
                                                <li><a
                                                        href="<?= BASE_URL.'?act=dang-nhap'?>">Đăng
                                                        nhập</a></li>
                                                <li><a
                                                        href="<?= BASE_URL.'?act=dang-ky'?>">Đăng
                                                        ký</a></li>
                                                <?php } ?>
                                            </div>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="<?= BASE_URL.'?act=gio-hang' ?>"
                                            class="minicart-btn">
                                            <i class="pe-7s-shopbag"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mini cart area end -->

                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

    <!-- mobile header start -->
    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <a href="<?= BASE_URL ?>">
                                <img src="assets/img/logo/logo-bad-cut-removebg.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li class="user-hover">
                                        <a href="">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            <div>
                                                <?php if (isset($_SESSION['taikhoan'])) { ?>
                                                <p><span style="font-weight: 600;">Acc:
                                                    </span><a href="my-account.html"
                                                        style="font-size: 11px;"><?=$_SESSION['taikhoan']?></a>
                                                </p>
                                                <br>
                                                <p><a style="font-size: 14px;"
                                                        href="<?=BASE_URL.'?act=dang-xuat'?>"
                                                        onclick="return confirm('Bạn muốn đăng xuất?')">Đăng xuất</a>
                                                </p>

                                                <?php } elseif (isset($_SESSION['taikhoan_admin'])) { ?>

                                                <p><span style="font-weight: 600;">Acc:
                                                    </span><span
                                                        style="font-size: 11px;"><?=$_SESSION['taikhoan_admin']?></span>
                                                </p>
                                                <br>
                                                <span><a style="font-size: 14px;"
                                                        href="<?=BASE_URL.'?act=dang-xuat'?>"
                                                        onclick="return confirm('Bạn muốn đăng xuất?')">Đăng
                                                        xuất</a></span> <br> <br>
                                                <span><a style="font-size: 14px;"
                                                        href="<?=BASE_URL_ADMIN?>">Quay
                                                        lại admin</a></span>
                                                <?php } else { ?>
                                                <li><a
                                                        href="<?= BASE_URL.'?act=dang-nhap'?>">Đăng
                                                        nhập</a></li>
                                                <li><a
                                                        href="<?= BASE_URL.'?act=dang-ky'?>">Đăng
                                                        ký</a></li>
                                                <?php } ?>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="mini-cart-wrap">
                                <a href="cart.html">
                                    <i class="pe-7s-shopbag"></i>
                                    <div class="notification">0</div>
                                </a>
                            </div>
                            <button class="mobile-menu-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->
    <!-- mobile header end -->

    <!-- offcanvas mobile menu start -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="pe-7s-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search Here...">
                        <button class="search-btn"><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a
                                    href="<?= BASE_URL ?>">Trang
                                    chủ</a>
                            </li>
                            <?php foreach ($listCategory as $category) {?>
                            <li class="menu-item-has-children "><a
                                    href="<?php echo BASE_URL.'?act=san-pham-theo-danh-muc&id='.$category['dm_id'] ?>"><?= $category['ten_dm'] ?></a>
                            </li>
                            <?php }; ?>
                            <li><a
                                    href="<?= BASE_URL.'?act=lien-he'?>">liên
                                    hệ</a>
                            </li>
                            <li><a
                                    href="<?= BASE_URL.'?act=gioi-thieu'?>">Về
                                    chúng tôi</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">0123456789</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">info@yourdomain.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- offcanvas mobile menu end -->
</header>