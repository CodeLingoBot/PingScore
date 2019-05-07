<?php
//TODO : toastr ne pop pas lorsqu'un autre est actif : voir pour réduire le temps du tostr ou autre
require_once '../../includes/functions.php';
administration();
try {
    require_once('../../controllers/database.php');
    $req = "SELECT * FROM users";
    $ps = $pdo -> prepare($req);
    $ps -> execute();
} catch (PDOException $e){
    $msg = 'Erreur PDO dans' . $e -> getMessage();
    die($msg);
}
include_once '../../includes/partials/header_panel.html';
include_once '../../includes/toasts.php';
?>
<div class="jumbotron container">
    <div class="container">
        <h1 class="display-5">Liste des utilisateurs :</h1>
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
                    <th>USERNAME</th>
                    <th>RÔLE</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($data = $ps->fetch()) { ?>
                    <tr id="<?php echo($data['id']) ?>">
                        <td><?php echo($data['username']) ?></td>
                        <td><?php echo($data['role']) ?></td>
                        <td><input type="button" name="edit" value="Editer" id="<?php echo $data['id']; ?>" class="btn btn-info btn-xs edit_data" /></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../../includes/modal_users.html';
include_once '../../includes/partials/footer_panel.html'; ?>
<script type="text/javascript" src="../../assets/js/ajax_utilisateurs.js"></script>
<script type="text/javascript" src="../../assets/js/toastr.js"></script>
<script src="../../assets/js/dataTable_utilisateurs.js" type="text/javascript"></script>
