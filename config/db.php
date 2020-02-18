<?php
    require "config.php";
    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if (mysqli_connect_errno()) {
        # Failed to connect
        echo "Failed to connect".mysqli_connect_errno();
    }
?>
