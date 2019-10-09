<?php
include_once './session.php';
include_once './database.php';

$user_id = $_SESSION['user_id'];
$post_id = (int)$_POST['post_id'];
$comment = $_POST['comment'];

echo $post_id .' '. $comment .' '. $user_id;

if (!empty($comment) && !empty($user_id)) {
    $query = "INSERT INTO comments (user_id,post_id,komentar,tocke) "
            . "VALUES ($user_id,$post_id,?,0)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$comment]);
}
header("Location: post.php?id=$post_id");