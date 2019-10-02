<?php
include_once './database.php';
include_once './session.php';

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
            // Pregleda velikost datoteke (max. 1mb = 1000000)
            if ($_FILES["fileToUpload"]["size"] > 1000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            else{//če je vse ok, uploada datoteko
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    echo '<a class="button alt">'.$target_file.'</a>';
                    header("Location: index.php");
                    die();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    //header("Location: new_post.php");
                }
            }
        }
    } 
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
$file_upload = $target_dir . $target_file;

if($uploadOK = 1){
    $query = "UPDATE images SET url = ? WHERE user_id = $user_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$target_file]);
    header("Location: profile.php");
}



?>