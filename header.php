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
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
                        
						<img src="images/imgur.png" alt="logo">
                        <?php
                            //če je prijavljen - naj bo link na logout in prikaže ime , če ne login 
                            if (isset($_SESSION['user_id'])) {
                                $query = "SELECT ime FROM users WHERE id = $user_id";
                                $username = mysqli_fetch_array(mysqli_query($link, $query));                                                              
                                echo '<h3>'.$username['ime'].'</h3>';
                                echo '<a href="logout.php" class="button alt">Sign Out</a>';
                                echo '<a href="profile.php" class="button alt">Profile</a>';
                                echo '<form action="search.php" method="get"><input type="text" name="search" placeholder="Images, #tags, @users oh my!" width=80%> <input type="Submit" value="Išči"></form>';
                            }
                            else {
                                echo '<a href="login.php" class="button alt">Sign In</a>';
								echo '<a href="registration.php" class="button alt">Sign Up</a>';
                                echo '<form action="search.php" method="get"><input type="text" name="search" placeholder="Images, #tags, @users oh my!" width=80%> <input type="Submit" value="Išči"></form>';
                            }

                        ?>
					</header>

				<!-- Main -->
					<section id="main">