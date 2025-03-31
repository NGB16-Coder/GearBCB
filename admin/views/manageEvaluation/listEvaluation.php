<!-- Header-->
<?php include './views/layout/header.php' ?>
<!-- EndHeader-->

<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<style>
  <?= $Evaluation['an_hien'] == 1 ? 'red' : 'black'; ?>;
  
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><a
              href="<?= BASE_URL_ADMIN . '?act=listEvaluation' ?>">Quản Lý Đánh Giá</a></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Size</th>
                    <th>Người Đánh Giá</th>
                    <th>Nội Dung</th>
                    <th>Số Sao</th>
                    <th>Ẩn / Hiện</th>
                    <th>Ngày Tạo</th>
                    <th>Chức Năng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listEvaluation as $Evaluation): ?>
                    <tr>
                      <td><?= $Evaluation['dg_id'] ?></td>
                      <td><?= $Evaluation['ten_sp'] ?></td>
                      <td><?= $Evaluation['size_value'] ?></td>
                      <td><?= $Evaluation['ho_ten'] ?></td>
                      <td><?= $Evaluation['noi_dung'] ?></td>
                      <td><?= $Evaluation['so_sao'] ?></td>
                      <td style="color: <?= $Evaluation['an_hien'] == 0 ? 'red' : 'black'; ?>;">
                        <?= $Evaluation['an_hien'] == 1 ? 'Hiển Thị' : 'Ẩn'; ?>
                      </td>
                      <td><?= $Evaluation['ngay_tao'] ?></td>
                      <td>
                        
                        <?php if ($Evaluation['an_hien'] == 1): ?>
                          <a href="<?php echo BASE_URL_ADMIN . '?act=hideEvaluation&id=' . $Evaluation['dg_id']; ?>" class="btn btn-warning">Ẩn</a>
                        <?php else: ?>
                          <a href="<?php echo BASE_URL_ADMIN . '?act=showEvaluation&id=' . $Evaluation['dg_id']; ?>" class="btn btn-success">Hiện</a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->


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