<?php
include "connect.php";
$user_id = $_SESSION['user_id'];
if (isset($_POST['countcart'])) {

}

if (isset($_POST['addcart'])) {
    $product_id = $conn->escape_string($_POST['id']);
    $product_price = $conn->escape_string($_POST['price']);
    $sql = "SELECT * FROM `cart` WHERE product_id = '$product_id' LIMIT 1";
    $result = $conn->query($sql);
    if ($num = $result->num_rows != 1) {
        $quantity = 1;
        $sql = "INSERT INTO `cart`(`user_id`, `product_id`, `quantity`, `price`) VALUES ('$user_id','$product_id','$quantity','$product_price')";
        $result = $conn->query($sql);
        if ($result) {
            echo 1;
        }
    } else {
        echo 2;
    }
}
if (isset($_POST['delprolist'])) {
    $id = $conn->escape_string($_POST['id']);
    $sql = "DELETE FROM `cart` WHERE `cart`.`id` = '$id'";
    $result = $conn->query($sql);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}
if (isset($_POST['clearcart'])) {
    $sql = "DELETE FROM `cart` WHERE user_id = '$user_id'";
    $result = $conn->query($sql);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}
if (isset($_POST['updatequantity'])) {
    $id = $conn->escape_string($_POST['id']);
    $value = $conn->escape_string($_POST['value']);
    $sql = "UPDATE `cart` SET `quantity` = '$value' WHERE `cart`.`id` = '$id'";
    $result = $conn->query($sql);
    if ($result) {
        $sql2 = "SELECT (`quantity` * `price`) AS total_price FROM `cart` WHERE user_id = '$user_id'";
        $result2 = $conn->query($sql2);
        $total = 0;
        //ทำระบบนับแบบนี้ไปก่อนเดียวค่อยกับมาแก้
        while($rows = $result2->fetch_array()){
            $total += $rows['total_price'];
        }
        echo $total;
    } else {
        echo 0;
    }
}
