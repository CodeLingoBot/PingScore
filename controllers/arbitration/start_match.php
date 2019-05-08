<!--==========-->

<?php 

    require_once('../../controllers/database.php') ;

?>

<!--==========-->

<?php

$table = $_GET['table'] ;

$match = $_GET['match'] ;

echo($table.'  '.$match) ;

##########

$ps = $pdo->prepare("SELECT m.state, c.id, c.match_id FROM matchs m INNER JOIN courts c WHERE m.id=c.match_id AND c.id=?") ;
$et = $ps->execute(array($table)) ;
$et = $ps -> fetch() ;

$etat = intval($et['state']) ;

if ($etat == 1) {
    echo("CA MARCHE PAS") ;
}else{

    #Update num match sur table x
    $data = $pdo->prepare("UPDATE courts SET match_id=? WHERE id=?") ;
    $data->execute(array($match,$table)) ;

    #Update état match x
    $data = $pdo->prepare("UPDATE matchs SET state=? WHERE id=?") ;
    $data->execute(array(1,$match)) ;

    header("Location: ../../views/panel/tableau_arbitre.php");
}

##########