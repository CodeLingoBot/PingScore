<?php
require_once '../../includes/functions.php';
require_once '../../controllers/database.php';
$req = "SELECT * FROM players WHERE id = ?";
$ps = $pdo -> prepare($req);
$id=$_GET['id'];
$ps -> execute(array($id));
$dataPlayer = $ps->fetch();
include_once('../../includes/partials/header_panel.html');
?>

<div class="jumbotron">
    <div class="container">
        <h1 class="display-5">Edition de <?php echo ($dataPlayer['name'])." ".($dataPlayer['surname'])?> :</h1>
        <p></p>
    </div>
</div>
<div class="container">
    <div class="card border-0 shadow my-5">
        <form method="post" action="../../controllers/edit.php" enctype="multipart/form-data">
            <div class="form-group container">
                <label class="control-label"></label >
                <input type="hidden" name="id" value="<?php echo ($dataPlayer['id']) ?>" class="form-control">
            </div>
            <div class="form-group container">
                <label class="control-label">Prénom</label >
                <input type="text" name="name" value="<?php echo ($dataPlayer['name']) ?>" class="form-control">
            </div>
            <div class="form-group container">
                <label class="control-label">Nom</label>
                <input type="text" name="surname" value="<?php echo ($dataPlayer['surname']) ?>" class="form-control">
            </div>
            <div class="form-group container">
                <label class="control-label">Catégorie</label>
                <input type="text" name="cat" value="<?php echo ($dataPlayer['cat']) ?>" class="form-control">
            </div>
            <div class="form-group container">
                <label class="control-label">Club</label>
                <input type="text" name="club" value="<?php echo ($dataPlayer['club']) ?>" class="form-control">
            </div>
            <div class="form-group container">
                <label class="control-label">Classement</label>
                <input type="text" name="rank" value="<?php echo ($dataPlayer['rank']) ?>" class="form-control">
            </div>
            <div class="form-group container">
                <label class="control-label">Photo</label>
                <input type="file" name="picture" class="file-label">
                <img src="../assets/img/<?php echo $dataPlayer['picture'] ?>" width="100" height="100">
            </div>
            <div class="form-group container">
                <button type="submit" class="btn btn-secondary">Modifier</button>
            </div>
        </form>
    </div>
</div>