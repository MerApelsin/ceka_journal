<?php
    require_once 'database.php';
    require_once 'session_handler.php';
    
    //redirect to 'main post page' when done updating entry
    header('Location: get_entries.php');

    //Check and fetch the ID that's supposed to be updated
    if (isset($_GET["entryID"])) {
        $ID = (int)$_GET["entryID"];
    }

    //Update that jazz
    $statement = $db->prepare(
        "UPDATE entries
        SET title = :title, 
            content = :content
        WHERE entryID = :entryID"
    );

    $statement->execute([
        ":title" => $_POST["title"],
        ":content" => $_POST["content"],
        ":entryID" => $ID
    ]);

?>