<style>
    #score1 {
        height: 100px;
        width: 200px;
        display: inline-block;
        margin: 100px;
        padding: 5px;


    }
    #score2 {
        height: 100px;
        width: 200px;
        display: inline-block;
        padding: 5px;
        margin: 150px;



    }
</style>

<div class="btn-primary" id="score1">Nombres de points du joueur 1</div>

<div class="btn-danger" id="score2">Nombre de points du joueur 2</div>


<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin%ss\') AS date_ajout FROM minichat ORDER BY ID DESC LIMIT 0, 10');
   
while ($donnees = $reponse->fetch()) {
    echo 'test '
    ;
}
      
$reponse->closeCursor();
?>