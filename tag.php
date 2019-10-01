<?php
    include_once './header.php';

$tag_id = (int) $_GET['id'];

$query = "SELECT * FROM tags WHERE id = $tag_id";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_array($result);

$query = "SELECT url FROM images WHERE tag_id = $tag_id";
$result = mysqli_query($link, $query);
$image = mysqli_fetch_array($result);

echo '<table>'
.'<tr><td><img src="'.$image['url'].'"></td><td>'.$tag['ime'].'</td></tr>'
.'<tr><td>'.$tag['opis'].'</td>';

echo '</table>';

    include_once './post_load.php';
    include_once './footer.php';
?>