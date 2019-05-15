<?php

$num_match = $_GET['match'] ;

require_once('../database.php');

$et = $pdo->prepare("SELECT score FROM matchs WHERE id=?") ;
$et->execute(array($num_match)) ;
$et = $et->fetch() ;

$json_clear=json_decode($et["score"]);

for ($i=1; $i <= 5 ; $i++) { 
    $round = "round".$i ;
    $json_clear->$round->state = 2 ;
}

$json = json_encode($json_clear);
$req = $pdo->prepare("UPDATE matchs SET state=?, score=? WHERE id=?");
$req->execute(array(2, $json, $num_match));


header("Location: ../../views/panel/tableau_arbitre.php");