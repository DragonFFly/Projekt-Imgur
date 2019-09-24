<?php  
    include_once './header.php';
    //naslednje vpiše datoteko za upload in jo pošlje naprej
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Select Image" name="submit">
</form>

<?php
    include_once './footer.php';
?>