<!-- Header-->
<?php include './views/layout/header.php' ?>
<!-- EndHeader-->

<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php' ?>
<style>
   <?= $Comment['an_hien'] == 1 ? 'red' : 'black'; ?>;"

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><a
              href="<?= BASE_URL_ADMIN . '?act=listComment' ?>">Quản Lý Bình Luận</a></h1>
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
           <!-- Nội dung trang quản lý bình luận -->
           <table id="example1" class="table table-bordered table-striped text-center">
    <thead>
        <tr>
            <th>ID</th>
            
            <th>Người Bình Luận</th>
            <th>Sản Phẩm</th>
            <th>Nội Dung</th>
            <th>Trạng Thái</th>
            <th>Ngày Bình Luận</th>
            <th>Ngày Cập Nhật</th>
            <th>Chức Năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listComment as $Comment): ?>
        <tr>
            <td><?= $Comment['bl_id'] ?></td>
            <td><?= ($Comment['ho_ten']) ?></td>
            <td><?= ($Comment['ten_sp']) ?></td>
            <td style="color: <?= $Comment['an_hien'] == 0 ? 'red' : 'black'; ?>;">
                <?= htmlspecialchars($Comment['noi_dung']) ?>
            </td>
            <td><?= $Comment['an_hien'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
            <td><?= $Comment['ngay_tao'] ?></td>
            <td><?= $Comment['ngay_update'] ?></td>
            <td>
                <?php if ($Comment['an_hien'] == 1): ?>
                <!-- Nút Ẩn -->
                <a href="<?= BASE_URL_ADMIN . '?act=hideComment&id=' . $Comment['bl_id'] ?>" 
                   onclick="return confirm('Bạn có chắc chắn ẩn bình luận này?')">
                    <button class="btn btn-warning btn-sm">Ẩn</button>
                </a>
                <?php else: ?>
                <!-- Nút Hiện -->
                <a href="<?= BASE_URL_ADMIN . '?act=showComment&id=' . $Comment['bl_id'] ?>" 
                   onclick="return confirm('Bạn có chắc chắn hiện bình luận này?')">
                    <button class="btn btn-success btn-sm">Hiện</button>
                </a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
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
