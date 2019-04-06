<!--==========-->

<?php include("../includes/partials/header.php") ?>

<!--==========-->

<h3 class="text-center">Tableau des matchs en cours</h3>

<div class="container bg-light">

    <!-- Partie à refresh -->
    <?php echo("<div class='row'>")?>

    <?php 
        for ($i=1; $i < 17; $i++) {
            
            $tab = array(3, 5, 8, 11, 14);
        
            if (in_array($i, $tab) ){
                echo("
                </div>

                <div class='row'>");
            };

            $nb = $i;
            require("../includes/courts.php");

        } ; 
    
    ?>

    <?php echo('</div>')?>
    <!-- Fin de partie à refresh -->


</div>