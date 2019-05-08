<?php
//TODO: Ajouter fonctionnalité Del Player

require_once '../database.php';

if(!empty($_POST)){
    $output = '';
    $message = '';
    $id = $_POST["id"];
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $cat = $_POST["cat"];
    $club = $_POST["club"];
    $rank = $_POST["rank"];
    $namePicture = $_FILES['picture']['name'];
    $fileTempo = $_FILES['picture']['tmp_name'];
    move_uploaded_file($fileTempo, '../../assets/img/'.$namePicture);

    if($id !== ''){
        $reqQuery = 'UPDATE players SET surname=:surname, name=:name, cat=:cat, club=:club, rank=:rank picture=:picture WHERE id=:id;';
        $query = $pdo->prepare($reqQuery);
        $arrayQuery = array(
            'surname' => $surname,
            'name' => $name,
            'cat' => $cat,
            'club' => $club,
            'rank' => $rank,
            'picture' => $namePicture,
            'id' => $id);
        $query->execute($arrayQuery);
    } else {
        $reqQuery = 'INSERT INTO players(surname, name, cat, club, rank, picture) VALUES(:surname, :name, :cat, :club, :rank, :picture);';
        $query = $pdo->prepare($reqQuery);
        $query->bindValue(":surname", $surname);
        $query->bindValue(":name", $name);
        $query->bindValue(":cat", $cat);
        $query->bindValue(":club", $club);
        $query->bindValue(":rank", $rank);
        $query->bindValue(":picture", $namePicture);
        $query->execute();
        $query = "";
    }
    if(isset($query)) {
        $reqSelect = "SELECT * FROM players WHERE id != 0 ORDER BY id ASC";
        $select_query = $pdo->query($reqSelect);
        $select_query->execute();
        $output .= '    
                <!-- Toastr CSS -->
                <table id="" class="table table-hover table-responsive-lg dataTable">
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
        ';
        while ($row = $select_query->fetch()) {
            $picture = (!empty($row['picture'])) ? "<i class=\"material-icons\">check_box</i>" : "<i class=\"material-icons\">check_box_outline_blank</i>";
            $output .= '
        <tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["surname"] . '</td>
            <td>' . $row["name"] . '</td>
            <td>' . $row["cat"] . '</td>
            <td>' . $row["club"] . '</td>
            <td>' . $row["rank"] . '</td>
            <td>' . $picture . '</td>
            <td>
                <input type="button" name="edit" value="Editer" id="' . $row["id"] . '" class="btn btn-info btn-xs edit_data" />
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#user_' . $row["id"] . '">
                    &times;
                </button>
                <!-- Modal -->
                <div class="modal fade" id="user_' . $row["id"] . '" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer ' . $row["surname"] . ' ' . $row["name"] . ' ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <a href="../../controllers/users/del.php?id=' . $row["id"] . '"><button type="button" class="btn btn-danger" >Confirmer</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        ';
        }
        $output .= '</table>    
        <!-- Scripts for this page -->
        <script src="../../assets/js/dataTable.js"></script>
        ';
    }
    echo $output;
}
