<?php
include_once "connect.php";
if (isset($_REQUEST['delpro'])) {
    $product_id = $conn->escape_string($_REQUEST['id']);
    $sql = "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1";
    $result = $conn->query($sql);
    if ($num = $result->num_rows > 0) {
        $rows = $result->fetch_array();
        $sql = "DELETE FROM `product` WHERE `product`.`product_id` = '$product_id'";
        $result = $conn->query($sql);
        $file = $rows['product_img'];
        if (unlink("../products/img/$file")) {
            echo 1;
        }
    } else {
        echo 0;
    }
}
if (isset($_REQUEST['editpro'])) {
    $product_id = $conn->escape_string($_REQUEST['id']);
    $sql = "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1";
    $result = $conn->query($sql);
    if ($num = $result->num_rows == 1) {
        $rows = $result->fetch_array();
?>
        <div class="modal-body">
            <input type="hidden" name="editproduct">
            <input type="hidden" name="product_id" value="<?php echo $rows['product_id']; ?>">
            <input type="file" name="p_picture2" id="p_picture2" accept="image/*" style="display: none;">
            <div class="form-row">
                <div class="form-group col-12">
                    <button type="button" class="btn btn-sm btn-success btnimgproduct2"><i class="fas fa-camera"> เปลี่ยนรูป</i></button>
                    &nbsp;<a id="filename2">แนะนำรูปขนาด 128*128 (4:3)</a>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="p_name2">ชื่อสินค้า</label>
                    <input type="text" class="form-control" name="p_name2" id="p_name2" value="<?php echo $rows['product_name']; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="p_detail2">คำอธิบายสินค้า</label>
                    <input type="text" class="form-control" name="p_detail2" id="p_detail2" value="<?php echo $rows['product_detail']; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-lg-4">
                    <label for="p_category2">ประเภทสินค้า</label>
                    <select name="p_category2" class="form-control" id="p_category2">
                        <option value="ยังไม่ระบุ">ยังไม่ระบุ</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-lg-4">
                    <label for="p_price2">ราคาสินค้า</label>
                    <input type="number" class="form-control" name="p_price2" id="p_price2" value="<?php echo $rows['product_price']; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-lg-4">
                    <label for="p_stock2">จำนวนสินค้า (สต๊อกสินค้า)</label>
                    <input type="number" class="form-control" name="p_stock2" id="p_stock2" value="<?php echo $rows['product_stock']; ?>" required>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.btnimgproduct2').click(function(e) {
                    e.preventDefault();
                    $('#p_picture2').click();
                });
                $('#p_picture2').change(function(e) {
                    let filename = e.target.files[0].name;
                    $('#filename2').text(filename);
                });
            });
        </script>
<?php  } else {
        echo "ไม่พบข้อมูล";
    }
}
if (isset($_REQUEST['editproduct'])) {
    $p_id = $conn->escape_string($_REQUEST['product_id']);
    $p_name = $conn->escape_string($_REQUEST['p_name2']);
    $p_detail = $conn->escape_string($_REQUEST['p_detail2']);
    $p_category = $conn->escape_string($_REQUEST['p_category2']);
    $p_price = $conn->escape_string($_REQUEST['p_price2']);
    $p_stock = $conn->escape_string($_REQUEST['p_stock2']);

    $sql = "SELECT * FROM product WHERE product_id = '$p_id' LIMIT 1";
    $result = $conn->query($sql);
    if ($num = $result->num_rows == 1) {
        $product = $result->fetch_array();
        $img_rename = $product['product_img'];
        $img_name = NULL;
        if ($_FILES['p_picture2']['name'] != "") {
            $img_name = $_FILES['p_picture2']['name'];
            $img_type = strtolower(pathinfo($_FILES['p_picture2']['name'], PATHINFO_EXTENSION));
            $img_rename = "product" . uniqid() . '.' . $img_type;
        }
        $sql = "UPDATE `product` SET `product_name` = '$p_name', `product_detail` = '$p_detail', `product_price` = '$p_price', `product_stock` = '$p_stock', `product_img` = '$img_rename' WHERE `product`.`product_id` = '$p_id'";
        $result = $conn->query($sql);
        if ($result) {
            if($img_name != $product['product_img']){
                move_uploaded_file($_FILES['p_picture2']['tmp_name'],"../products/img/$img_rename");
            }
            echo 1;
        }
    } else {
        echo 0;
    }
}
