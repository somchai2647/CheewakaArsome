<?php
include "connect.php";
$user_id = $_SESSION['user_id'];
$adviser_id = 88888;

$sql = "INSERT INTO `order`(`user_id`, `adviser_id`) VALUES 
('$user_id','$adviser_id')";
$result = $conn->query($sql);
$order_id = $conn->insert_id;
for ($i = 0; $i < count($_REQUEST['product_id']); $i++) {
    $product_id = $conn->escape_string($_REQUEST['product_id'][$i]);
    $product_quantity = $conn->escape_string($_REQUEST['quantity'][$i]);
    $product_price = $conn->escape_string($_REQUEST['product_price'][$i]);

    $sql2 = "INSERT INTO `order_list`(`order_id`, `product_id`, `product_price`, `product_quantity`) VALUES 
    ('$order_id','$product_id','$product_price','$product_quantity')";
    $result2 = $conn->query($sql2);
}
echo 1;
// $sql = "INSERT INTO `order`(`user_id`, `adviser_id`) VALUES 
// ('$user_id','$adviser_id')";
// $result = $conn->query($sql);

// $order_id = $conn->insert_id;
// $sql2 = "INSERT INTO `order_list`(`order_id`, `product_id`, `product_price`, `product_quantity`) VALUES 
// ('$order_id','$product_id','$product_price','$product_quantity')";
// $result = $conn->query($sql);
