<?php
include "connect.php";
$user_id = $_SESSION['user_id'];
// notification_user
if ($_SESSION['user_level'] == 0 or $_SESSION['user_level'] == 3) {
    $sql = "SELECT COUNT(*) AS wait_num FROM `order` WHERE `order_status` = 'w'";
    // $_SESSION['noti_user'][0] = $noti['wait_num'] = $noti = $conn->query($sql)->fetch_array();
    $resultnoti = $conn->query($sql);
    $noti = $resultnoti->fetch_assoc();
    $_SESSION['user_noti'][0] = $noti['wait_num'];
    $sql = "SELECT COUNT(*) AS countcart FROM `cart` WHERE user_id = '$user_id'";
    $result = $conn->query($sql);
    $rows = $result->fetch_array();
    $_SESSION['user_noti'][1] = $rows['countcart'];
}
