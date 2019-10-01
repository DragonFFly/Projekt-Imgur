<?php
include_once './header.php';

$query = "DELETE FROM users WHERE id = $user_id";
mysqli_query($link, $query);

echo 'Account '.$user['ime'].' has been permanently deleted.'
.'<br><br>'
.'<a href="index.php" class="button alt">Back</a>';

include_once './footer.php';
?>