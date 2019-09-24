<?php
    include_once './header.php';
?>
<h1>Registration</h1>

<form action="user_insert.php" method="post">
    <input type="text" name="name" class="form-control mb-4" placeholder="Name" required="required" /><br>
    <input type="email" name="mail" class="form-control mb-4" placeholder="Mail" required="required" /><br>
    <input type="password" name="pass1" class="form-control mb-4" placeholder="Password" required="required" /><br>
    <input type="password" name="pass2" class="form-control mb-4" placeholder="Repeat password" required="required" /><br>
    <input type="submit" value="Submit" />
</form>

<?php
    include_once './footer.php';
?>