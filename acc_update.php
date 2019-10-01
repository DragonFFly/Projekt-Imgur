<?php
include_once './header.php';

echo '<h2>Name:</h2><br>'
.'<form action="nameupdate.php" method="post">'
.'<input type = "text" placeholder="Insert new name..." name = "name">'
.'<input type = "submit" name="submit" value="Save">';
echo '</form><br>';

echo '<h2>Password:</h2><br>'
.'<form action="passupdate.php" method="post">'
.'<input type = "password" placeholder="Insert current password..." name = "old_pass">'
.'<input type = "password" placeholder="Insert new password..." name = "pass1">'
.'<input type = "password" placeholder="Repeat new password..." name = "pass2">'
.'<input type = "submit" name="submit" value="Save">';
echo '</form><br>';

echo '<h2>Email:</h2><br>'
.'<form action="mailupdate.php" method="post">'
.'<input type = "email" placeholder="Insert new email..." name = "mail">'
.'<input type = "submit" name="submit" value="Save">';
echo '</form><br>';

echo '<a href="accdelete.php" class="button alt"><h2>Delete Account</h2></a><br>';

include_once './footer.php';
?>