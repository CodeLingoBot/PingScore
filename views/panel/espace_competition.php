<?php
    require_once '../../includes/functions.php';
    administration();

    require_once('../../controllers/database.php') ;

    try {
        $court = $pdo->query("SELECT * FROM courts") ;
    } catch (Exception $e){
        echo 'Message: ' .$e->getMessage();
    }

    include_once '../../includes/partials/header_panel.html';
    include_once '../../includes/toasts.php';

?>

<?php if ($data = $court->fetchAll()) : ?>

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#resetModal" style="float: right;">
                        Réinitialiser la compétition
                    </button>
                <h1 class="font-weight-light text-primary">ESPACE COMPETITION</h1>
                <p class="lead">Voici l'espace de gestion de la compétition, ici vous pouvez accéder aux différents espaces matchs, joueurs et utilisateurs</p>

                <div class="row">

                    <div class="col-sm">
                        <div class="card border-0 shadow my-5 btn-light" style="height: 275px;">
                            <a href="liste_matchs.php">
                                <div class="card-body p-5">
                                    <h1 class="font-weight-light text-success">Liste des matchs</h1>
                                    <p class="lead">Accès à la liste des matchs</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="card border-0 shadow my-5 btn-light" style="height: 275px;">
                            <a href="liste_joueurs.php">
                                <div class="card-body p-5">
                                    <h1 class="font-weight-light text-danger">Liste des joueurs</h1>
                                    <p class="lead">Accès à la liste des joueurs</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="card border-0 shadow my-5 btn-light" style="height: 275px;"  >
                            <a href="liste_utilisateurs.php">
                                <div class="card-body p-5">
                                    <h1 class="font-weight-light text-warning">Liste des utilisateurs</h1>
                                    <p class="lead">Accès à la liste des utilisateurs</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

<?php else : ?>

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light text-primary">INITIALISATION COMPETITION</h1>
                <p class="lead">Veuillez entrer les paramètres de la compétition</p>

                <form method="post" enctype="multipart/form-data" action="../../controllers/readfile.php">
                    <div class="form-group">
                        <label for="name">Nom de la compétition</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="custom-file">
                        <label class="custom-file-label" for="affiche">Importer l'affiche</label>
                        <input type="file" name="affiche" class="custom-file-input" id="affiche">
                    </div>

                    <div class="form-group  mt-2">
                        <label for="info">Informations complémentaires</label>
                        <textarea class="form-control" name="info" id="info" rows="3" required></textarea>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="aaa">Nombre de table</label>
                        <input type="text" name="courts" class="form-control" id="aaa" required>
                    </div>

                    <div class="custom-file">
                        <label class="custom-file-label">Importer la base de donnée</label>
                        <input type="file" name="file" class="custom-file-input">
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary mt-4">Valider</button>
                </form>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php include '../../includes/modal_rest.html' ?>

<?php include_once '../../includes/partials/footer_panel.html' ?>