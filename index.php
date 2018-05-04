
<?php
    require_once 'partials/session_start.php';
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title>Welcome to Journal</title>
    </head>
    <body class="index">
        <?php
            //check if we've gotten any messages from the other files - such as login fail etc
            if (isset($_GET["message"])) 
            {
        ?>  
            <section>
                <p class="feedback"><?= $_GET["message"] ?></p>
            </section>
        <?php 
            }
            //if the user isn't logged in we want to display login action and create a new user action
            if (!isset($_SESSION["loggedIn"])): 
        ?>
                <section class="border">
                    <form action="partials/register_user.php" method="POST" class="form-container">
                        <h4 class="form-title">Register user</h4>
                        <label for="username" class="form-title">Username</label><br>
                        <input class="form-field" type="text" name="username" id="username"><br>
                        <label for="password" class="form-title">Password</label><br>
                        <input class="form-field" type="password" name="password" id="password">
                        <div class="submit-container">
                            <input class="submit-button" type="submit" value="Register">
                        </div>
                    </form><br>
                </section>
                <section class="border">
                    <form action="partials/login.php" method="POST" class="form-container">
                        <h4 class="form-title">Login</h4>
                        <label for="username" class="form-title">Username</label><br>
                        <input class="form-field" type="text" name="username" id="username"><br>
                        <label for="password" class="form-title">Password</label><br>
                        <input class="form-field" type="password" name="password" id="password">
                        <div class="submit-container">
                            <input class="submit-button" type="submit" value="Login">
                        </div>
                    </form>
                </section>
        <?php 
            else:
                //if they are logged in and try to reach this page - just redirect at once to their entries.
                header('Location: partials/get_entries.php');
            endif; 
        ?>
    </body>
</html>

