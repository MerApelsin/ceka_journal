<?php 
    require_once 'database.php';
    require_once 'session_handler.php';

    //send the user "back" to all the entries when done
    header('Location: get_entries.php');

    //Fetch the ID from the query
    if (isset($_GET["deleteID"])) 
    {
        $thisID = $_GET["deleteID"];
    }

    //prepare and delete said entry
    $statement = $db->prepare(
        "DELETE FROM entries 
        WHERE entryID = :entryID");

    $statement->execute([
        ":entryID" => $thisID
    ]);
?>