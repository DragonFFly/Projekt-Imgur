<?php
include_once './database.php';
$name = $_POST['name'];

if (!empty($name)) {
    $query = "UPDATE users SET ime = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name]);
    header("Location: profile.php");
}
header("Location: acc_update.php");
?>