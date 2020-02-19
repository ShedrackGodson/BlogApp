<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('location: login.php');
    }

    if (isset($_POST["delete"])) {
    $delete_id = mysqli_real_escape_string($conn, $_POST["delete_id"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $body = mysqli_real_escape_string($conn, $_POST["body"]);

    $query = "DELETE FROM posts WHERE id=$delete_id";

    if (mysqli_query($conn, $query)) {
        header("Location: ".ROOT_URL.'');
    }else{
        echo "ERROR: ".mysqli_error($conn);
    }
}

    require "config/db.php";
    
    $id = $_GET["id"];
    // Custom query
    $query = "SELECT * FROM posts WHERE id={$id}";

    $result = mysqli_query($conn, $query);

    $post = mysqli_fetch_assoc($result);

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
    <title>Post Detail</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <a href="<?php echo ROOT_URL ?>">Back</a>
        <h1><?php echo $post["title"] ?></h1>
        <p><?php echo $post["body"] ?></p>
        <p>Created by: <span style="color: maroon;"><?php echo $post["author"] ?></span> | On: <?php echo $post["date_created"] ?></p>
        <a href="editpost.php?id=<?php echo $post["id"] ?>">Edit</a>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" style="margin: 0;">
            <input type="hidden" name="delete_id" value="<?php echo $post["id"] ?>">
            <div>
                <input type="submit" style="background: red; width: 15%; border: none; border-radius: 4px;" value="Delete" name="delete">
            </div>
        </form>
    </div>
</body>
</html>