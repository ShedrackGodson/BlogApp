<?php
    session_start();
    header("location: login.php");
    $con = mysqli_connect('localhost','root','magnifico23');
    mysqli_select_db($con, 'postapp');

    $name = $_POST['username'];
    $password = $_POST['password'];
    $r_password = $_POST['r_password'];

    $s = "SELECT * FROM users WHERE username='$name'";
    $result = mysqli_query($con,$s);

    $num = mysqli_num_rows($result);

    #Checking if the name exists by checking the number of rows containing the username
    if ($num == 1) {
        echo "Username already taken."; # Else register the user.
    }else{
        $reg = "INSERT INTO users(username,`password`) VALUES('$name','$password')";
        if ($password === $r_password) {
            mysqli_query($con,$reg);
            echo "Registration Succesfully.";
        }else{
            echo "Passwords didn't match.";
        }
    }
?>