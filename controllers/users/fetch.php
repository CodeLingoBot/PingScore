<?php
require_once '../database.php';

$id = $_POST["id"];

if(isset($id)){
    $req = "SELECT * FROM users WHERE id=?";
    $result = $pdo->prepare($req);
    $result->execute(array($id));
    $row = $result->fetch();
    echo json_encode($row);
}