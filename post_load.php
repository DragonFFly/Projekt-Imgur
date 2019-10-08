<?php

if(ISSET($tag_id)){
    $query = "SELECT *  , COUNT(*) as posts FROM posts p INNER JOIN posts_tags r ON p.id = r.post_id WHERE (r.tag_id = $tag_id)";
}
else if(ISSET($user)){
    $query = "SELECT *  , COUNT(*) as posts FROM posts WHERE user_id = $user_id";
}
else{
    $query = "SELECT *  , COUNT(*) as posts FROM posts";
}

$result = mysqli_query($link, $query);
$posts = mysqli_fetch_array($result);

$post_no = floor($posts['posts'] / 3); //število postov deljeno z številom div-ov
$post_rem = $posts['posts'] % 3; //ostanek postov
echo '<section class="thumbnails">';

$post1 = $post_no;
$post2 = $post_no;
$post3 = $post_no;

if($post_rem == 1){ //izračun post-ov za vsak div, če so 3 navpični div-i
    $post1 = $post1 + 1;
}
else if ($post_rem == 2){
    $post1 = $post1 + 1; 
    $post2 = $post2 + 1;
}

$div = 3;
while ($div > 0){ //ponovi za vsak div
    echo '<div>';
    if($div == 1){ //izbere število postov v enem div-u
        $a = $post3;
    }
    else if($div == 2){
        $a = $post2;
    }
    else if($div == 3){
        $a = $post1;
    }
    while($a > 0){//ponovi za vsak post v divu
        
        //-------------------------------------------prikaže podatke in sliko post-a--------
        while ($post = mysqli_fetch_array($result)){
            $post_id = $post['id'];
            $query = "SELECT * FROM images WHERE post_id = '$post_id';";
            echo ' <a href="post.php?id='.$post_id.'">';
            while ($image = mysqli_fetch_array(mysqli_query($link, $query))){
                echo '<img src="'.$image['url'].'" alt="" />';
            }
            echo '<h3>'.$post['title'].'</h3>'
            .'</a>';
        }
        //----------------------------------------------------------------------------------
        $a = $a - 1;
    }
    echo '</div>';
    $div = $div - 1;
}
echo ' </section>';