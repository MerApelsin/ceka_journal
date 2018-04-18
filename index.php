
<?php
require_once 'partials\session_start.php';

if (isset($_GET["message"])) {
    echo $_GET["message"];
}

if (!isset($_SESSION["loggedIn"])): ?>
<h4>Register user</h4><br>
<form action="partials\register_user.php" method="POST">
Username: <input type="text" name="username" label="username">
Password: <input type="password" name="password" labbel="password">
<input type="submit" value="Register">
</form><br>

<h4>Login</h4><br>
<form action="partials\login.php" method="POST">
Username: <input type="text" name="username" label="username">
Password: <input type="password" name="password" labbel="password">
<input type="submit" value="Login">
</form>
<?php 

else: ?>
<form action="partials\logout.php" method="POST">
<input type="submit" value="Log out">
</form>
<?php endif; ?>

