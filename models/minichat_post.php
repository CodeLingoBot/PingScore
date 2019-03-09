<?php
setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
?>
 
<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
   
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_ajout) VALUES(?, ?, NOW())');
$req->execute(array($_POST['pseudo'], $_POST['message']));
   
// Redirection du visiteur vers l'index
header('Location: index.php');
?>