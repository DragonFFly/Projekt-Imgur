<?php
include_once './database.php';
include_once './session.php';
$old_pass = $_POST['old_pass'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if (!empty($old_pass) && !empty($pass1) && !empty($pass2) && ($pass1 == $pass2)) {
    $query = "SELECT geslo FROM users WHERE id = $user_id ";
    $pass = mysqli_fetch_array(mysqli_query($link, $query));
    $old_pass = sha1($old_pass.$salt);
    if($old_pass == $pass['geslo']){
        $pass1 = sha1($pass1.$salt);
        $query = "UPDATE users SET geslo = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$pass1]);
        header("Location: profile.php");
    }
    else{
        header("Location: acc_update.php");
    }
}
header("Location: acc_update.php");
?>