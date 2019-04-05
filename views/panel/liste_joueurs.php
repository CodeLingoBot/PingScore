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

include_once '../../includes/partials/header_panel.php';
include_once '../../includes/toasts.php';
?>

<div class="jumbotron container">
    <div class="container">
        <h1 class="display-5">Liste des joueurs :</h1>
        <div align="right">
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
        </div>
    </div>
</div>




<div class="container">
    <div class="card border-0 shadow my-5">
        <div id="employee_table" class="container my-5">
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
                    <th>ACTION</th>

                </tr>
                </thead>
                <tbody>
                <?php while ($data = $ps->fetch()) { ?>
                    <tr id="<?php echo($data['id']) ?>">
                        <td><?php echo($data['id']) ?></td>
                        <td><?php echo($data['surname']) ?></td>
                        <td><?php echo($data['name']) ?></td>
                        <td><?php echo($data['cat']) ?></td>
                        <td><?php echo($data['club']) ?></td>
                        <td><?php echo($data['rank']) ?></td>
                        <td><?php $res = (!empty($data['picture'])) ? "<i class=\"material-icons\">check_box</i>" : "<i class=\"material-icons\">check_box_outline_blank</i>"; echo $res ?></td>
                        <td><input type="button" name="edit" value="Edit" id="<?php echo $data["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
//TODO : Rédiger le contenu
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Enter Player Surname</label>
                    <input type="text" name="surname" id="surname" class="form-control" />
                    <br />
                    <label>Enter Employee Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <br />
                    <label>Select Categorie</label>
                    <select name="cat" id="cat" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    <br />
                    <label>Enter Club</label>
                    <input type="text" name="club" id="club" class="form-control" />
                    <br />
                    <label>Enter Classement</label>
                    <input type="text" name="rank" id="rank" class="form-control" />
                    <br />
                    <input type="hidden" name="id" id="id"/>
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/partials/footer_panel.php'?>

<script>
    $(document).ready(function(){
        $('#add').click(function(){
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function(){
            var id = $(this).attr("id");
            $.ajax({
                url:"../../controllers/fetch.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                    $('#surname').val(data.surname);
                    $('#name').val(data.name);
                    $('#cat').val(data.cat);
                    $('#club').val(data.club);
                    $('#rank').val(data.rank);
                    $('#id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function(event){
            event.preventDefault();
            if($('#surname').val() == "")
            {
                alert("Name is required");
            }
            else if($('#name').val() == '')
            {
                alert("Address is required");
            }
            else if($('#club').val() == '')
            {
                alert("Designation is required");
            }
            else if($('#rank').val() == '')
            {
                alert("Age is required");
            }
            else
            {
                $.ajax({
                    url:"../../controllers/insert.php",
                    method:"POST",
                    data:$('#insert_form').serialize(),
                    beforeSend:function(){
                        $('#insert').val("Inserting");
                    },
                    success:function(data){
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#employee_table').html(data);
                    }
                });
            }
        });
        $(document).on('click', '.view_data', function(){
            var id = $(this).attr("id");
            if(id != '')
            {
                $.ajax({
                    url:"select.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        $('#employee_detail').html(data);
                        $('#dataModal').modal('show');
                    }
                });
            }
        });
    });
</script>