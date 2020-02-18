<?php
    session_start();
    // if (!isset($_SESSION['user'])) {
    //     header('location: login.php');
    // }
    require "config/db.php";
    
    // Custom query
    $query = "SELECT * FROM posts ORDER BY date_created DESC";

    $result = mysqli_query($conn, $query);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    //Closing a connection
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <a href="addpost.php" class="add_post">Add Post</a>
    <a href="logout.php" class="add_post">Logout</a>
    <a href="profile.php" class="add_post">Profile</a>
    <?php foreach ($posts as $post): ?>
        <div class="container">
            <h3><?php echo $post["title"] ?></h3>
            <p><?php echo substr($post["body"],0,25) ?>....</p>
            <p>Created by: <?php echo $post["author"] ?> | On: <?php echo $post["date_created"] ?></p>
            <a href="post.php?id=<?php echo $post["id"] ?>">Read More</a>
        </div>
    <?php endforeach; ?>
</body>
</html>