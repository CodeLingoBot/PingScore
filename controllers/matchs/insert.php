<?php
//TODO: Ajouter fonctionnalité Del Match

require_once '../database.php';

if(!empty($_POST)){
    $output = '';
    $message = '';
    $hour = $_POST["hour"];
    $blue_player = $_POST["blue_player"];
    $red_player = $_POST["red_player"];
    $state = $_POST["state"];
    $score = '{"round1":{"blue":0,"red":0,"state" : 0},"round2":{"blue":0,"red":0,"state" : 0},"round3":{"blue":0,"red":0,"state" : 0},"round4":{"blue":0,"red":0,"state" : 0},"round5":{"blue":0,"red":0,"state" : 0}}';
    $id = $_POST["id"];
    $mappingSate = ['0'=>'À venir', '1'=>'En cours', '2'=>'Terminé'];
    if($_POST["id"] !== ''){
        $reqQuery = 'UPDATE matchs SET hour=:hour, blue_player=:blue_player, red_player=:red_player, state=:state WHERE id=:id;';
        $query = $pdo->prepare($reqQuery);
        $query->bindValue(":hour", $hour);
        $query->bindValue(":blue_player", $blue_player);
        $query->bindValue(":red_player", $red_player);
        $query->bindValue(":state", $state);
        $query->bindValue(":id", $id);
        $query->execute();
    } else {
        $query = "INSERT INTO matchs(hour, blue_player, red_player, state, score) VALUES(:hour, :blue_player, :red_player, :state, :score);";
        $query = $pdo->prepare($reqQuery);
        $query->bindValue(":hour", $hour);
        $query->bindValue(":blue_player", $blue_player);
        $query->bindValue(":red_player", $red_player);
        $query->bindValue(":state", $state);
        $query->bindValue(":score", $score);
        $query->execute();
    }
    if(isset($query)){
        $reqSelect = "SELECT m.id, TIME_FORMAT(m.hour, '%H:%i') AS hour, p.surname AS blue_player, p2.surname AS red_player, m.state FROM matchs m INNER JOIN players p ON p.id = m.blue_player INNER JOIN players p2 ON p2.id = m.red_player  ORDER BY hour ASC";
        $select_query = $pdo->query($reqSelect);
        $select_query->execute();
        $output .= '    
                <!-- Toastr CSS -->
                <link rel="stylesheet" type="text/css" href="../../vendor/toastr/build/toastr.min.css"/>
                <table id="" class="table table-hover table-responsive-lg dataTable">
                <thead>
                <tr>
                    <th>HEURE</th>
                    <th>MATCH</th>
                    <th>ETAT</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
    ';
        while($row = $select_query->fetch())
        {
            $picture = (!empty($row['picture'])) ? "<i class=\"material-icons\">check_box</i>" : "<i class=\"material-icons\">check_box_outline_blank</i>";
            $output .= '
        <tr>
            <td>' . $row["hour"] . '</td>
            <td>' . $row["blue_player"]." - ".$row["red_player"]. '</td>
            <td>' . $mappingSate[$row["state"]] . '</td>
            <td><input type="button" name="edit" value="Editer" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /> <a href="match_arbitre.php?match='.$row["id"] .'" type="button" name="see" class="btn btn-success btn-xs">Voir</a></td>
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