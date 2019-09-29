<?php
include_once './database.php';
include_once './session.php';

$user_id = $_SESSION['user_id'];

$title = $_POST['title'];
$descr = $_POST['descr'];
$file = $_POST['file'];
$target_file = $_POST['target'];

//preverim podatke, da so obvezi vnešeni
if (!empty($title) && !empty($descr) && !empty($file)) {
    //------------------------------------INSERT post
    $query = "INSERT INTO posts (user_id,naslov,opis) "
            . "VALUES ($user_id,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$descr]);

    //-----------------------------------INSERT slika
    $query = "SELECT * FROM posts WHERE user_id = ? AND naslov = ? AND opis = ?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id, $title, $descr]);
    if ($stmt->rowCount() == 1) {
        $post = $stmt->fetch();
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            echo '<a class="button alt">'.$target_file.'</a>';

            $query = "INSERT INTO images (user_id,url) "
            . "VALUES ($user_id,?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$file]);
            
            header("Location: index.php");
            die();
        } else {
            echo "Sorry, there was an error uploading your file.";
            header("Location: new_post.php");
        }
    }

    header("Location: new_post.php");
}
else {
    header("Location: new_post.php");
}
?>