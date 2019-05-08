<?php

$num_table = $_GET['table'] ;

require_once('../database.php') ;

#Recuperation donné table
$match = $pdo->prepare("SELECT match_id FROM courts WHERE id=?") ;
$match->execute(array($num_table)) ;
$match = $match->fetch() ;

$match = intval($match['match_id']) ;

header('Location: ../../views/panel/match_arbitre.php?match='.$match);