<?php
session_start();

if(!isset($_SESSION['user_id'])
        && $_SERVER['REQUEST_URI']!='/imgur/index.php'
        && $_SERVER['REQUEST_URI']!='/imgur/login.php'
        && $_SERVER['REQUEST_URI']!='/imgur/registration.php'
        && $_SERVER['REQUEST_URI']!='/imgur/login_check.php'
        && $_SERVER['REQUEST_URI']!='/imgur/search.php'
        && $_SERVER['REQUEST_URI']!='/imgur/post.php'
        && $_SERVER['REQUEST_URI']!='/imgur/user.php'
        && $_SERVER['REQUEST_URI']!='/imgur/tag.php'
        && $_SERVER['REQUEST_URI']!='/imgur/header.php'
        && $_SERVER['REQUEST_URI']!='/imgur/footer.php'
        && $_SERVER['REQUEST_URI']!='/imgur/post_load.php') {
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