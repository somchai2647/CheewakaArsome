<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">จัดการสินค้าในระบบ</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active">จัดการสินค้า</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row mb-2">
            <div class="col-sm-6">
                <button class="btn btn-sm bg-success" title="เพิ่มสินค้า" data-toggle="modal" data-target="#addproductModal">
                    <i class="fas fa-plus-circle"> เพิ่มสินค้า</i>
                </button>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch">
                        <?php
                        $sql = "SELECT * FROM `product`";
                        $result = $conn->query($sql);
                        if ($num = $result->num_rows > 0) {
                            while ($rows = $result->fetch_array()) { ?>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                    <div class="card w-100 bg-light" id="<?php echo $rows['product_id']; ?>" name="<?php echo $rows['product_name']; ?>">
                                        <div class="card-header text-muted border-bottom-0">
                                            <?php echo $rows['product_category']; ?>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b>ชื่อสินค้า: <?php echo $rows['product_name']; ?></b></h2>
                                                    <p class="text-muted text-sm"><b>คำอธิบาย: </b><?php echo $rows['product_detail']; ?></p>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-coins"></i></span> ราคา: <?php echo number_format($rows['product_price'], 2); ?> บาท</li>
                                                        <li class="small mt-1"><span class="fa-li"><i class="fas fa-lg fa-box"></i></span> จำนวนสินค้า: <?php echo number_format($rows['product_stock'], 0); ?> หน่วย</li>

                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="products\img\<?php echo $rows['product_img']; ?>" class="img-circle img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="#" class="btn btn-sm bg-primary editproduct">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger delpro">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="col-12">
                                <center>
                                    <div class="text-muted m-4">ยังไม่ได้เพิ่มในค้าในระบบ</div>
                                </center>
                            </div>

                        <?php }
                        ?>



                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <!-- <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination justify-content-center m-0">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                            <li class="page-item"><a class="page-link" href="#">8</a></li>
                        </ul>
                    </nav> -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
    </div><!-- /.container-fluid -->
</div>