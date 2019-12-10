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
    	<meta name="google-signin-client_id" content="473203751751-78uiv64k63mm0vj1o6samb1s1p9skor2.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
                        
						<a href="index.php"><img src="images/imgur.png" alt="logo"></a>
						<a href="post_upload.php" class="button alt">New Post</a>
						<?php
						if($_SESSION('googleUser') == true){
						?><a href="#" onclick="signOut();">Sign out</a><?php
						}
						
						
						//google signIn in signOut
						?>
						<script>
						function signOut() {
							var auth2 = gapi.auth2.getAuthInstance();
							auth2.signOut();
							<?php
							session_destroy();
							?>
						}
						</script>
						
                        <?php
                        
                        function onSignIn($googleUser){
                            require_once 'google-api-lib/vendor/autoload.php';
                            // init configuration
                            $clientID = '473203751751-78uiv64k63mm0vj1o6samb1s1p9skor2.apps.googleusercontent.com';
                            $clientSecret = '5xCJTt8rYcm5lwaVggtzUPpm';
                            $redirectUri = 'http://tkdomain.eu';
                              
                            // create Client Request to access Google API
                            $client = new Google_Client();
                            
                            $client->setClientId($clientID);
                            $client->setClientSecret($clientSecret);
                            $client->setRedirectUri($redirectUri);
                            $client->addScope("email");
                            $client->addScope("profile");
                            
                            session_start();
                            
                            if (isset($_GET['code'])) {
                              $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                              $client->setAccessToken($token['access_token']);
                              
                              // get profile info
                              $google_oauth = new Google_Service_Oauth2($client);
                              $google_account_info = $google_oauth->userinfo->get();
                              $email =  $google_account_info->email;
                              $name =  $google_account_info->name;
							  
                              // now you can use this profile info to create account in your website and make user logged in.
                              header("Location:googlesession.php");
                            }
                        }
                        
                        /*
                        <script>
                          function onSignIn(googleUser) {
                            // Useful data for your client-side scripts:
                            var profile = googleUser.getBasicProfile();
                            console.log("ID: " + profile.getId()); // Don't send this directly to your server!
                            console.log('Full Name: ' + profile.getName());
                            console.log('Given Name: ' + profile.getGivenName());
                            console.log('Family Name: ' + profile.getFamilyName());
                            console.log("Image URL: " + profile.getImageUrl());
                            console.log("Email: " + profile.getEmail());
                    
                            // The ID token you need to pass to your backend:
                            var id_token = googleUser.getAuthResponse().id_token;
                            console.log("ID Token: " + id_token);
                          }
                        </script>*/
                        
						//-----------------------------upvote / downvote funkcije
						function karmaPost($value, $post, $user){
							$query = "UPDATE posts SET tocke = tocke + ($value) WHERE id = $post";
							mysqli_query($link, $query);
							
							$query = "UPDATE users SET tocke = tocke + ($value) WHERE id = $user";
							mysqli_query($link, $query);
						}
						
						function karmaComment($value, $comment, $user){
							$query = "UPDATE comments SET tocke = tocke + ($value) WHERE id = $comment";
							mysqli_query($link, $query);
							
							$query = "UPDATE users SET tocke = tocke + ($value) WHERE id = $user";
							mysqli_query($link, $query);
						}
						//-----------------------------------

                            //če je prijavljen - naj bo link na logout in prikaže ime , če ne login 
                            if (isset($_SESSION['user_id'])) {
								$user_id = $_SESSION['user_id'];
                                $query = "SELECT ime FROM users WHERE id = $user_id";
                                $username = mysqli_fetch_array(mysqli_query($link, $query));
								echo '<a href="profile.php"><h3>'.$username['ime'].'</h3><a><hr>';
								echo '<a href="logout.php" class="button alt">Sign Out</a>';
                                echo '<form action="search.php" method="get"><input type="text" name="search" placeholder="Images, #tags, @users oh my!" width=80%> <input type="Submit" value="Search"></form>';
                            }
                            else {
                                echo '<hr><a href="login.php" class="button alt">Sign In</a>';
								echo '<a href="registration.php" class="button alt">Sign Up</a>';
                                echo '<form action="search.php" method="get"><input type="text" name="search" placeholder="Images, #tags, @users oh my!" width=80%> <input type="Submit" value="Search"></form>';
                            }

                        ?>
                        <hr>
					</header>

				<!-- Main -->
					<section id="main">