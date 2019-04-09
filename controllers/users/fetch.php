<?php

require_once 'host_db.php';

$connect = mysqli_connect($host, $user, $pass, $db);
if(isset($_POST["id"])){
    $query = "SELECT * FROM users WHERE id = '".$_POST["id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}