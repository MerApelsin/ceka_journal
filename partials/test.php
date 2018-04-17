<?php 
require_once 'database.php';

$statement = $db->prepare(
    "SELECT * FROM users"
    );
$statement->execute();
echo $statement->fetchAll();