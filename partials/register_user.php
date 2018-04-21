<?php 
require_once 'database.php';
require_once 'session_handler.php';

$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

//this is to check if there is already a user with that name in the database
$userExist = $db->prepare(
  "SELECT * FROM users 
  WHERE username = :username"
);
$userExist->execute([
  "username" => $_POST["username"]
]);
$user = $userExist->fetch();

//if user don't exist - create
if($user == 0) 
{
  header('Location: /index.php?message=register complete');
  $statement = $db->prepare(
    'INSERT INTO users (username, password)
    VALUES (:username, :password)'
  );
  $statement->execute([
    ":username" => $_POST["username"],
    ":password" => $password
  ]);
}
//else give "error"
else 
{
  header('Location: /index.php?message=user already exists');
}

?>