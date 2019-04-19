<?php
$num_match = $_GET['match'] ;
$player = $_GET['player'];

require_once('../../controllers/database.php') ;

$et = $pdo->prepare("SELECT * FROM matchs WHERE id=?") ;
$et->execute(array($num_match)) ;
$et = $et->fetch() ;

$json_clear=json_decode($et["score"]);
$var = $json_clear->round1->$player;
$json_clear->round1->$player = $var +1;
$json = json_encode($json_clear);
print_r($json);
$req = $pdo->prepare("UPDATE matchs SET score=? WHERE id=?") ;
$req->execute(array($json, $num_match));

header("Location: match_arbitre.php?match=$num_match");