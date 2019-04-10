<?php
//TODO: Ajouter fonctionnalité Del Match
//TODO: rajouter les scores

require_once '../host_db.php';

$connect = mysqli_connect($host, $user, $pass, $db);
if(!empty($_POST)){
    $output = '';
    $message = '';
    $hour = mysqli_real_escape_string($connect, $_POST["hour"]);
    $blue_player = mysqli_real_escape_string($connect, $_POST["blue_player"]);
    $red_player = mysqli_real_escape_string($connect, $_POST["red_player"]);
    $court = mysqli_real_escape_string($connect, $_POST["court"]);
    $state = mysqli_real_escape_string($connect, $_POST["state"]);
    if($_POST["id"] != ''){
        $query = "UPDATE matchs SET hour='$hour', blue_player='$blue_player', red_player='$red_player', court='$court', state='$state' WHERE id='".$_POST["id"]."'";
    } else {
        $query = "INSERT INTO matchs(hour, blue_player, red_player, court, state) VALUES('$hour', '$blue_player', '$red_player', '$court', '$state');";
    }
    if(mysqli_query($connect, $query)){
        $select_query = "SELECT m.id, TIME_FORMAT(m.hour, '%H:%i') AS hour, p.surname AS blue_player, p2.surname AS red_player, m.court, m.state FROM matchs m INNER JOIN players p ON p.id = m.blue_player INNER JOIN players p2 ON p2.id = m.red_player  ORDER BY hour ASC";
        $result = mysqli_query($connect, $select_query);
        $output .= '    
                <!-- Toastr CSS -->
                <link rel="stylesheet" type="text/css" href="../../vendor/toastr/build/toastr.min.css"/>
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
    ';
        while($row = mysqli_fetch_array($result))
        {
            $picture = (!empty($row['picture'])) ? "<i class=\"material-icons\">check_box</i>" : "<i class=\"material-icons\">check_box_outline_blank</i>";
            $output .= '
        <tr>
            <td>' . $row["hour"] . '</td>
            <td>' . $row["blue_player"]." - ".$row["red_player"]. '</td>
            <td>' . $row["court"] . '</td>
            <td>' . $row["state"] . '</td>
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