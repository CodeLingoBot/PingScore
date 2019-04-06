<?php
try {
    $strConnexion = 'mysql:host=localhost;dbname=PI_aspcn' ;
    $pdo = new PDO ($strConnexion,'root','root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    $msg = 'Erreur PDO dans ' . $e -> getMessage();
    die($msg);
}