<?php 
    session_start();
    // include 'connection.php';
    $con = mysqli_connect('localhost','root','magnifico23');
    mysqli_select_db($con, 'postapp');

    $user_check = $_SESSION['username'];

    $sess_sql = mysqli_query($con, "SELECT username FROM users WHERE username='$user_check'");
    $row = mysqli_fetch_array($sess_sql, MYSQLI_ASSOC);

    $login_user = $row['username'];

?>