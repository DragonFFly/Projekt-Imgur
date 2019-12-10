<?php
session_start();

if(!isset($_SESSION['user_id'])
        && $_SERVER['REQUEST_URI']!='/index.php'
        && $_SERVER['REQUEST_URI']!='/login.php'
        && $_SERVER['REQUEST_URI']!='/registration.php'
        && $_SERVER['REQUEST_URI']!='/login_check.php'
        && $_SERVER['REQUEST_URI']!='/search.php?search'
        && $_SERVER['REQUEST_URI']!='/post.php?id'
        && $_SERVER['REQUEST_URI']!='/user.php?id'
        && $_SERVER['REQUEST_URI']!='/tag.php?id') {
    header("Location: index.php");
    die();
}
else{
    $user_id = $_SESSION['user_id'];
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