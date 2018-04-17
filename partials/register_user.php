<?php 
//header('Location: /index.php?message=register_complete');

require_once 'database.php';

$username = $_POST["username"];
var_dump($username);
//Hashing password
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
echo $password;

$statement = $db->prepare(
  'INSERT INTO users (username, password)
  VALUES (:username, :password)'
);
$statement->execute([
  ":username" => $username,
  ":password" => $password
]);



?>