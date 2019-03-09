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

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
}
$nom_joueur = $bdd->query('SELECT nom FROM joueur');
   
$joueur1 = $nom_joueur->fetch();
$joueur2 = $nom_joueur->fetch();

$score_joueur = $bdd->query('SELECT score FROM joueur');
$score1 = $score_joueur->fetch();
$score2 = $score_joueur->fetch();

?>

<div class="btn-primary" id="score1">
    Joueur 1 : <?php echo $joueur1['nom']; ?> 
    </br> 
    Score : <?php echo $score1['score']; ?> 
</div>

<div class="btn-danger" id="score2">
    Joueur 2 : <?php echo $joueur2['nom']; ?> 
    </br> 
    Score : <?php echo $score2['score']; ?> 
</div>


