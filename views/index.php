<!--==========-->

<?php 
include("../includes/partials/header.php") ;

if (!isset($_SESSION)){
    session_start();
}

require_once('../controllers/database.php') ;

    $challenge = $pdo->prepare("SELECT * FROM challenge") ;
    $challenge->execute() ;
    $challenge = $challenge->fetch() ;
?>

<!--==========-->

<div class="container shadow p-3 mb-5 bg-light rounded">

<table>
    <th>   
        <img src="../assets/img/<?php echo($challenge['poster']) ?>" class="img-fluid shadow rounded" alt="Responsive image">
    </th>
    <th width=70%>
        <div class="jumbotron jumbotron-fluid shadow rounded">
            <div class="container">
                <h1 class="display-4"><?php echo($challenge['name']) ?></h1>
                <p class="lead"><?php echo($challenge['description']) ?></p>
            </div>
        </div>
    </th>
</table>

</div>

<?php include_once '../includes/toasts.php'; ?>
<script>
    $(document).ready( function () {
        $('.toast').toast("show")
    } );
</script>