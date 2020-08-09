<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">ชีวะกะอาศรม</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['user_name'] ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
              ผู้ใช้งาน
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link nbtn" page="html/contants/users/mainpage.php">
                <i class="far fa-user nav-icon"></i>
                <p>โปรไฟล์</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link nbtn" page="html/contants/users/products.php">
                <i class="fas fa-cart-plus nav-icon"></i>
                <p>สั่งซื้อสินค้า</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link nbtn">
                <i class="fas fa-receipt nav-icon"></i>
                <p>รายการสั่งซื้อ
                  <span class="right badge badge-success">1</span>
                </p>
              </a>
            </li>
          </ul>
        </li>
        <?php
        if ($_SESSION['user_level'] > 2) { ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ผู้ดูแล
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link nbtn">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>หน้ารวม</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link nbtn" page="html/contants/admin/manage_products.php">
                  <i class="fas fa-receipt nav-icon"></i>
                  <p>รายการสั่งซื้อ
                    <span class="right badge badge-danger">1</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link nbtn" page="html/contants/admin/manage_products.php">
                  <i class="fas fa-box nav-icon"></i>
                  <p>จัดการสินค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link nbtn">
                  <i class="fas fa-building nav-icon"></i>
                  <p>จัดการศูนย์</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link nbtn" page="html/contants/admin/manage_users.php">
                  <i class="fas fa-users nav-icon"></i>
                  <p>จัดการผู้ใช้งาน
                    <span class="right badge badge-danger">1</span>
                  </p>
                </a>
              </li>
            </ul>
          </li>
        <?php }
        ?>
        <hr>
        <li class="nav-item">
          <a href="#" class="nav-link bg-danger" data-toggle="modal" data-target="#logoutModal">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              ออกจากระบบ
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>