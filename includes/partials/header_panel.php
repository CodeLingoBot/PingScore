<?php


?>


<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>Espace Compétition · Ping Score</title>
    <!-- Custom fonts for this template-->
    <link href="../../vendor/material-design-icons/iconfont/material-icons.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="../../vendor/DataTables/media/css/dataTables.bootstrap4.min.css"/>
    <!-- Custom styles for this template -->

    <style>
        body {
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }

        a {
            text-decoration: none;
            cursor: default;
            color: #000;
        }
        a:hover {
            text-decoration: none;
            cursor: default;
            color: #000;
        }
    </style>

</head>
<body id="body">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow ">
        <div class="container">
            <a class="navbar-brand" href="espace_competition.php"> > Ping Score</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">


                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>


                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Espace Compétition</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="liste_matchs.php">Matchs</a>
                            <a class="dropdown-item" href="liste_joueurs.php">Joueurs</a>
                            <a class="dropdown-item" href="liste_arbitres.php">Arbitres</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Deconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if(isset($_SESSION['flash'])): ?>
            <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                <div class="alert alert-<?= $type; ?>">
                    <?= $message ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
    </div>
