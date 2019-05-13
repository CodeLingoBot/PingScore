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
    
    <div id="reload_tableau">

        <?php

        include '../includes/tableau_reload.php';

        ?>

    </div>


</div>

<?php include("../includes/partials/footer.html") ?>
