<?php
    include_once './header.php';
?>
<h1>Prijava</h1>

<form action="login_check.php" method="post">
    <input type="text" name="name" placeholder="Name" required="required" /><br>
    <input type="password" name="pass" placeholder="Password" required="required" /><br>
    <input type="submit" value="Login" />
</form>

<?php
    include_once './footer.php';
?>