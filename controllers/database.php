<?php

    try {
        $strConnexion = 'mysql:host=192.168.8.101;dbname=PI_aspcn' ;
        $pdo = new PDO ($strConnexion,'aspcn','456852');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch (PDOException $e){
        $msg = 'Erreur PDO dans' . $e -> getMessage();
        die($msg);
    }

?>