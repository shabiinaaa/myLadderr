<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Ladderr_db";
    
    
    $connection = new mysqli($servername, $username,$password, $dbname);
    
    
    if($connection->connect_error)
    {
        die("Connection failed: " . $connection->connect_error);
    }
    else{
        echo '<script>console.log("Connection success")</script>';
    }
    
?>