<?php
    require_once '../../includes/functions.php';
    check_auth();

    /* Section arbitre */

    require_once('../../controllers/database.php') ;

    $court = $pdo->prepare("SELECT id FROM court") ;
    $court->execute() ;

    $matchs = $pdo->prepare("SELECT * FROM matchs WHERE state=0 ORDER BY hour ASC") ;
    $matchs->execute() ;

    /* Fin section arbitre */

    include_once '../../includes/partials/header_panel.html';
    include_once '../../includes/toasts.php';
?>
    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light text-primary">ESPACE COMPETITION</h1>
                <p class="lead">Voici l'espace de gestion de la compétition, ici vous pouvez accéder aux différents espace matchs, joueurs et arbitres</p>

                <table>
                    <td>
                        <div class="card border-0 shadow my-5 btn-light">
                            <a href="liste_matchs.php">
                                <div class="card-body p-5">
                                    <h1 class="font-weight-light text-success">Liste des matchs</h1>
                                    <p class="lead">Accès à la liste des matchs</p>
                                </div>
                            </a>
                        </div>
                    </td>

                    <td>
                        <div class="card border-0 shadow my-5 btn-light">
                            <a href="liste_joueurs.php">
                                <div class="card-body p-5">
                                    <h1 class="font-weight-light text-danger">Liste des joueurs</h1>
                                    <p class="lead">Accès à la liste des joueurs</p>
                                </div>
                            </a>
                        </div>
                    </td>

                    <td>
                        <div class="card border-0 shadow my-5 btn-light">
                            <a href="liste_arbitres.php">
                                <div class="card-body p-5">
                                    <h1 class="font-weight-light text-warning">Liste des utilisateurs</h1>
                                    <p class="lead">Accès à la liste des utilisateurs</p>
                                </div>
                            </a>
                        </div>
                    </td>
                </table>

                <!--Espace arbitre-->
                <table>
                    <td>
                        <div class="card border-0 shadow my-5">
                            <div class="card-body p-5">

                                <h1 class="font-weight-light text-info">Arbitre</h1>
                                <p class="lead">Selection des matchs</p>
                                
                                <form class='form-inline'>

                                    <div class="form-group">
                                        <select class="form-control form-control-lg"> 

                                            <?php while($data = $court->fetch()) { ?>
                                                <option>
                                                    <?php echo("Table ".$data['id']) ?>
                                                </option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control form-control-lg">
                                            
                                            <?php while($data = $matchs->fetch()) { ?>
                                                <option>
                                                    <?php echo($data['hour']." - ".$data['blue_player']." - ".$data['red_player']) ?>
                                                </option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-outline-info btn-lg">Submit</button>

                                </form>
 
                            </div>
                        </div>
                    </td>
                </table>
                <!-- Fin espace arbitre-->

            </div>
        </div>
    </div>

<?php include '../../includes/partials/footer_panel.html' ?>
<script>document.getElementById("body").style.background = "url('https://cwsmgmt.corsair.com/newscripts/landing-pages/wallpaper/v4/Wallpaper-v4-1920x1200.jpg') no-repeat center center fixed";</script>
