<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "PI_aspcn");
if(!empty($_POST)){
    $output = '';
    $message = '';
    $surname = mysqli_real_escape_string($connect, $_POST["surname"]);
    $name = mysqli_real_escape_string($connect, $_POST["name"]);
    $cat = mysqli_real_escape_string($connect, $_POST["cat"]);
    $club = mysqli_real_escape_string($connect, $_POST["club"]);
    $rank = mysqli_real_escape_string($connect, $_POST["rank"]);
    if($_POST["id"] != ''){
        $query = "UPDATE players SET surname='$surname', name='$name', cat='$cat', club = '$club', rank = '$rank' WHERE id='".$_POST["id"]."'";
        $message = 'Data Updated';
    } else {
        $query = "INSERT INTO players(surname, name, cat, club, rank) VALUES('$surname', '$name', '$cat', '$club', '$rank');";
        $message = 'Data Inserted';
    }
    if(mysqli_query($connect, $query)){
        $output .= '<label class="text-success">' . $message . '</label>';
        $select_query = "SELECT * FROM players ORDER BY id ASC";
        $result = mysqli_query($connect, $select_query);
        $output .= '    <!-- Material icons Google fonts-->
    <link href="../../vendor/material-design-icons/iconfont/material-icons.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="../../vendor/DataTables/media/css/dataTables.bootstrap4.min.css"/>
    <!-- Toastr CSS -->
    <link rel="stylesheet" type="text/css" href="../../vendor/toastr/build/toastr.min.css"/>
    <!-- Custom styles for this template -->
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
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../vendor/bootstrap/dist/js/bootstrap.min.js.map"></script>
    <!-- Datatables JS -->
    <script type="text/javascript" src="../../vendor/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../vendor/DataTables/media/js/dataTables.bootstrap4.min.js"></script>
    <!-- Toastr JS -->
    <script type="text/javascript" src="../../vendor/toastr/build/toastr.min.js"></script>
    <script type="text/javascript" src="../../vendor/toastr/nuget/content/scripts/toastr.min.js.map"></script>
    <!-- Scripts for this page -->
    <script src="../../assets/js/dataTable_joueurs.js"></script>';
    }
    echo $output;
}