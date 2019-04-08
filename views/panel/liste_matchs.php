<?php
//TODO : Google Trad + contenu
//TODO : rajouter les files photo dans Add et Edit
require_once '../../includes/functions.php';
check_auth();
try {
    require_once('../../controllers/database.php');
    $req = "SELECT * FROM matchs ORDER BY hour ASC";
    $ps = $pdo -> prepare($req);
    $ps -> execute();
    $req1 = "SELECT surname FROM players";
    $ps1 = $pdo -> prepare($req1);
    $ps1 -> execute();
    $data1 = $ps1 -> fetchAll();
} catch (PDOException $e){
    $msg = 'Erreur PDO dans' . $e -> getMessage();
    die($msg);
}
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
                        <td><?php echo($data1[$data['blue_player']]['surname'].' - '.$data1[$data['red_player']]['surname']) ?></td>
                        <td><?php echo($data['court']) ?></td>
                        <td><?php echo($data['state']) ?></td>
                        <td><input type="button" name="edit" value="Edit" id="<?php echo $data["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>
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