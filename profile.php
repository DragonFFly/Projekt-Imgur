<?php
    include_once './header.php';


$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_array($result);

$query = "SELECT url FROM images WHERE user_id = $user_id";
$result = mysqli_query($link, $query);
$image = mysqli_fetch_array($result);

echo '<table>'
.'<tr><td><img src="'.$image['url'].'" width=30%></td><td>'.$user['ime'].'</td><td>'.$user['tocke'].' points</td></tr>'
.'<tr><td>'.$user['opis'].'</td>';

echo '</table>';

echo '<a href="acc_update.php?id='.$user_id.'" class="button alt">Update Account</a>';

    include_once './footer.php';
?>