
<?php
require_once 'partials/session_start.php';

if (isset($_GET["message"])) {
    echo $_GET["message"];
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title>Welcome to Journal</title>
    </head>
    <body>
        <?php
        if (!isset($_SESSION["loggedIn"])): ?>
        <section>
            <h4>Register user</h4><br>
            <form action="partials/register_user.php" method="POST">
            Username: <input type="text" name="username" label="username">
            Password: <input type="password" name="password" label="password">
            <input type="submit" value="Register">
            </form><br>
        </section>
        <section>
            <h4>Login</h4><br>
            <form action="partials/login.php" method="POST">
            Username: <input type="text" name="username" label="username">
            Password: <input type="password" name="password" label="password">
            <input type="submit" value="Login">
            </form>
        </section>
        <?php 

        else:
            header('Location: partials/get_entries.php');
        endif; ?>
    </body>
</html>

