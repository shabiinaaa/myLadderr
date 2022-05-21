<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Ladder_db";

  
    $conn = new mysqli($servername, $username,$password, $dbname);


    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        echo "Connection success";
    }

    
    echo "Connection success";
    /*
    $sql= "INSERT INTO myTable(ID,Name) VALUES(13,'SLIIT')";

    if($conn->query($sql)){
        echo "Inserted successfully";
    } 
    else{
        echo "Error:". $conn->error; 
    }
    */
    

    
    $sql3 = "SELECT count(*) as count FROM company";
    $result3 = $conn->query($sql3);

    $data=$result3->fetch_assoc();

    if($data["count"] > 0)
    {
        $sql2 = "SELECT * FROM company";
        $result = $conn->query($sql2);
        echo "has records";
        while ($row = $result->fetch_assoc())
        {
            echo "<br>". $row["companyName"] . " - " . $row["companyID"] . "<br>";
        } 
    }
    else
    {
        echo "no records";
    }

    $conn->close();
    

?>