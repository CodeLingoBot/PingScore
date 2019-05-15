<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>>PingScore</title>
        <!--favicon-->
        <link rel="icon" href="../assets/img/logo_ping_score.png" sizes="32x32" type="image/png">
        <link rel="apple-touch-icon" href="../assets/img/logo_ping_score.png"/>

        <link href="../vendor/fortawesome/font-awesome/css/all.css" rel="stylesheet" type="text/css">
        <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../assets/css/ecran.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

<div class="container-fluid p-3 mb-5" id="container-tableau">
    
    <br>

    <div class='row' id="top">

    <?php

        require_once('../controllers/database.php') ;

        $nb_lignes = $pdo->prepare("SELECT COUNT(*) FROM courts") ;
        $nb_lignes->execute() ;
        $nb_lignes = $nb_lignes->fetch() ;

        #var_dump($nb_lignes) ;

        $nb_lignes = intval( $nb_lignes['COUNT(*)'] ) + 1 ;    

    ?>

    <!-- Partie à refresh -->
    <?php
        for ($i=1; $i < $nb_lignes ; $i++) {
            
            $tab = array(3, 5, 7, 11, 13, 15, 17);
        
            if (in_array($i, $tab) ){
                echo("
                </div>

                <div class='row'>");
            }elseif($i == 9){
                echo("
                </div>
                
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class='row' id='bottom'>");
            };

            $nb = $i;
            require("../includes/courts_ecran.php");

        } ; 
    
    ?>
    <!-- Fin de partie à refresh -->

    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</div>