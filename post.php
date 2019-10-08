<?php
    include_once './header.php';

$post_id = (int) $_GET['id'];

$query = "SELECT * FROM posts WHERE id = $post_id";
$result = mysqli_query($link, $query);
$post = mysqli_fetch_array($result);

//post-------------------------------------------------------------------------------------------
echo '<table>'
.'<tr><td>'.$post['naslov'].'</td></tr>';
$query = "SELECT * FROM users u INNER JOIN posts p ON u.id = p.user_id WHERE u.id = p.user_id";
$result2 = mysqli_query($link, $query);
$user = mysqli_fetch_array($result2); 

echo '<tr><td>by <a href="user.php?id='.$user['user_id'].'">'.$user['ime'].'</a></td></tr>';

$query = "SELECT url FROM images WHERE post_id = $post_id";
$result = mysqli_query($link, $query);

while($image = mysqli_fetch_array($result)){
echo '<tr><td><img src="'.$image['url'].'"></td></tr>';
}

echo '<tr></tr> <tr> <td><button onclick="karmaPost(1,'.$post_id.','.$user['user_id'].')" width= 5%><img src="images/upvote.png" width = 5%></button></td>' 
    . '<td>'.$post['tocke'].' points</td> '
    . '<td><button onclick="karmaPost(-1)" width= 5%><img src="images/downvote.png" width = 5%></button></td>' 
    . '<td>'.$post['ogledi'].' views</td> </tr> </table>';
//-------------------------------------------------------------------------------------------------

//------------------------------------------vpis komentarja-------------------------------------------------
echo '<form action="comment_insert.php" method="post"><input type="text" name="comment" placeholder="Write a comment"><input type="hidden" name="post_id" value="'.$post_id.'">';//pošlje komentar in post_id
if(ISSET($user_id)){//uporabnik lahko komentira samo če je vpisan
    echo '<input type="submit" name="submit" value="Post">';
}
else{
    echo 'Login to post a comment';
}
echo '</form>';
//---------------------------------------------------------------------------------------------------------

//komentarji -----------------------------------------------------------------
$query = "SELECT * FROM comments WHERE post_id = $post_id";
$result = mysqli_query($link, $query);

while($comment = mysqli_fetch_array($result)){
$user_id = $comment['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_array($result);
echo '<table><tr><td>'.$user['ime'].'</td><td>'.$comment['tocke'].' points</td></tr>'
.'<tr> <td>'.$comment['komentar'].'</td> </tr> </table>';
}
//-----------------------------------------------------------------------------

    include_once './footer.php';
?>