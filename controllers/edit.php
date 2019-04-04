<?php
$id = $_POST['id'];
$surname = $_POST['surname'];
$name = $_POST['name'];
$cat = $_POST['cat'];
$rank = $_POST['rank'];
$namePicture = $_FILES['picture']['name'];
$club = $_POST['club'];

require_once 'database.php';

if ($namePicture == "") {
    $req = $pdo->prepare("UPDATE players SET surname=?, name=?, cat=?, rank=?, club=? WHERE id=?");
    $params = array($surname,$name, $cat, $rank, $club, $id);
    $req->execute($params);
} else {
    $fichierTempo = $_FILES['picture']['tmp_name'];
    move_uploaded_file($fichierTempo, '../assets/img/' . $namePicture);
    $req = $pdo->prepare("UPDATE players SET surname=?, name=?, cat=?, rank=?, picture=?, club=? WHERE id=?");
    $params = array($surname,$name, $cat, $rank, $namePicture, $club, $id);
    $req->execute($params);
}

header("location: ../views/panel/liste_joueurs.php");
