<?php
include "connect.php";
if (isset($_POST['getadviser'])) {
    $id = $conn->escape_string($_REQUEST['value']);
    $sql = "SELECT user_fristname,user_name,user_lastname FROM `user` WHERE user_id = '$id' LIMIT 1";
    $result = $conn->query($sql);
    if ($num = $result->num_rows == 1) {
        $rows = $result->fetch_array();
        echo 1;
        // echo $rows['user_fristname'].$rows['user_name'].' '.$rows['user_lastname'];
    } else {
        echo 0;
    }
}
