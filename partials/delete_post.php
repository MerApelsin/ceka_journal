<?php 
    require_once 'database.php';

    //send the user "back" to all the entries 
    header('Location: /partials/get_entries.php');

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