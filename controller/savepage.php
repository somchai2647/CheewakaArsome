<?php
include "connect.php";
echo $_SESSION['pageselect'] = $conn->escape_string($_REQUEST['savepage']);