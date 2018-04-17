<?php 
$db = new PDO(
    "mysql:host=localhost:8888;dbname=journal;charset=utf8", //source
    "root",   //username
    "root",   //password
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
?>