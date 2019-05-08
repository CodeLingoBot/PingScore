<?php
require_once '../database.php';

$id = $_POST["id"];

if(isset($id)){
    $req = "SELECT id, TIME_FORMAT(hour, '%H:%i') AS hour, blue_player, red_player, state FROM matchs WHERE id=?";
    $result = $pdo->prepare($req);
    $result->execute(array($id));
    $row = $result->fetch();
    echo json_encode($row);
}