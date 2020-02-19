<?php
    session_start();
    // if (!isset($_SESSION['user'])) {
    //     header('location: login.php');
    // }
    require "config/db.php";

    if (isset($_POST["submit"])) {
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $author = mysqli_real_escape_string($conn, $_POST["author"]);
        $body = mysqli_real_escape_string($conn, $_POST["body"]);
        
        $query = "INSERT INTO posts (title,author,body) VALUES ('$title','$author','$body')";

        if (mysqli_query($conn, $query)) {
            $_SESSION['message'] = "Post created succesfully.";
            header("Location:".ROOT_URL."");
        }else{
            echo "ERROR: ".mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Post</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <label>Title</label>
        <input type="text" name="title" required>
        <label>Author</label>
        <input type="text" name="author" required>
        <label>Body</label>
        <textarea name="body" id="" cols="30" rows="10" required></textarea>
        <input type="submit" value="Submit" name="submit" style="border-radius: 4px;">
    </form>
</body>
</html>