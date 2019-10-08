<?php  
    include_once './header.php';

?>
<form action="post_insert.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="text" name="title" placeholder="Insert title" required="required"/>
    <input type="text" name="descr" placeholder="Insert description"/>
    <input type="hidden" name="file" id="file" value="<?php $file_upload ?>"/>
    <input type="hidden" name="target" id="target" value="<?php $target_file ?>"/>
    
    <select name="tags[]" multiple required="required">
    <?php
        //--------------------TAG----------------------------
        $query = "SELECT * FROM tags";
        $result = mysqli_query($link,$query);
    
        while($tag = mysqli_fetch_array($result)){
        echo '<option value="'.$tag['id'].'">'.$tag['naslov'].'</option>';
        }
    
        echo '</select>';
        //--------------------------------------------------------
    
        if($uploadOk=1){// če je datoteka uploadana se lahko posta, drugače pa pa ne
            echo '<input type="submit" name="submit" value="post"/>';
        }
        else{
            echo '<input type="submit" name="submit" value="post" disabled/>';
        }
    ?>
    </select>
</form>

<?php
include_once './footer.php';
?>