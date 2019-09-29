<?php
include_once './session.php';

$query = "SELECT *  , COUNT(*) as posts FROM posts";
$result = mysqli_query($link, $query);

$posts = floor($result['posts'] / 3); 
$post_rem = $result['posts'] % 3;
echo '<section class="thumbnails">';

if($post_rem = 1){
    $post1 = $post + 1;
    ($post2 , $post3) = $post;
}
else if ($post_rem = 2){
    $post1 = $post + 1; 
    $post2 = $post + 1;
    $post3 = $post;
}
else{
    ($post1 , $post2 , $post3)= $post;
}

while (){
    echo '<div>';
    while(){
        while ($post = mysqli_fetch_array($result);{
            echo ' <a href="images/fulls/01.jpg">'
            .'<img src="images/thumbs/01.jpg" alt="" />'
            .'<h3>Lorem ipsum dolor sit amet</h3>'
            .'</a>';
        }
    }
    echo '</div>';
}
echo ' </section>';