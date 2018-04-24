
<?php
    require_once 'partials/session_start.php';

    if (isset($_GET["message"])) 
    {
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
            if (isset($_GET["message"])) {
        ?>  
            <section>
                <p class="feedback"><?= $_GET["message"] ?></p>
            </section>
        <?php 
            }
            if (!isset($_SESSION["loggedIn"])): 
        ?>
        <section>
            <div class="form-title">
                <h4>Register user</h4>
            </div><br>
            <form action="partials/register_user.php" method="POST" class="form-container">
                <label for="username" class="form-title">Username</label>
                <input class="form-field" type="text" name="username" id="username">
                <label for="password" class="form-title">Password</label>
                <input class="form-field" type="password" name="password" id="password">
                <div class="submit-container">
                    <input class="submit-button" type="submit" value="Register">
                </div>
            </form><br>
        </section>
        <section>
            <div class="form-title">
                <h4>Login</h4>
            </div><br>
            <form action="partials/login.php" method="POST" class="form-container">
                <label for="username" class="form-title">Username</label>
                <input class="form-field" type="text" name="username" id="username">
                <label for="password" class="form-title">Password</label>
                <input class="form-field" type="password" name="password" id="password">
                <div class="submit-container">
                    <input class="submit-button" type="submit" value="Login">
                </div>
            </form>
        </section>
        <?php 
            else:
                header('Location: partials/get_entries.php');
            endif; 
        ?>
    </body>
</html>

