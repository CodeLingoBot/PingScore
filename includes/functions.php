<?php

function logged(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if (!isset($_SESSION['auth'])) {
        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette section car vous n'êtes pas connecté !";
        header('Location: login.php');
        exit();
    }
}

function debug($variable)
{
    echo '<pre>' . print_r($variable, true) . '</pre>';
}
