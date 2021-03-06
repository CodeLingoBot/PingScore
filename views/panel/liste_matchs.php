<?php

require_once '../../includes/functions.php';
arbitration();
try {
    require_once('../../controllers/database.php');
    $req = "SELECT m.id, TIME_FORMAT(m.hour, '%H:%i') AS hour, p.surname AS blue_player_surname, p.name AS blue_player_name, p2.surname AS red_player_surname, p2.name AS red_player_name, m.state FROM matchs m INNER JOIN players p ON p.id = m.blue_player INNER JOIN players p2 ON p2.id = m.red_player ORDER BY hour ASC";
    $ps = $pdo -> prepare($req);
    $ps -> execute();
} catch (PDOException $e){
    $msg = 'Erreur PDO dans' . $e -> getMessage();
    die($msg);
}

$mappingSate = ['0'=>'À venir', '1'=>'En cours', '2'=>'Terminé'];

include_once '../../includes/partials/header_panel.html';
include_once '../../includes/toasts.php';
?>
<div class="jumbotron container">
    <div class="container">
        <h1 class="display-5">Liste des matchs :</h1>
        <div align="right">
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Ajouter</button>
        </div>
    </div>
</div>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div id="employee_table" class="container my-5">
            <table id="" class="table table-hover table-responsive-lg dataTable">
                <thead>
                <tr>
                    <th>HEURE</th>
                    <th>MATCH</th>
                    <th>ETAT</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($data = $ps->fetch()){ ?>
                    <tr id="<?php echo($data['id']) ?>">
                        <td><?php echo($data['hour']) ?></td>
                        <td><?php echo($data['blue_player_surname'].' '.$data['blue_player_name'].' - '.$data['red_player_surname'].' '.$data['red_player_name']) ?></td>
                        <td><?php echo($mappingSate[$data['state']]) ?></td>
                        <td>
                            <?php
                                if ($data['state'] == 1) {
                                    echo("<a href='match_arbitre.php?match=".$data['id']."' type='button' name='see' class='btn btn-success btn-xs'>Arbitrer</a>") ;
                                }else{
                                    echo("<a class='btn btn-secondary btn-xs' disabled>Arbitrer</a>") ;
                                }
                            ?>
                            <input type="button" name="edit" value="Editer" id="<?php echo $data['id']; ?>" class="btn btn-info btn-xs edit_data" />

                            
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#match_<?php echo $data['id']; ?>">
                                Supprimer
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="match_<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer le match n°<?php echo($data['id']) ?> ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <a href="../../controllers/matchs/del.php?id=<?php echo($data['id'])?>"><button type="button" class="btn btn-danger" >Confirmer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../../includes/modal_matchs.php';
include_once '../../includes/partials/footer_panel.html'; ?>
<script type="text/javascript" src="../../assets/js/ajax_matchs.js"></script>
<script type="text/javascript" src="../../assets/js/toastr.js"></script>
<script src="../../assets/js/dataTable.js" type="text/javascript"></script>
