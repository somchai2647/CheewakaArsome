<?php

$conn = new mysqli('remotemysql.com','RQrfN7VYpv','tI1f03HRTH','RQrfN7VYpv');
// error_reporting(E_ALL);
// ini_set('display_errors', 0);
if(!$conn){
    echo "<h1> ไม่สามารถเชื่อมต่อฐานข้อมูลได้ </h1>";
}