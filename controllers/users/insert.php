<?php
//TODO: Ajouter fonctionnalité Del User
//TODO: dans la modal users voir pour auto select le role lors d'une edition

require_once '../database.php';

if(!empty($_POST)){
    $output = '';
    $message = '';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST["role"];
    $id = $_POST["id"];

    if($id !== ''){
        $reqQuery = "UPDATE users SET username=:username, password=:password, role=:role WHERE id=:id";
        $query = $pdo->prepare($reqQuery);
        $query->bindValue(":username", $username);
        $query->bindValue(":password", $password);
        $query->bindValue(":role", $role);
        $query->bindValue(":id", $id);
        $query->execute();
    } else {
        $reqQuery = "INSERT INTO users(username, password, role) VALUES(:username, :password, :role);";
        $query = $pdo->prepare($reqQuery);
        $query->bindValue(":username", $username);
        $query->bindValue(":password", $password);
        $query->bindValue(":role", $role);
        $query->execute();
    }
    if(isset($query)){
        $reqSelect = "SELECT * FROM users";
        $select_query = $pdo->query($reqSelect);
        $select_query->execute();
        $output .= '    
                <!-- Toastr CSS -->
                <table id="" class="table table-hover table-responsive-lg dataTable">
                <thead>
                <tr>
                    <th>USERNAME</th>
                    <th>RÔLE</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
    ';
        while($row = $select_query->fetch())
        {
            $output .= '
                <tr>
                    <td>' . $row["username"] . '</td>
                    <td>' . $row["role"] . '</td>
                    <td>
                    <input type="button" name="edit" value="Editer" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" />
                    <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#user_'.$row["id"].'">
                                Supprimer
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="user_'.$row["id"].'" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer l\'utilisateur <i>' . $row["username"] . '</i>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <a href="../../controllers/users/del.php?id='.$row["id"].'"><button type="button" class="btn btn-danger" >Confirmer</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                </tr>
            ';
        }
        $output .= '
        </table>    
        <!-- Scripts for this page -->
        <script src="../../assets/js/dataTable.js"></script>
    ';
    }
    echo $output;
}