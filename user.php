<?php
    include_once './header.php';

$usr_id = (int) $_GET['id'];

$query = "SELECT * FROM users WHERE id = $usr_id";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_array($result);

$query = "SELECT url FROM images WHERE user_id = $usr_id";
$result = mysqli_query($link, $query);
$image = mysqli_fetch_array($result);

echo '<table>'
.'<tr><td><img src="'.$image['url'].'"></td><td>'.$user['ime'].'</td><td>'.$user['tocke'].'</td></tr>'
.'<tr><td>'.$user['opis'].'</td>';

echo '</table>';

    include_once './footer.php';
?>