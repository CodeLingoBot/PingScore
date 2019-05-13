<div class='row'>

<?php

require_once('../controllers/database.php');


$nb_lignes = $pdo->prepare("SELECT COUNT(*) FROM courts") ;
$nb_lignes->execute() ;
$nb_lignes = $nb_lignes->fetch() ;

#var_dump($nb_lignes) ;

$nb_lignes = intval( $nb_lignes['COUNT(*)'] ) + 1 ;

?>

<?php
for ($i=1; $i < $nb_lignes ; $i++) {

    #$tab = array(3, 5, 8, 11, 14, 17);
    $tab = array(3, 5, 7, 9, 11, 13, 15, 17);

    if (in_array($i, $tab) ){
        echo("
                </div>

                <div class='row'>");
    };

    $nb = $i;
    require("../includes/courts.php");

} ;

?>

</div>
