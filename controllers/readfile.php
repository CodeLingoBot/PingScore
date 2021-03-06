<?php

require_once 'login_id.php';
require_once 'database.php';

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

$titre = $_POST['titre'];
if (empty($_FILES["affiche"]['name'])) { 
    $affiche = 'logo_ping_score.png'; 
}else{ 
    $affiche = "Affiche.png" ;

    $fichierTempo = $_FILES["affiche"]["tmp_name"] ;
    move_uploaded_file($fichierTempo, "../assets/img/".$affiche) ;
} ;
$info = $_POST['info'];
$courts = $_POST['courts'];

####
#Vidange
$reqBase = "
            TRUNCATE ".$db.".`challenge`;
            TRUNCATE ".$db.".`courts`;
            TRUNCATE ".$db.".`players`;
            TRUNCATE ".$db.".`matchs`;
            ";
    $insertBase = $pdo->prepare($reqBase);
    $insertBase->execute();
    $insertBase->closeCursor();

####
#Création tables
$i = 1;
while ($i <= $courts) {
    $reqCourt = "INSERT INTO `courts` (`id`, `match_id`, `video`) VALUES (?, NULL, '')";
    $insertCourt = $pdo->prepare($reqCourt);
    $insertCourt->execute(array($i));
    $insertCourt->closeCursor();
    $i++;
}

####
#Traitement csv
$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

    $arr_file = explode('.', $_FILES['file']['name']);
    $extension = end($arr_file);

    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    }

    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    $sheetData_lenght = count($sheetData);

    for ($i = 1; $i < $sheetData_lenght; $i++) {
        $surname = $sheetData[$i][0];
        $name = $sheetData[$i][1];
        $cat = $sheetData[$i][2];
        $club = $sheetData[$i][3];
        $rank = $sheetData[$i][4];

        $reqQuery = 'INSERT INTO players(surname, name, cat, club, rank) VALUES(:surname, :name, :cat, :club, :rank);';
        $query = $pdo->prepare($reqQuery);
        $query->bindValue(":surname", $surname);
        $query->bindValue(":name", $name);
        $query->bindValue(":cat", $cat);
        $query->bindValue(":club", $club);
        $query->bindValue(":rank", $rank);
        $query->execute();
    };
} ;

$reqChallenge = "INSERT INTO `challenge` (`name`, `poster`, `description`) VALUES (?, ?, ?)";
$insertChallenge = $pdo->prepare($reqChallenge);
$insertChallenge->execute(array($titre, $affiche, $info));

header('Location: ../views/panel/espace_competition.php');