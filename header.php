<?php
	include_once './session.php';
	include_once './database.php';
?>
<!DOCTYPE HTML>
<!--
	Visualize by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Imgur: The magic of the Internet</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="google-signin-scope" content="profile email">
    	<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    	<script src="https://apis.google.com/js/platform.js" async defer></script>
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
                        
						<a href="index.php"><img src="images/imgur.png" alt="logo"></a>
						<a href="new_post.php" class="button alt">New Post</a>
                        <?php
						//-----------------------------upvote / downvote funkcije
						function upvote($post_id){
							
						}
						function downvote($post_id){

						}
						//-----------------------------------

                            //če je prijavljen - naj bo link na logout in prikaže ime , če ne login 
                            if (isset($_SESSION['user_id'])) {
								$user_id = $_SESSION['user_id'];
                                $query = "SELECT ime FROM users WHERE id = $user_id";
                                $username = mysqli_fetch_array(mysqli_query($link, $query));
								echo '<a href="profile.php"><h3>'.$username['ime'].'</h3><a><hr>';
								if(ISSET($_SESSION['googleUser'])){?>
									<a href="#" onclick="signOut();">Sign out</a>
									<script>
									function signOut() {
										var auth2 = gapi.auth2.getAuthInstance();
										auth2.signOut().then(function () {
										console.log('User signed out.');
										});
									}
									</script>
								<?php
								}
								else{
								echo '<a href="logout.php" class="button alt">Sign Out</a>';
								}
                                echo '<form action="search.php" method="get"><input type="text" name="search" placeholder="Images, #tags, @users oh my!" width=80%> <input type="Submit" value="Search"></form>';
                            }
                            else {
                                echo '<hr><a href="login.php" class="button alt">Sign In</a>';
								echo '<a href="registration.php" class="button alt">Sign Up</a>';
                                echo '<form action="search.php" method="get"><input type="text" name="search" placeholder="Images, #tags, @users oh my!" width=80%> <input type="Submit" value="Search"></form>';
                            }

                        ?>
					</header>

				<!-- Main -->
					<section id="main">