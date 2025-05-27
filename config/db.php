<?php
    $server = "localhost";
    $usename = "root";  
    $password = "";  
    $dbname = "mydb";  

    $conn = mysqli_connect($server, $usename, $password, $dbname);

    if (!$conn) {
        echo "Error: " . mysqli_connect_error();
        exit;
    }
?>