<?php 
    require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Text editor</title>
        <link rel="stylesheet" href="\css\style.css" type="text/css">
    </head>
    <body>
        <?php 
        //check if a status has been sent and save that in it's own variable
        if (isset($_GET["status"])) {
            $status = $_GET["status"];
        }

        //if the status is new it means the user wants to post a completely new entry
        if($status == "new"):
        ?>
            <form action="\partials\new_entry.php" method="POST" id="textForm">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="title">
                <label for="content">Content</label>
                <textarea name="content" id="content" maxlength="999" cols="30" rows="10" placeholder="Write here"></textarea>
                <input type="submit" value="Upload">
            </form>
        <?php
        //if not, then it's edit and means the user wants to change something from a previously made post
        //however, the time will stay the same as during creation.
        elseif($status == "edit"):
            $thisEntry = $_GET["postID"];
            //fetch the corresponding entry, since we want to update we need the values that already exist.
            $statement = $db->prepare(
                "SELECT * FROM entries
                WHERE entryID = :entryID"
            );
            $statement->execute([
                "entryID" => $thisEntry
            ]);
            $thisPost = $statement->fetch();
            //fills the form with previous data so the user can edit it.
            ?>
                <form action="\partials\update_entry.php?entryID=<?= $thisEntry ?>" method="POST" id="textForm">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="title" value=<?= $thisPost["title"]?>>
                <label for="content">Content</label>
                <textarea name="content" id="content" maxlength="999" cols="30" rows="10" placeholder="Write here"><?= $thisPost["content"] ?></textarea>
                <input type="submit" value="Update">
            </form>
        <?php endif; ?>
    </body>
</html>