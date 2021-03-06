<?php

include_once "../../includes/functions.php";

$num_match = $_GET['match'] ;
$player = $_GET['player'];
$action = $_GET['action'];

require_once('../database.php');

#Recup score match
$et = $pdo->prepare("SELECT score FROM matchs WHERE id=?") ;
$et->execute(array($num_match)) ;
$et = $et->fetch() ;

#Decode score
$json_clear = json_decode($et["score"]);

#Selection du round actif
$num_round = 1;
$round = "round".$num_round;
while ($json_clear->$round->state===2){
    $num_round++;
    $round = "round".$num_round;
}


$score = $json_clear->$round->$player;
if ($action === 'plus') {
    $json_clear->$round->$player++;
} elseif ($action === 'less') {
    if ($json_clear->$round->$player > 0) {
        $json_clear->$round->$player--;
    }else {
        $_SESSION['flash']['danger'] = "Erreur dans la saisie"; //TODO : faire le toast erreur
        header("Location: ../../views/panel/match_arbitre.php?match=$num_match");
    }
} else {
    $_SESSION['flash']['danger'] = "Erreur dans la saisie"; //TODO : faire le toast erreur
    header("Location: ../../views/panel/match_arbitre.php?match=$num_match");
}
$json = json_encode($json_clear);
$req = $pdo->prepare("UPDATE matchs SET score=? WHERE id=?");
$req->execute(array($json, $num_match));
header("Location: ../../views/panel/match_arbitre.php?match=$num_match");