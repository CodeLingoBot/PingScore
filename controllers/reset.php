<?php

require_once 'login_id.php';
require_once 'database.php';

$req = '
    SET FOREIGN_KEY_CHECKS=0;
    TRUNCATE '.$db.'.`challenge`; 
    TRUNCATE '.$db.'.`courts`; 
    TRUNCATE '.$db.'.`matchs`; 
    TRUNCATE '.$db.'.`players`; 
    DELETE FROM '.$db.'.`users` WHERE `id` != 1 ;
    SET FOREIGN_KEY_CHECKS=1;' ;

$data = $pdo->query($req);

header('Location: ../views/panel/espace_competition.php');