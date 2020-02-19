<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('location: login.php');
    }
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
    <div class="nav">
        <div class="addpsot" style="width: 50%; float: left; height: 100%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
            <a href="addpost.php" class="add_post">ADD POST</a>
        </div>
        <!-- <a href="logout.php" class="add_post">Logout</a> -->
        <div class="profile" style="width: 50%; float: left; height: 100%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
            <a href="profile.php" class="add_post">PROFILE</a>
        </div>
    </div>
    <div class="container" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
    <div style="margin-bottom: 10px; margin-left: 100px;">
        <h3>Posts</h3>
    </div>
    <?php foreach ($posts as $post): ?>
        <div class="blog" style="margin: 15px auto;">
            <h4><?php echo $post["title"] ?></h4>
            <p><?php echo substr($post["body"],0,25) ?>....</p>
            <p>Created by: <span style="color: maroon"><?php echo $post["author"] ?></span> | On: <?php echo $post["date_created"] ?></p>
            <a href="post.php?id=<?php echo $post["id"] ?>">Read More</a>
        </div>
    <?php endforeach; ?>
    </div>
</body>
</html>