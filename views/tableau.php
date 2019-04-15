<!--==========-->

<?php include("../includes/partials/header.html") ?>

<!--==========-->

<h3 class="text-center">Tableau des matchs en cours</h3>

<div class="container bg-light">

    <div class='row'>

    <?php

        require_once('../controllers/database.php') ;

        $nb_lignes = $pdo->prepare("SELECT COUNT(*) FROM court") ;
        $nb_lignes->execute() ;
        $nb_lignes = $nb_lignes->fetch() ;

        #var_dump($nb_lignes) ;

        $nb_lignes = intval( $nb_lignes['COUNT(*)'] ) + 1 ;    

    ?>

    <!-- Partie à refresh -->
    <?php
        for ($i=1; $i < $nb_lignes ; $i++) {
            
            $tab = array(3, 5, 8, 11, 14, 17);
        
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