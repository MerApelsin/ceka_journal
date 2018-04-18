<?php 
require_once 'database.php';
require_once 'session_start.php';

//get the user with the same username from database
$checkUser = $db->prepare(
    "SELECT * FROM users
    WHERE username = :username"
);
$checkUser->execute([
    "username" => $_POST["username"]
]);
//actually get the user
$user = $checkUser->fetch();

//check the users password and compare to database, verify since it's hashed.
//if password == password, login success
if(password_verify($_POST["password"],$user["password"]))
{   
    //header('Location: /index.php');
    header('Location: /partials/get_entries.php');
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $user["username"];
    $_SESSION["thisID"] =  $user["userID"];
}
//else they've failed and we'll tell 'em so.
else
{
    header('Location: /index.php?message=login failed');
}


?>