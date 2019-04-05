<!--==========-->

<?php include("../includes/partials/header.php") ?>

<!--==========-->

<div class="container">

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


</div>