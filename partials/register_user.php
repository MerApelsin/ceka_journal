<?php 
require_once 'database.php';

$username = $_POST["username"];
//Hashing password
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$statement = $db->prepare(
  'INSERT INTO users (username, password)
  VALUES (:username, :password)'
);
$statement->execute([
  ":username" => $username,
  ":password" => $password
]);

?>