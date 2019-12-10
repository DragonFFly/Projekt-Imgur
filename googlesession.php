<?php
$_SESSION('googleUser') = true;
$_SESSION('email') = $email;
$_SESSION('name') = $name;

header("Location:index.php");