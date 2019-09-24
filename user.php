<?php
    include_once './header.php';

$user_id = (int) $_GET['id'];

$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_array($result);

$query = "SELECT url FROM images WHERE user_id = $user_id";
$result = mysqli_query($link, $query);
$image = mysqli_fetch_array($result);

echo '<table>'
.'<tr><td><img src="'.$image['url'].'"></td><td>'.$user['ime'].'</td><td>'.$user['points'].'</td></tr>'
.'<tr><td>'.$user['opis'].'</td>';

echo '</table>';

    include_once './footer.php';
?>