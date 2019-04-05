<?php

require_once '../../includes/functions.php';

check_auth();

try {
    require_once('../../controllers/database.php');
    $req = "SELECT * FROM players ORDER BY id ASC";
    $ps = $pdo -> prepare($req);
    $ps -> execute();
}

catch (PDOException $e){
    $msg = 'Erreur PDO dans' . $e -> getMessage();
    die($msg);
}

include_once '../../includes/partials/header_panel.php'?>

<div class="jumbotron container">
    <div class="container">
        <h1 class="display-5">Liste des joueurs :</h1>
        <p></p>
    </div>
</div>




<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="container my-5">
            <table id="table_joueurs" class="table table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRÉNOM</th>
                    <th>CATÉGORIE</th>
                    <th>CLUB</th>
                    <th>CLASSEMENT</th>
                    <th>PHOTO</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($data = $ps->fetch()) { ?>
                    <tr id="ligne_<?php echo($data['id']) ?>">
                        <td><?php echo($data['id']) ?></td>
                        <td><?php echo($data['surname']) ?></td>
                        <td><?php echo($data['name']) ?></td>
                        <td><?php echo($data['cat']) ?></td>
                        <td><?php echo($data['club']) ?></td>
                        <td><?php echo($data['rank']) ?></td>
                        <td><?php $res = (!empty($data['picture'])) ? "<i class=\"material-icons\">check_box</i>" : "<i class=\"material-icons\">check_box_outline_blank</i>"; echo $res ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    </div>
</div>

<?php include '../../includes/partials/footer_panel.php'?>


<!--
<td><a href="editPlayer.php?id=<?php echo($data['id']); ?>"><button class="btn btn-success">Editer</button></a></td>

<td><button class="btn btn-danger" data-toggle="modal" data-target="#<?php echo($data['id']) ?>">Supprimer</button></td>


<div class="modal fade" id="<?php echo($data['id'])?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer <?php echo($data['name']) ?> <?php echo($data['surname']) ?> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="../../controllers/delPlayer.php?id=<?php echo($data['id'])?>"><button type="button" class="btn btn-danger">Confirmer</button></a>
            </div>
        </div>
    </div>
</div>
 -->
