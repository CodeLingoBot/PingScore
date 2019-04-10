<?php

$table = $_POST['num_table'] ;

$match = $_POST['num_match'] ;

echo($table."   ".$match) ;

?>

<?php
    require_once('../host_db.php') ;
    require_once('../database.php') ;

    $ps = $pdo->prepare("UPDATE `matchs` SET `state` = '1', 'court'=$table WHERE `matchs`.`id` = $match;") ;
    $ps->execute() ;
    $et = $ps -> fetch() ;

    $ps = $pdo->prepare("UPDATE `court` SET `match_id` = $match WHERE `court`.`id` = $table;") ;
    $ps->execute() ;
    $et = $ps -> fetch() ;
?>

<?php 

    header("/PingScore/views/panel/liste_matchs.php") ;

?>