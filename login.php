<?php
    include_once './header.php';
?>

<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

<h1>Prijava</h1>

<form action="login_check.php" method="post">
    <input type="text" name="name" placeholder="Name" required="required" /><br>
    <input type="password" name="pass" placeholder="Password" required="required" /><br>
    <input type="submit" value="Login" />
</form>

<?php
    include_once './footer.php';
?>