<?php

$num_match = $_GET['match'] ;
$player = $_GET['player'];

require_once('../database.php');

#Recup score match
$et = $pdo->prepare("SELECT score FROM matchs WHERE id=?") ;
$et->execute(array($num_match)) ;
$et = $et->fetch() ;

#Decode score
$json_clear = json_decode($et["score"]);


$json_clear->time->$player = 1 ;


$json = json_encode($json_clear);
$req = $pdo->prepare("UPDATE matchs SET score=? WHERE id=?");
$req->execute(array($json, $num_match));
header("Location: ../../views/panel/match_arbitre.php?match=$num_match");