<?php

$num_match = $_GET['match'] ;

require_once('../../controllers/database.php') ;

$req = $pdo->prepare("UPDATE matchs SET state=? WHERE id=?");
$req->execute(array(2, $num_match));

header("Location: match_arbitre.php?match=$num_match");