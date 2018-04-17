
<?php 
if (isset($_GET["message"])) {
    echo $_GET["message"];
}
?>

<h4>Register user</h4><br>

<form action="partials\register_user.php" method="POST">
Username: <input type="text" name="username" label="username">
Password: <input type="text" name="password" labbel="password">
<input type="submit" value="Register">
</form><br>

<h4>Login</h4><br>
<form action="" method="POST">
Username: <input type="text" name="username" label="username">
Password: <input type="password" name="password" labbel="password">
</form>

<h4>Get users</h4><br>
<form action="partials\test.php" method="POST">
<input type="submit" value="get users">
</form>
