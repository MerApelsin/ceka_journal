<?php
    require_once 'database.php';
    
    header('Location: /partials/get_entries.php');
    //Check and fetch the ID that's supposed to be updated
    if (isset($_GET["entryID"])) {
        $ID = (int)$_GET["entryID"];
    }
    var_dump($ID);
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