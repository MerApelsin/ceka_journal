<?php 
    require_once 'database.php';
    require_once 'session_handler.php';

    //redirect to "main post page" after a new entry is created
    header('Location: get_entries.php');

    //get the current userID for tying the entry to the user
    $userID = $_SESSION["thisID"];

    //Create timestamp for currenttime - since it's "now" the post gets created. 
    //Need to adjust the timezone too, hence +2h, this'll get wrong when changing to
    // wintertime etc. So not 'foolproof'.
    $today = date("Y-m-d H:i:s", strtotime('+2 hours'));
   
    //prepare and create the entry based on user data
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