      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">สั่งซื้อสินค้า</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                          <li class="breadcrumb-item active">สั่งซื้อสินค้า</li>
                      </ol>
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
                                          <div class="card w-100 bg-light" id="<?php echo $rows['product_id']; ?>">
                                              <div class="card-header text-muted border-bottom-0">
                                                  <?php echo $rows['product_category']; ?>
                                              </div>
                                              <div class="card-body pt-0">
                                                  <div class="row">
                                                      <div class="col-7">
                                                          <h2 class="lead"><b class="product_name">ชื่อสินค้า: <?php echo $rows['product_name']; ?></b></h2>
                                                          <p class="text-muted text-sm"><b>คำอธิบาย: </b><?php echo $rows['product_detail']; ?></p>
                                                          <ul class="ml-4 mb-0 fa-ul text-muted">
                                                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-coins"></i></span> ราคา: <?php echo number_format($rows['product_price'], 2); ?> บาท</li>
                                                          </ul>
                                                      </div>
                                                      <div class="col-5 text-center">
                                                          <img src="products\img\<?php echo $rows['product_img']; ?>" class="img-circle img-fluid">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="card-footer">
                                                  <div class="text-right">
                                                      <button class="btn btn-sm bg-teal addcart">
                                                          <i class="fas fa-cart-plus"></i>
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                              <?php }
                                }
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