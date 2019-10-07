<?php
include_once './session.php';
include_once './database.php';

$post_id = (int)$_POST['post_id'];
$comment = (int)$_POST['comment'];

if (!empty($comment)) {
    $query = "INSERT INTO comments (user_id,post_id,komentar,tocke) "
            . "VALUES ($user_id,$post_id,?,0)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$comment]);
}
header("Location: post.php?id=$post_id");