<?php
include_once './database.php';
$mail = $_POST['mail'];

if (!empty($mail)) {
    $query = "UPDATE users SET mail = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$mail]);
    header("Location: profile.php");
}
header("Location: acc_update.php");
?>