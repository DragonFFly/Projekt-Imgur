<?php
session_start();

if(!isset($_SESSION['user_id'])
        && $_SERVER['REQUEST_URI']!='/imgur/login.php'
        && $_SERVER['REQUEST_URI']!='/imgur/registration.php'
        && $_SERVER['REQUEST_URI']!='/imgur/login_check.php'
        && $_SERVER['REQUEST_URI']!='/imgur/index.php') {
    header("Location: login.php");
    die();
}

function isAdmin() {
    $result = false;
    if (isset($_SESSION['admin']) && ($_SESSION['admin']==1)) {
        $result = true;
    }
    return $result;
}

function adminOnly() {
    //če ni admin, ga preusmeri na index
    if (!isAdmin()) {
        header("Location: index.php");
        die();
    }
}



?>