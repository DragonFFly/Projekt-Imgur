<?php
include_once './database.php';

$name = $_POST['name'];
$email = $_POST['mail'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
//preverim podatke, da so obvezi vnešeni
if (!empty($name) && !empty($email) &&
     !empty($pass1) && ($pass1 == $pass2)) {
    
        $pass = sha1($pass1.$salt);
        //$pass = password_hash($pass1, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (ime,mail,geslo,tocke,admn) "
                . "VALUES (?,?,?,0,0)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name,$email,$pass]);

        $user = mysqli_fetch_array(mysqli_query($link, "SELECT id FROM users WHERE ime = '$name' AND mail='$email'"));
        $user_id = $user['id'];
        $query = "INSERT INTO images (user_id , url)"
                . "VALUES($user_id, 'images/user.png')";
        mysqli_query($link, $query);
    
        header("Location: login.php");
}
else {
    header("Location: registration.php");
}
?>