<?php
include "connect.php";
if (isset($_REQUEST['uploadproduct'])) {
    $p_name = $conn->escape_string($_REQUEST['p_name']);
    $p_detail = $conn->escape_string($_REQUEST['p_detail']);
    $p_category = $conn->escape_string($_REQUEST['p_category']);
    $p_price = $conn->escape_string($_REQUEST['p_price']);
    $p_stock = $conn->escape_string($_REQUEST['p_stock']);
    $img_name = NULL;
    $img_name = $_FILES['p_picture']['name'];
    if ($img_name != NULL) {
        $img_type = strtolower(pathinfo($_FILES['p_picture']['name'], PATHINFO_EXTENSION));
        $img_rename = "product" . uniqid() . '.' . $img_type;
    } else {
        $img_rename = "product" . uniqid() . '.png';
        copy("../products/noproduct.png", "../products/img/$img_rename");
    }
    $sql = "INSERT INTO `product`(`product_id`, `product_name`, `product_detail`, `product_category`, `product_price`, `product_stock`, `product_img`) VALUES 
    ('','$p_name','$p_detail','$p_category','$p_price','$p_stock','$img_rename')";
    $result = $conn->query($sql);
    if ($result) {
        if(!file_exists("../products/img/$img_rename")){
            if (move_uploaded_file($_FILES['p_picture']['tmp_name'], "../products/img/$img_rename")) {
                echo 1;
            }
        }else{
            echo 1;
        }

    } else {
        echo 0;
    }
}
