<?php 
require_once 'database.php';
require_once 'session_start.php';
?>

<form action="logout.php" method="POST">
<input type="submit" value="Log out">
</form><br>

<?php
$statement = $db->prepare(
    "SELECT * FROM entries
    WHERE userID = :id"
);
$statement->execute([
    "id" => $_SESSION["thisID"]
]);
$posts = $statement->fetchAll();

foreach ($posts as $post)
{
    echo $post["title"] . " <br>" . $post["content"];
}


?>