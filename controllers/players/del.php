<?php

$id = $_GET["id"];

require_once '../database.php';

$req = $pdo->prepare("DELETE FROM players WHERE id=?");
$params = array($id);
$req->execute($params);

header("Location: ../../views/panel/liste_joueurs.php");