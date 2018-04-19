<?php 
    require_once 'database.php';
    require_once 'session_start.php';
?>

<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="\css\style.css" type="text/css">
        <title>Login</title>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="\partials\logout.php" class="button">Log out</a></li>
                <li><a href="\partials\text_handler.php?status=new" class="button">Create new post</a></li>
            </ul>
        </nav>
        <?php
        $statement = $db->prepare(
            "SELECT * FROM entries
            WHERE userID = :id"
        );
        $statement->execute([
            "id" => $_SESSION["thisID"]
        ]);
        $posts = $statement->fetchAll();
            //<?php echo $post["title"] . " <br>" . $post["content"];
        foreach ($posts as $post)
        {
            ?>
            <article>
                <div class="entry-post">
                    <h2 class="title"><?= $post["title"] ?></h2>
                    <h4 class="time"><?= $post["createdAt"] ?></h4>
                    <p class=content><?= $post["content"] ?></p>
                </div>
                <div class="post-menu">
                    <ul>
                        <li><a href="\partials\text_handler.php?status=edit&postID=<?= $post["entryID"] ?>">Edit post</a></li>
                        <li><a href="\partials\delete_post.php?deleteID=<?= $post["entryID"] ?>">Delete post</a></li>
                    </ul>
                </div>
            </article>
        <?php
        }
        ?>
    </body>
</html>