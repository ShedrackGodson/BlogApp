<?php
    session_start();
    
    $con = mysqli_connect('localhost','root','magnifico23');
    mysqli_select_db($con, 'postapp');

    $name = $_POST['user'];
    $password = $_POST['password'];

    $s = "SELECT * FROM users WHERE username='$name' && `password`='$password'";
    $result = mysqli_query($con,$s);

    $num = mysqli_num_rows($result);

    #Checking if the name exists by checking the number of rows containing the username
    if ($num == 1) {
        header('location: index.php');
    }else{
        header('location: login.php');
    }
?>