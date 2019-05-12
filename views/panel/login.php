<?php
require_once "../../includes/functions.php";

start();

if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once "../../controllers/database.php";
    $req = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $req->execute(['username' => $_POST['username']]);
    if (($user = $req->fetch(PDO::FETCH_OBJ)) && password_verify($_POST['password'], $user->password)) {
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté.';
        $_SESSION['auth'] = $user;
        header('Location: espace_competition.php');
        exit();
    } else {
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect.';
    }
}
/*
$real_passwd = "att";
$passwrd = password_hash($real_passwd, PASSWORD_BCRYPT);
debug($passwrd);
$verif = password_verify($real_passwd, $passwrd);
debug($verif);

echo ($verif) ? 'Passwd = ' . $real_passwd : 'Erreur'
*/
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Luc NICOLAS">
    <title>Login · >Ping Score</title>
    <link rel="icon" href="../../assets/img/logo_ping_score.png" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="../../assets/img/logo_ping_score.png"/>
    <!-- Bootstrap core CSS -->
    <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../assets/css/signin.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
    font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
<?php include_once '../../includes/toasts.php'; ?>
    <div class="container text-center">
        <form method="post" action="" enctype="multipart/form-data" class="form-signin">
            <img class="mb-4" src="../../assets/img/logo_ping_score.svg" alt="" width="300">
            <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Identifiant" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required>
            <button class="btn btn-lg btn-secondary btn-block" type="submit">Se connecter</button>
            <a class="btn btn-lg btn-secondary btn-block" href="../">Retour à l'accueil</a>
        </form>
    </div>
<!-- Bootstrap core JavaScript-->
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready( function () {
            $('.toast').toast("show")
        } );
    </script>
</html>