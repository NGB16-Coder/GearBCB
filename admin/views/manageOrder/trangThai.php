<!-- Header-->
<?php include './views/layout/header.php' ?>
<!-- EndHeader-->

<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><a
                            href="<?= BASE_URL_ADMIN . '?act=listCategory' ?>">Chỉnh Sửa Trạng Thái</a></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa danh mục</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form
                            action="<?= BASE_URL_ADMIN.'?act=editOrder' ?>"
                            method="post">
                            <input type="text" name="dm_id"
                                value=" <?=$chiTietOrder['ctdh_id']?>"
                                hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputCategory">Sửa Trạng Thái</label>
                                    <input type="text" class="form-control" name="ten_dm" id="exampleInputCategory"
                                        placeholder="Nhập tên danh mục"
                                        value="<?=$chiTietOrder['trang_thai']?>">
                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                    <p class="text-danger">
                                        <?= $_SESSION['error']['trang_thai'] ?>
                                    </p>
                                    <?php } ?>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php' ?>
<!-- EndFooter -->
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>