<?php
//TODO : toastr ne pop pas lorsqu'un autre est actif
require_once '../../includes/functions.php';
check_auth();
try {
    require_once('../../controllers/database.php');
    $req = "SELECT * FROM users ORDER BY id ASC";
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
        <h1 class="display-5">Liste des arbitres :</h1>
        <div align="right">
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
        </div>
    </div>
</div>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div id="employee_table" class="container my-5">
            <table id="" class="table table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($data = $ps->fetch()) { ?>
                    <tr id="<?php echo($data['id']) ?>">
                        <td><?php echo($data['id']) ?></td>
                        <td><?php echo($data['username']) ?></td>
                        <td><?php echo($data['password']) ?></td>
                       <td><input type="button" name="edit" value="Edit" id="<?php echo $data["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../../includes/modal_users.html';
include_once '../../includes/partials/footer_panel.html'; ?>
<script type="text/javascript" src="../../assets/js/ajax_arbitres.js"></script>
<script type="text/javascript" src="../../assets/js/toastr.js"></script>