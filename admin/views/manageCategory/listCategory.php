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
              href="<?= BASE_URL_ADMIN . '?act=listCategory' ?>">Quản
              Lý Danh Mục</a></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <a class="btn"
            href="<?= BASE_URL_ADMIN.'?act=formAddCategory' ?>">
            <button class="btn btn-info">Thêm danh mục mới</button>
          </a>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listCategory as $category): ?>
                  <tr>
                    <td><?= $category['dm_id'] ?>
                    </td>
                    <td>
                      <?= $category['ten_dm'] ?>
                    </td>
                    <td>
                      <a
                        href="<?= BASE_URL_ADMIN.'?act=formEditCategory&id='.$category['dm_id'] ?>"><button
                          class="btn btn-warning">Sửa</button></a>

                      <a href="<?= BASE_URL_ADMIN.'?act=xoaCategory&id='.$category['dm_id'] ?>"
                        onclick="return confirm('Bạn có chắc chắn xóa hay không?')"><button
                          class="btn btn-danger">Xóa</button></a>
                    </td>

                  </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Thao tác</th>
                  </tr>
                </tfoot>
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