<?php
include './session.php';
include './database.php';

$post_id = $_GET['id'];

if(isAdmin($user_id)== true && !empty($post_id)){
    $query = "DELETE FROM posts WHERE id = $post_id";
    mysqli_query($link, $query);
    $query = "DELETE FROM images WHERE post_id = $post_id";
    mysqli_query($link, $query);
    $query = "DELETE FROM posts_tags WHERE post_id = $post_id";
    mysqli_query($link, $query);
    $query = "DELETE FROM comments WHERE post_id = $post_id";
    mysqli_query($link, $query);
}

header("Location:index.php");
?>