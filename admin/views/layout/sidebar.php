<aside style="background-color: #8E1E20;" class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= BASE_URL_ADMIN ?>" class="brand-link">
    <img style="max-width:200px; max-height:80px; margin-left:30px" src="./assets/dist/img/logo-white-ngang-remove1.jpg"
      alt="">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image" style="width:4.1rem">
      <img src="./assets/dist/img/logo.png" alt="User" style="width:200px">
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a style="color: #FCD9C4;" href="<?= BASE_URL_ADMIN.'?act=listCategory' ?>"
            class="nav-link">
            <img style="width:24px;height:24px;"
              src="https://img.icons8.com/?size=100&id=13727&format=png&color=000000">
            Quản lý danh mục
          </a>
        </li>
        <li class="nav-item">
          <a style="color: #FCD9C4;" href="<?= BASE_URL_ADMIN.'?act=listProduct' ?>"
            class="nav-link">
            <img style="width:24px;height:24px;"
              src="https://img.icons8.com/?size=100&id=12428&format=png&color=000000">
            Quản lý sản phẩm
          </a>
        </li>
        <li class="nav-item">
          <a style="color: #FCD9C4;" href="<?= BASE_URL_ADMIN.'?act=listUser' ?>"
            class="nav-link">
            <img style="width:24px;height:24px;"
              src="https://img.icons8.com/?size=100&id=23265&format=png&color=000000">
            Quản lý tài khoản
          </a>
        </li>
        <li class="nav-item">
          <a style="color: #FCD9C4;" href="<?= BASE_URL_ADMIN.'?act=listOrder' ?>" class="nav-link">
            <img style="width:24px;height:24px;" src="https://img.icons8.com/?size=100&id=7979&format=png&c olor=000000">
            Quản lý đơn hàng
          </a>
        </li>
        <li class="nav-item">
          <a style="color: #FCD9C4;" href="<?= BASE_URL_ADMIN.'?act=listComment' ?>"
            class="nav-link">
            <img style="width:24px;height:24px;"
              src="https://img.icons8.com/?size=100&id=37966&format=png&color=000000">
            Quản lý bình luận
          </a>
        </li>
        <li class="nav-item">
          <a style="color: #FCD9C4;" href="<?= BASE_URL_ADMIN. '?act=listEvaluation' ?>"
            class="nav-link">
            <img  style="width:24px;height:24px;"
              src="https://img.icons8.com/?size=100&id=11254&format=png&color=000000">
            Quản lý đánh giá
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>