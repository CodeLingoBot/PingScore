<?php
//TODO : Google Trad + contenu
//TODO : rajouter les files photo dans Add et Edit
//TODO: rajouter les scores

require_once '../../includes/functions.php';
check_auth();
try {
    require_once('../../controllers/database.php');
    $req = "SELECT m.id, TIME_FORMAT(m.hour, '%H:%i') AS hour, p.surname AS blue_player, p2.surname AS red_player, m.court, m.state FROM matchs m INNER JOIN players p ON p.id = m.blue_player INNER JOIN players p2 ON p2.id = m.red_player  ORDER BY hour ASC";
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
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
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
                    <th>N° TABLE</th>
                    <th>ETAT</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($data = $ps->fetch()){ ?>
                    <tr id="<?php echo($data['id']) ?>">
                        <td><?php echo($data['hour']) ?></td>
                        <td><?php echo($data['blue_player'].' - '.$data['red_player']) ?></td>
                        <td><?php echo($data['court']) ?></td>
                        <td><?php echo($mappingSate[$data['state']]) ?></td>
                        <td><input type="button" name="edit" value="Edit" id="<?php echo $data['id']; ?>" class="btn btn-info btn-xs edit_data" /></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../../includes/modal_matchs.html';
include_once '../../includes/partials/footer_panel.html'; ?>
<script type="text/javascript" src="../../assets/js/ajax_matchs.js"></script>
<script type="text/javascript" src="../../assets/js/toastr.js"></script>