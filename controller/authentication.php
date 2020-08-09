<?php
include_once "connect.php";
if (isset($_REQUEST['reg'])) {
    $user_id = $conn->escape_string($_REQUEST['data'][4]['value']);
    $sql = "SELECT user_id FROM user WHERE user_id = '$user_id' LIMIT 1";
    $result = $conn->query($sql);
    if ($num = $result->num_rows != 1) {

        $user_fristname = $conn->escape_string($_REQUEST['data'][0]['value']);
        $user_name = $conn->escape_string($_REQUEST['data'][1]['value']);
        $user_lastname = $conn->escape_string($_REQUEST['data'][2]['value']);
        $user_nationality = $conn->escape_string($_REQUEST['data'][3]['value']);
        $user_id = $conn->escape_string($_REQUEST['data'][4]['value']);
        $user_password = $conn->escape_string(md5($_REQUEST['data'][4]['value']));
        $address_housenumber = $conn->escape_string($_REQUEST['data'][5]['value']);
        $address_group = $conn->escape_string($_REQUEST['data'][6]['value']);
        $address_alleyroad = $conn->escape_string($_REQUEST['data'][7]['value']);
        $address_road = $conn->escape_string($_REQUEST['data'][8]['value']);
        $address_district = $conn->escape_string($_REQUEST['data'][9]['value']);
        $address_province = $conn->escape_string($_REQUEST['data'][10]['value']);
        $address_zipcode = $conn->escape_string($_REQUEST['data'][11]['value']);
        $user_telephone = $conn->escape_string($_REQUEST['data'][12]['value']);
        $user_lineid = $conn->escape_string($_REQUEST['data'][13]['value']);
        $user_beneficiary = $conn->escape_string($_REQUEST['data'][14]['value']);
        $user_relationship = $conn->escape_string($_REQUEST['data'][15]['value']);
        $bank_com = $conn->escape_string($_REQUEST['data'][16]['value']);
        $bacnk_branch = $conn->escape_string($_REQUEST['data'][17]['value']);
        $bank_account = $conn->escape_string($_REQUEST['data'][18]['value']);
        $bank_type = $conn->escape_string($_REQUEST['data'][19]['value']);
        $bank_name = $conn->escape_string($_REQUEST['data'][20]['value']);
        // $adviser_name = $conn->escape_string($_REQUEST['data'][21]['value']); <-- Deleted
        $adviser_id = $conn->escape_string($_REQUEST['data'][21]['value']);

        $sql = "INSERT INTO `user`(`user_id`, `user_password`, `user_fristname`, `user_name`, `user_lastname`, `user_nationality`, `user_telephone`, `user_lineid`) VALUES 
        ('$user_id','$user_password','$user_fristname','$user_name','$user_lastname','$user_nationality','$user_telephone','$user_lineid')";
        $result1 = $conn->query($sql);
        $sql = "INSERT INTO `address`(`id`, `user_id`, `address_housenumber`, `address_group`, `address_alleyroad`, `address_road`, `address_district`, `address_province`, `address_zipcode`) VALUES 
        ('','$user_id','$address_housenumber','$address_group','$address_alleyroad','$address_road','$address_district','$address_province','$address_zipcode')";
        $result2 = $conn->query($sql);
        $sql = "INSERT INTO `bank_user`(`id`, `user_id`, `bank_com`, `bacnk_branch`, `bank_account`, `bacnk_type`, `bank_name`) VALUES ('','$user_id','$bank_com','$bacnk_branch','$bank_account','$bank_type','$bank_name')";
        $result3 = $conn->query($sql);
        $sql = "INSERT INTO `adviser`(`id`, `user_id`, `adviser_id`) VALUES ('','$user_id','$adviser_id')";
        $result4 = $conn->query($sql);
        if ($result1 and $result2 and $result3 and $result4) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 2;
    }
}
if (isset($_REQUEST['login'])) {
    $user_id = $conn->escape_string($_REQUEST['data'][0]['value']);
    $user_password = $conn->escape_string(md5($_REQUEST['data'][1]['value']));
    $sql = "SELECT user_id FROM `user` WHERE user_id = '$user_id' LIMIT 1";
    $result = $conn->query($sql);
    if ($num = $result->num_rows == 1) {
        $sql2 = "SELECT * FROM `user` WHERE user_id = '$user_id' AND user_password = '$user_password'";
        $result = $conn->query($sql2);
        if ($result) {
            $rows = $result->fetch_array();
            if ($rows['user_status'] == 'y') {
                $_SESSION['user_id'] = $rows['user_id'];
                $_SESSION['user_status'] = $rows['user_status'];
                $_SESSION['user_level'] = $rows['user_level'];
                $_SESSION['user_name'] = $rows['user_fristname'] . $rows['user_name'] . ' ' . $rows['user_lastname'];
                $_SESSION['pageselect'] = "";
                echo 1;
            } else if ($rows['user_status'] == 'b') {
                echo 3;
            } else {
                echo 2;
            }
        } else {
            echo 0;
        }
    } else {
        echo 4;
    }
    // 0 คือ ERROR
    // 1 คือ ผ่าน
    // 2 คือ รอการอนุมัติ
    // 3 คือ บัชญีถูกระงับ
    // 4 คือ ไม่มีบัญชี
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:../index.php');
}
