<?php

require_once "../../includes/functions.php";

session_start();
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once "../../controllers/database.php";
    session_start();
    $req = $pdo->prepare('SELECT * FROM admin WHERE username = :username');
    $req->execute(['username' => $_POST['username']]);
    if (($user = $req->fetch(PDO::FETCH_OBJ)) && password_verify($_POST['password'], $user->password)) {
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = "Vous êtes maintenant connecté";
        header('Location: espace_competition.php');
        exit();
    } else {
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
    }
}

/*$real_passwd = "root";
$passwrd = password_hash($real_passwd, PASSWORD_BCRYPT);
debug($passwrd);
$verif = password_verify($real_passwd, $passwrd);
debug($verif); */


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Luc NICOLAS">
    <title>Login · Ping Score</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
    <!-- Custom styles for this template -->
    <link href="/fork-ASPCN/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

<div class="container">



    <form method="post" action="" enctype="multipart/form-data" class="form-signin">
        <img class="mb-4" src="/fork-ASPCN/assets/img/logo_projet.png" alt="" width="100">

        <?php if(isset($_SESSION['flash'])): ?>
            <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                <div class="alert alert-<?= $type; ?>">
                    <?= $message ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>

        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
         <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-secondary btn-block" type="submit">Sign in</button>
    </form>


