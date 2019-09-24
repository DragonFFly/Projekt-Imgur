<?php
include_once './header.php';
$search = $_GET['search'];
echo $search;
$query = "SELECT * FROM posts  WHERE naslov LIKE '%$search%' OR opis LIKE '%$search%'";
$result1 = mysqli_query($link, $query);
echo '<table>';
while($post = mysqli_fetch_array($result1)){
        $post_id = $post['id'];
        $query = "SELECT * FROM images i INNER JOIN posts p ON i.post_id = p.id WHERE i.post_id = $post_id ";
        $result2 = mysqli_query($link, $query);
        $image1 = mysqli_fetch_array($result2);

        echo '<tr><td>Posts</td></tr>'
        . '<tr><td><a href="post.php?id='.$post_id.'"><img src="'.$image1['url'].'"></a></td>'
        .'<td>'.$post['naslov'].'</td><td>'.$post['ogledi'].' views</td>'
        .'<td>'.$post['tocke'].' points</td></tr>';
    }
echo '</table>';

$query = "SELECT * FROM users  WHERE ime LIKE '%$search%'";
$result1 = mysqli_query($link, $query);
echo '<table>';
while($user = mysqli_fetch_array($result1)){
        $user_id = $user['id'];
        $query = "SELECT * FROM images i INNER JOIN users u ON i.user_id = u.id WHERE i.user_id = $user_id ";
        $result2 = mysqli_query($link, $query);
        $image2 = mysqli_fetch_array($result2);

        echo '<tr><td>Users</td></tr>'
        . '<tr><td><a href="user.php?id='.$user_id.'"><img src="'.$image2['url'].'"></a></td>'
        .'<td>'.$user['ime'].'</td><td>'.$user['tocke'].' points</td></tr>';
    }
echo '</table>';

$query = "SELECT * FROM tags  WHERE naslov LIKE '%$search%' OR opis LIKE '%$search%'";
$result1 = mysqli_query($link, $query);
echo '<table>';
while($tag = mysqli_fetch_array($result1)){
        $tag_id = $tag['id'];
        
        echo '<tr><td>Tags</td></tr>'
        . '<tr><td>'.$tag['naslov'].'</td></tr>';
    }
echo '</table>';

include_once './footer.php';
?>