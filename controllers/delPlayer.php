<?php

$id = $_GET["id"];

require_once("database.php");

$ps = $pdo->prepare("DELETE FROM players WHERE id=?");

$params = array($id);

$ps->execute($params);

header("location: ../views/panel/liste_joueurs.php");