<!--==========-->

<?php include("../includes/partials/header.php") ?>

<!--==========-->

<?php

    require_once('../controllers/database.php') ;

    $name = $pdo->prepare("SELECT name FROM challenge") ;
    $name->execute() ;
    $name = $name->fetch() ;

?>

<h3 class="text-center">Live scoring : <?php echo($name['name']) ?></h3>

<div class="container shadow p-3 mb-5 bg-light rounded" id="container-tableau">

    <h3 class="card text-white bg-info mb-3 text-center">Tableau des matchs en cours</h3>
    
    <div class='row'>

    <?php

        $nb_lignes = $pdo->prepare("SELECT COUNT(*) FROM courts") ;
        $nb_lignes->execute() ;
        $nb_lignes = $nb_lignes->fetch() ;

        #var_dump($nb_lignes) ;

        $nb_lignes = intval( $nb_lignes['COUNT(*)'] ) + 1 ;    

    ?>

    <!-- Partie à refresh -->
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
    <!-- Fin de partie à refresh -->

    </div>


</div>

<?php include_once("../includes/partials/footer.html") ; ?>