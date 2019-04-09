<?php

require_once 'host_db.php';

try {
    $strConnexion = $connexion ;
    $pdo = new PDO ($strConnexion,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    $msg = 'Erreur PDO dans ' . $e -> getMessage();
    die($msg);
}