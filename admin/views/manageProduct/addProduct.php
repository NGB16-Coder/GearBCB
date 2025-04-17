<!-- Header -->
<?php require './views/layout/header.php'; ?>
<!-- End Header -->

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- End Navbar -->

<!-- Sidebar -->
<?php include './views/layout/sidebar.php'; ?>
<!-- End Sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><a href="<?= BASE_URL_ADMIN . '?act=listProduct' ?>">Quản
                            Lý Sản Phẩm</a></h1>
                </div>

            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Sản Phẩm</h3>

                        </div>
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=addProduct' ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="card-body row">
                                <!-- Tên sản phẩm -->
                                <div class="form-group col-12">
                                    <label for="ten_sp">Tên Sản Phẩm</label>
                                    <input type="text" name="ten_sp" class="form-control" id="ten_sp"
                                        placeholder="Tên Sản Phẩm"
                                        value="<?= isset($_SESSION['old']['ten_sp']) ? htmlspecialchars($_SESSION['old']['ten_sp']) : '' ?>">
                                    <?php if (isset($_SESSION['error']['ten_sp'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ten_sp'] ?></p>
                                    <?php } ?>
                                </div>

                                <!-- Giá -->
                                <div class="form-group col-6">
                                    <label for="gia_sp">Giá Sản Phẩm</label>
                                    <input type="number" name="gia_sp" min="0" class="form-control" id="gia_sp"
                                        placeholder="Giá"
                                        value="<?= isset($_SESSION['old']['gia_sp']) ? htmlspecialchars($_SESSION['old']['gia_sp']) : '' ?>">
                                    <?php if (isset($_SESSION['error']['gia_sp'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia_sp'] ?></p>
                                    <?php } ?>
                                </div>

                                <!-- Giá khuyến mãi -->
                                <div class="form-group col-6">
                                    <label for="km_sp">Giá Khuyến Mãi</label>
                                    <input type="number" name="km_sp" min="0" class="form-control" id="km_sp"
                                        placeholder="Giá Khuyến Mãi"
                                        value="<?= isset($_SESSION['old']['km_sp']) ? htmlspecialchars($_SESSION['old']['km_sp']) : '' ?>">
                                    <?php if (isset($_SESSION['error']['km_sp'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['km_sp'] ?></p>
                                    <?php } ?>
                                </div>

                                <!-- Danh mục -->
                                <div class="form-group col-6">
                                    <label for="dm_id">Thuộc Danh Mục</label>
                                    <select class="form-control" name="dm_id" id="dm_id">
                                        <option disabled <?= !isset($_SESSION['old']['dm_id']) ? 'selected' : '' ?>>
                                            Chọn danh mục sản phẩm
                                        </option>
                                        <?php foreach ($listCategory as $danhMuc): ?>
                                            <option value="<?= $danhMuc['dm_id'] ?>" <?= (isset($_SESSION['old']['dm_id']) && $_SESSION['old']['dm_id'] == $danhMuc['dm_id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($danhMuc['ten_dm']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($_SESSION['error']['dm_id'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['dm_id'] ?></p>
                                    <?php } ?>
                                </div>

                                <!-- Ảnh sản phẩm -->
                                <div class="mb-3 col-6">
                                    <label for="img_sp" class="form-label">Ảnh sản phẩm</label>
                                    <input type="file" name="img_sp" class="form-control" id="img_sp">
                                    <?php if (isset($_SESSION['error']['img_sp'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['img_sp'] ?></p>
                                    <?php } ?>
                                </div>

                                <!-- Số lượng -->
                                <div class="form-group col-6">
                                    <label for="so_luong">Số lượng</label>
                                    <input type="number" name="so_luong" min="0" class="form-control" id="so_luong"
                                        placeholder="Số lượng"
                                        value="<?= isset($_SESSION['old']['so_luong']) ? htmlspecialchars($_SESSION['old']['so_luong']) : '' ?>">
                                    <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                    <?php } ?>
                                </div>

                                <!-- Mô tả -->
                                <div class="form-group col-12">
                                    <label for="mo_ta">Mô tả Sản Phẩm</label>
                                    <input type="text" name="mo_ta" class="form-control" id="mo_ta"
                                        placeholder="Mô tả Sản Phẩm"
                                        value="<?= isset($_SESSION['old']['mo_ta']) ? htmlspecialchars($_SESSION['old']['mo_ta']) : '' ?>">
                                    <?php if (isset($_SESSION['error']['mo_ta'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['mo_ta'] ?></p>
                                    <?php } ?>
                                </div>



                                <!-- Nút submit -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

</body>

</html>