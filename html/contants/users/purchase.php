<?php
function order_status(string $status)
{
    switch ($status) {
        case 'w':
            echo "<a class='text-warning'>รอการตรวจสอบ..</a>";
            break;

        default:
            # code...
            break;
    }
}
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">รายการสั่งซื้อ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <section class="content">
            <?php $sql = "SELECT * FROM `order` WHERE user_id = '$user_id' ORDER BY order_id DESC";
            $result = $conn->query($sql);
            $total = 0.00;
            if ($num = $result->num_rows > 0) {
                while ($list = $result->fetch_array()) {
                    $order_id = $list['order_id'];
            ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">สถานะ: <?php order_status($list['order_status']); ?></h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php $sql = "SELECT order_list.*,product.product_name,product.product_detail,product.product_img FROM `order_list` LEFT JOIN product ON order_list.product_id = product.product_id WHERE order_list.order_id = '$order_id'";
                                        $result2 = $conn->query($sql);
                                        while ($product = $result2->fetch_array()) {
                                            $total += $product['product_quantity'] * $product['product_price'];
                                        ?>
                                            <div class="row listpro">
                                                <div class="col col-12 col-md-1 col-lg-1 d-flex justify-content-center">
                                                    <img src="products\img\<?php echo ($product['product_img'] != NULL) ? $product['product_img'] : 'noproduct.png'; ?>" alt="<?php echo $product['product_name'] ?>" width="128px" height="128px" class="img-circle img-fluid">
                                                </div>
                                                <div class="col col-12 col-md-9 col-lg-9">
                                                    ชื่อสินค้า: <?php echo ($product['product_name'] != NULL) ? $product['product_name'] : '[สินค้าถูกลบในระบบแล้ว]'; ?><br>
                                                    <small>ราคาสินค้า: <?php echo ($product['product_price'] != NULL) ? $product['product_price'] . ' บาท' : '[สินค้าถูกลบในระบบแล้ว]'; ?></small>
                                                    <br>
                                                    <?php echo ($product['product_quantity'] != NULL) ? 'x ' . $product['product_quantity'] : '[สินค้าถูกลบในระบบแล้ว]'; ?>
                                                </div>
                                                <div class="col col-12 col-md-1 col-lg-1">
                                                    <br>
                                                    <?php echo number_format(($product['product_quantity'] * $product['product_price']), 2) . ' บาท'; ?>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php }
                                        ?>
                                        <div class="row listpro">
                                            <div class="col col-12 col-md-1 col-lg-2">
                                                ยอดคำสั่งซื้อทั้งหมด:
                                            </div>
                                            <div class="col col-12 col-md-9 col-lg-8">
                                            </div>
                                            <div class="col col-12 col-md-1 col-lg-1">
                                                <?php echo number_format($total, 2) . ' บาท'; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <?php echo "วันเวลา " . $list['order_date']; ?>
                                    </div>
                                    <!-- /.card-footer-->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>

                <?php  }
            } else { ?>
                <div class="card">
                    <div class="card-body">
                        <center>
                            -ไม่มีรายการสั่งซื้อ-
                        </center>
                    </div>
                </div>

            <?php }
            ?>
        </section>
        <!-- /.content -->
    </div><!-- /.container-fluid -->
</div>
<style>
    .listpro {
        font-size: 16pt;
    }

    /* .listpro:nth-child(odd) {
              background-color: gray;
          }

          .listpro:nth-child(even) {
              background-color: white;
          } */
</style>