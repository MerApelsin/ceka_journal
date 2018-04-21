<?php 
    require_once 'database.php';
    require_once 'session_start.php';

    header('Location: /partials/get_entries.php');

    //get the current userID for tying the entrie to the user
    $userID = $_SESSION["thisID"];
    //Creat timestamp for currenttime - since it's "now" the post gets created
    $today = date("Y-m-d H:i:s", strtotime('+2 hours'));
   
    $statement = $db->prepare(
        "INSERT INTO entries (title, content, createdAt, userID) 
        VALUES (:title, :content, :createdAt, :userID)"
    );

    $statement->execute(array(
        ":title"     => $_POST["title"],
        ":content"     => $_POST["content"],
        ":createdAt"  => $today,
        ":userID" => $userID
    ));
?>