<?php
if (!isset($_SESSION['user_level'])) {
  header("location: index.php");
}
require_once "../../../controller/connect.php";
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <?php include_once "../../../html/AdminLTE/head_link.html"; ?>
  <link rel="stylesheet" href="../../assets/sweetalert2/dist/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include "../../../html/navbar.php"; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include "../../../html/sidebar.php"; ?>
    <?php include "../../../html/modal/alert.html"; ?>
    <?php include "../../../html/modal/product.html"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <div id="content">

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <?php include "../../../html/AdminLTE/control_sidebar.html"; ?>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include "../../../html/AdminLTE/footer.html"; ?>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <?php include "html/AdminLTE/request_script.html"; ?>
  <script src="assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="dist/js/myjs/main.js"></script>
  <script src="dist/js/myjs/cart.js"></script>
  <script>
    $(document).ready(function() {
      // var timecheckcart = setInterval(checkcart, 1000);

      function checkcart() {
        let countcart = "";
        $.post("controller/cart.php", {
            countcart
          },
          function(data, textStatus, jqXHR) {
            $('#numcart').text(data);
          }
        );
      }
    });
  </script>
</body>

</html>