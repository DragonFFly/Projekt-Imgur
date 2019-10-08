<?php
include_once './database.php';
include_once './session.php';

$user_id = $_SESSION['user_id'];

$title = $_POST['title'];
$descr = $_POST['descr'];


//preverim podatke, da so obvezi vnešeni
if (!empty($title) && !empty($descr)) {
    //---------------------------------------------------------------------FILE UPLOAD
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Pregleda če je datoteka slika ali ne
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            // Pregleda, če datoteka že obstaja
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            } 
            else{
                // Pregleda velikost datoteke (max. 5mb = 5000000)
                if ($_FILES["fileToUpload"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                else{//če je vse ok, uploada datoteko
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                        echo '<a class="button alt">'.$target_file.'</a>';
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                        header("Location: new_post.php");
                    }
                }
            }
        } 
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    //------------------------------------------------------------------------------

    //------------------------------------INSERT post
    $query = "INSERT INTO posts (user_id,naslov,opis,ogledi,tocke) "
            . "VALUES ($user_id,?,?,1,0)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$descr]);

    //-----------------------------------INSERT slika
    $query = "SELECT * FROM posts WHERE user_id = ? AND naslov = ? AND opis = ?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id, $title, $descr]);
    $post = $stmt->fetch();
    $post_id = $post['id'];
    $query = "INSERT INTO images (post_id,url) "
    . "VALUES ($post_id,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$target_file]);
    
    //---------------------------------INSERT tag
    foreach($_POST['tags'] as $tag_id){
        $query = "INSERT INTO posts_tags (post_id,tag_id) "
        . "VALUES ($post_id,$tag_id)";
        mysqli_query($link, $query);
    }
    
    header("Location: index.php");
}
else {
    header("Location: new_post.php");
}
?>