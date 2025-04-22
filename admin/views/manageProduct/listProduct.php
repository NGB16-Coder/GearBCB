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
              href="<?= BASE_URL_ADMIN . '?act=listProduct' ?>">Quản
              Lý Sản Phẩm</a></h1>
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
            href="<?= BASE_URL_ADMIN.'?act=formAddProduct'; ?>">
            <button class="btn btn-info">Thêm sản phẩm mới</button>
          </a>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Danh mục</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Giá KM</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Ẩn/Hiện</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listProduct as $product): ?>
                  <tr>
                    <td>
                      <?= $product["sp_id"] ?>
                    </td>
                    <td><?= $product["ten_dm"] ?>
                    </td>
                    <td><?= $product["ten_sp"] ?>
                    </td>
                    <td>
                      <!-- Hiển thị ảnh sản phẩm với kích thước 100px -->
                      <img
                        src="<?= BASE_URL . $product["img_sp"] ?>"
                        width="100px" alt="Ảnh sản phẩm">
                    </td>
                    <td>
                      <?= number_format($product["gia_sp"]) ?>
                    </td>
                    <td>
                      <?= number_format($product["km_sp"] ?: 0) ?>
                    </td>
                    <td>
                      <?= number_format($product["so_luong"]) ?>
                    </td>
                    <td>
                      <?= $product["so_luong"] > 0 ? "<p style='color:green;'>Còn hàng</p>" : "<p style='color:red; font-weight:700;'>Hết hàng</p>" ?>
                    </td>
                    <td>
                      <?php
                        echo $product['an_hien'] === 0 ? '<span class="badge badge-danger">Bị Ẩn</span>' : '<span class="badge badge-success">Hiện</span>';
                      ?>
                    </td>
                    <td>
                      <a
                        href="<?= BASE_URL_ADMIN.'?act=formEditProduct&id='.$product['sp_id']; ?>"><button
                          class="btn btn-warning">Sửa</button></a>

                      <?php if ($product['an_hien'] === 0): ?>
                      <a href="<?= BASE_URL_ADMIN . '?act=showProduct&id=' . $product['sp_id'] ?>"
                        onclick="return confirm('Bạn có chắc chắn muốn ẩn sản phẩm này?')">
                        <button class="btn btn-success btn-sm mt-1">Hiện</button>
                      </a>
                      <?php else: ?>
                      <a href="<?= BASE_URL_ADMIN . '?act=hideProduct&id=' . $product['sp_id'] ?>"
                        onclick="return confirm('Bạn có chắc chắn muốn hiển thị sản phẩm này?')">
                        <button class="btn btn-danger btn-sm mt-1">Ẩn</button>
                      </a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Danh mục</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Giá KM</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Ẩn/Hiện</th>
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
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>