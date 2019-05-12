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

        <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../assets/css/styles.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 shadow">
            <div class="container">
                <a class="navbar-brand" href="index.php">> PingScore</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="tableau.php">Tableau</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="termine.php">Terminé</a>
                        </li>
                        <li class="nav-item">
                        <?php if(empty($_SESSION['auth'])){
                            echo('<a class="nav-link" href="panel/login.php">Connexion</a>') ;
                        }else{
                            echo('<a class="nav-link" href="panel/espace_competition.php">Espace compétition</a>') ;
                        } ?>
                            
                        </li>
                    </ul>
                    <span class="navbar-text">Un live-scoring de qualité par In'tech</span>
                </div>
            </div>
        </nav>
