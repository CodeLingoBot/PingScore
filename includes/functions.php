<?php

function start(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
}

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

function administration() {
    logged();
    if ($_SESSION['auth']->role==="referee"){
        $_SESSION['flash']['danger'] = "Vous n'avez pas les droits pour accéder à cette section !";
        header('Location: tableau_arbitre.php');
        exit();
    }
    if (!isset($_SESSION['auth']->role)){
        $_SESSION['flash']['danger'] = "Vous n'avez pas les droits pour accéder à cette section !";
        header('Location: login.php');
        exit();
    }
}

function arbitration() {
    logged();
    if ($_SESSION['auth']->role==="referee"){
        $_SESSION['flash']['danger'] = "Vous n'avez pas les droits pour accéder à cette section !";
        header('Location: tableau_arbitre.php');
        exit();
    }
    if (!isset($_SESSION['auth']->role)){
        $_SESSION['flash']['danger'] = "Vous n'avez pas les droits pour accéder à cette section !";
        header('Location: login.php');
        exit();
    }
}

/*
function admin(){
    check_auth();
        if (isset($_SESSION['auth'])){
            if ($_SESSION['auth']->role="referee"){
                $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette section !";
                header('Location: espace_competition.php');
                exit();
            } else {
                $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette section !";
                header('Location: login.php');
                exit();
            }
        } else {
            $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette section car vous n'êtes pas connecté !";
            header('Location: login.php');
            exit();
        }
}
function check_referee(){
    check_auth();
        if (!isset($_SESSION['auth']->role)){
                $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette section !";
                header('Location: espace_competition.php');
                exit();
        }
}
*/
function debug($variable){
    echo '<pre>' . print_r($variable, true) . '</pre>';
}