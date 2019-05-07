<?php

require_once 'database.php';

$req = '
    SET FOREIGN_KEY_CHECKS=0;
    TRUNCATE `lucnicol_aspcn`.`court`; 
    TRUNCATE `lucnicol_aspcn`.`matchs`; 
    TRUNCATE `lucnicol_aspcn`.`players`; 
    TRUNCATE `lucnicol_aspcn`.`users`;
    SET FOREIGN_KEY_CHECKS=1;
    INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES (1, "root", "$2y$10$D2Oajot8QdRoTy7Qcyklf.VW2tp8kDGP79jQL7rimi11Y8SoUVVL2", "admin");';
$data = $pdo->query($req);
header('Location: ../views/panel/espace_competition.php');