<?php

include_once "../../includes/functions.php";

$num_match = $_GET['match'] ;

require_once('../../controllers/database.php') ;

$et = $pdo->prepare("SELECT score FROM matchs WHERE id=?") ;
$et->execute(array($num_match)) ;
$et = $et->fetch() ;

$json_clear=json_decode($et["score"]);

$num_round = 1;
$round = "round".$num_round;
while ($json_clear->$round->state===2){
    $num_round++;
    $round = "round".$num_round;
}

$json_clear->$round->state=2;

$json = json_encode($json_clear);
$req = $pdo->prepare("UPDATE matchs SET score=? WHERE id=?");
$req->execute(array($json, $num_match));
header("Location: match_arbitre.php?match=$num_match");