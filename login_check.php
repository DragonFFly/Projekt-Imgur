<?php
session_start();
include_once './database.php';
$name = $_POST['name'];
$pass = $_POST['pass'];
//preverim, če sem prejel podatke
if (!empty($name) && !empty($pass)) {
    $pass = sha1($pass.$salt);

    $query = "SELECT * FROM users WHERE ime=? AND geslo=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $pass]);

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        $_SESSION['user_id'] = $user['id'];        
        $_SESSION['admin'] = $user['admn'];        
        header("Location: index.php");
        die();
    }
}
header("Location: login.php");
?>