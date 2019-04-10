<?php
//TODO: Ajouter fonctionnalité Del User
//TODO: bug datatable

require_once '../host_db.php';

$connect = mysqli_connect($host, $user, $pass, $db);if(!empty($_POST)){
    $output = '';
    $message = '';
    $surname = mysqli_real_escape_string($connect, $_POST["surname"]);
    $name = mysqli_real_escape_string($connect, $_POST["name"]);
    $cat = mysqli_real_escape_string($connect, $_POST["cat"]);
    $club = mysqli_real_escape_string($connect, $_POST["club"]);
    $rank = mysqli_real_escape_string($connect, $_POST["rank"]);
    if($_POST["id"] != ''){
        $query = "UPDATE players SET surname='$surname', name='$name', cat='$cat', club = '$club', rank = '$rank' WHERE id='".$_POST["id"]."'";
        $message = $_POST['name'] . ' ' . $_POST['surname'] . '\'s Informations Updated';
    } else {
        $query = "INSERT INTO players(surname, name, cat, club, rank) VALUES('$surname', '$name', '$cat', '$club', '$rank');";
        $message = $_POST['name'] . ' ' . $_POST['surname'] . '\'s Informations Inserted';
    }
    if(mysqli_query($connect, $query)){
        $select_query = "SELECT * FROM players WHERE id != 0 ORDER BY id ASC";
        $result = mysqli_query($connect, $select_query);
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
        while($row = mysqli_fetch_array($result))
        {
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
            <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>
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