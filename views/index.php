<?php

include_once("../includes/functions.php") ;

start();

require_once('../controllers/database.php') ;

    $challenge = $pdo->prepare("SELECT * FROM challenge") ;
    $challenge->execute() ;
    $challenge = $challenge->fetch() ;

    debug($_SESSION);

include("../includes/partials/header.php") ;
include_once ("../includes/toasts.php");


?>

<!--==========-->

<div class="container shadow p-3 mb-5 bg-light rounded">

<table>
    <th id="affiche">   
        <img src="../assets/img/<?php echo($challenge['poster']) ?>" class="img-fluid shadow rounded">
    </th>
    <th width=70%>
        <div class="jumbotron jumbotron-fluid bg-light">
            <div class="container">
                <h1 class="display-4"><?php echo($challenge['name']) ?></h1>
                <p class="lead"><?php echo($challenge['description']) ?></p>
            </div>
            <hr class="my-4 ml-3">
            <a class="btn btn-primary btn-lg ml-3" href="../views/tableau.php" role="button">Tableau</a>
        </div>
    </th>
</table>

</div>

<?php include_once '../includes/toasts.php'; ?>
<?php include("../includes/partials/footer.html") ?>
<script>
    $(document).ready( function () {
        $('.toast').toast("show")
    } );
</script>