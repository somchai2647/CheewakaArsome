      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">ตะกร้าสินค้า</h1>
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

                  <!-- Default box รายการสั่งสินค้า  -->
                  <?php $sql = "SELECT cart.*,product.* FROM `cart` INNER JOIN product ON cart.product_id = product.product_id WHERE cart.user_id = '$user_id'";
                    $result = $conn->query($sql);
                    $num = $result->num_rows;
                    ?>
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">รายการสั่งสินค้า</h3>
                          <div class="card-tools">
                              <button class="btn btn-sm btn-success mr-4" <?php echo ($num > 0) ? "" : "disabled"; ?> id="submitcart">สั่งสินค้า</button>
                              <button id="clearcart" class="btn btn-sm btn-danger mr-4" <?php echo ($num > 0) ? "" : "disabled"; ?>>นำสินค้าออกทั้งหมด</button>
                              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                  <i class="fas fa-minus"></i></button>
                          </div>
                      </div>
                      <div class="card-body p-0">
                          <table class="table table-striped projects">
                              <thead>
                                  <tr>
                                      <th class="text-center">
                                          ลำดับ
                                      </th>
                                      <th class="text-center">
                                          ขื่อสินค้า
                                      </th>
                                      <th class="text-center">
                                          ขนาดสินค้า
                                      </th>
                                      <th class="text-center" style="width: 10%">
                                          จำนวนสินค้า
                                      </th>
                                      <th class="text-center">
                                          ราคาสินค้า
                                      </th>
                                      <th class="text-center">
                                          ราคาสินค้า*สินค้า
                                      </th>
                                      <th style="width: 20%" class="text-center">
                                          ตัวเลือก
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <div class="cartlist">
                                      <form id="formcart">
                                          <?php
                                            $count = 0;
                                            $total = 0;
                                            if ($num > 0) {
                                                while ($product = $result->fetch_array()) { ?>
                                                  <tr class="rowproduct" id="<?php echo $product['id']; ?>">
                                                      <input type="hidden" name="product_id[]" value="<?php echo $product['id']; ?>">
                                                      <td class="text-center">
                                                          <?php echo ++$count; ?>
                                                      </td>
                                                      <td>
                                                          <?php echo $product['product_name']; ?>
                                                      </td>
                                                      <td class="text-center">
                                                          XL
                                                      </td>
                                                      <td class="text-center">
                                                          <input type="number" class="form-control form-control-sm quantity" name="quantity[]" min="1" value="<?php echo ($product['quantity'] != 0) ? $product['quantity'] : 0; ?>">
                                                      </td>
                                                      <td class="text-center">
                                                          <input type="hidden" class="productprice" name="product_price[]" id="product_price<?php echo $product['id']; ?>" value="<?php echo $product['product_price']; ?>">
                                                          <?php echo $product['product_price']; ?>
                                                      </td>
                                                      <td class="text-center showprice" id="showprice<?php echo $product['id']; ?>">
                                                          <?php echo $price = number_format(($product['product_price'] * $product['quantity']), 2); $total += $price; ?>.-
                                                          <input type="hidden" class="realprice" name="realprice[]" value="<?php echo number_format(($product['product_price'] * $product['quantity']), 2); ?>">
                                                      </td>
                                                      <td class="project-actions text-center">
                                                          <button type="button" class="btn btn-danger btn-sm delprolist">
                                                              <i class="fas fa-trash">
                                                              </i>
                                                              นำออก
                                                          </button>
                                                      </td>
                                                  </tr>
                                              <?php }
                                            } else { ?>
                                              <tr align="center">
                                                  <td colspan="7">
                                                      <div class="text-muted">-ยังไม่มีรายการสินค้า-</div>
                                                  </td>
                                              </tr>
                                          <?php }
                                            ?>
                                      </form>
                                  </div>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th class="text-center">

                                      </th>
                                      <th class="text-center">

                                      </th>
                                      <th class="text-center">

                                      </th>
                                      <th class="text-center" style="width: 10%">

                                      </th>
                                      <th class="text-right">
                                          ราคาสุทธิ:
                                      </th>
                                      <th class="text-center" id="total">
                                         <?php echo ($count>0) ? number_format($total,2) : "";?>.-
                                      </th>
                                      <th style="width: 20%" class="text-center">
                                      <!-- //ทำระบบนับแบบนี้ไปก่อนเดียวค่อยกับมาแก้ -->
                                      </th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </section>
              <!-- /.content -->
          </div><!-- /.container-fluid -->
      </div>