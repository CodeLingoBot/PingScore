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
    /* $namePicture = $_FILES['picture']['name'];
     $fileTempo = $_FILES['picture']['tmp_name'];
     move_uploaded_file($fileTempo, '../images/'.$namePicture); */
    if($id !== ''){
        $reqQuery = 'UPDATE players SET surname=:surname, name=:name, cat=:cat, club=:club, rank=:rank WHERE id=:id;';
        $query = $pdo->prepare($reqQuery);
        $arrayQuery = array(
            'surname' => $surname,
            'name' => $name,
            'cat' => $cat,
            'club' => $club,
            'rank' => $rank,
            'id' => $id);
        $query->execute($arrayQuery);
    } else {
        $reqQuery = 'INSERT INTO players(surname, name, cat, club, rank) VALUES(:surname, :name, :cat, :club, :rank);';
        $query = $pdo->prepare($reqQuery);
        $query->bindValue(":surname", $surname);
        $query->bindValue(":name", $name);
        $query->bindValue(":cat", $cat);
        $query->bindValue(":club", $club);
        $query->bindValue(":rank", $rank);
        $query->execute();
        $query = "";
    }
    if(isset($query)) {
        $reqSelect = "SELECT * FROM players WHERE id != 0 ORDER BY id ASC";
        $select_query = $pdo->query($reqSelect);
        $select_query->execute();
        $output .= '    
                <!-- Toastr CSS -->
                <link rel="stylesheet" type="text/css" href="../../vendor/toastr/build/toastr.min.css"/>
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
            <td><input type="button" name="edit" value="Editer" id="' . $row["id"] . '" class="btn btn-info btn-xs edit_data" /></td>
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
