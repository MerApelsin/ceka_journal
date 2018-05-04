<?php 
    require_once 'database.php';
    require_once 'session_handler.php';
?>

<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <title>Your entries</title>
    </head>
    <body>
        <nav>
            <ul>
                <li>Welcome <?=$_SESSION["username"]?>!</li>
                <li><a href="logout.php" class="button">Log out</a></li>
                <li><a href="text_handler.php?status=new" class="button">Create new post</a></li>
            </ul>
        </nav>
        <?php
        $statement = $db->prepare(
            "SELECT * FROM entries
            WHERE userID = :id
            ORDER BY createdAt DESC"
        );
        $statement->execute([
            "id" => $_SESSION["thisID"]
        ]);
        $posts = $statement->fetchAll();
        //checks if the user has any posts, if not - display no post - else loop through them
        if(empty($posts))
        {
            ?>
            <article>
                <h2 class="post-title">No posts found, let's start write one! :)</h2>
            </article>
            <?php
        }
        else{
            foreach ($posts as $post)
            {
                ?>
                <article>
                    <div class="entry-post">
                        <h2 class="post-title"><?= $post["title"] ?></h2>
                        <h4 class="time">Created at: <?= $post["createdAt"] ?></h4>
                        <p class="content"><?= $post["content"] ?></p>
                        <ul>
                            <li><a class="button" href="text_handler.php?status=edit&postID=<?= $post["entryID"] ?>">Edit post</a></li>
                            <li><a class="button-del" href="delete_post.php?deleteID=<?= $post["entryID"] ?>">Delete post</a></li>
                        </ul>
                    </div>
                </article>
            <?php
            }
        }
        ?>
    </body>
</html>