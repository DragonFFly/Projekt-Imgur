<?php  
    include_once './header.php';

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
                $uploadOk = 1;
            }
        }
    } 
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
$file_upload = $target_dir . $target_file;
?>
<form action="post_insert.php" method="post">
    <input type="text" name="title" placeholder="Insert title" required="required"/>
    <input type="text" name="descr" placeholder="Insert description"/>
    <input type="hidden" name="file" value="<?php $file_upload ?>"/>
    <input type="hidden" name="target" value="<?php $target_file ?>"/>
    <?php
    //---------DODAJ-TAG-INPUT--------------------
    if($uploadOk=1){// če je datoteka uploadana se lahko posta, drugače pa pa ne
        echo '<input type="submit" name="submit" value="post"/>';
    }
    else{
        echo '<input type="submit" name="submit" value="post" disabled/>';
    }
    ?>
</form>

<?php
include_once './footer.php';
?>