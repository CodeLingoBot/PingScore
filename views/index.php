<!--==========-->

<?php 
include("../includes/partials/header.php") ;
if (!isset($_SESSION)){
    session_start();
}
var_dump($_SESSION);
?>

<!--==========-->

<div class="container">

    <img src="../assets/img/logo_ping_score.svg" class="img-fluid" alt="Responsive image">

</div>

<?php include_once '../includes/toasts.php'; ?>
<script>
    $(document).ready( function () {
        $('.toast').toast("show")
    } );
</script>