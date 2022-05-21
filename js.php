
<?php

require 'config.php';

echo "Check box test<hr>" ; 
if(!empty($_POST["Preferences"])) 
{

    foreach($_POST["Preferences"] as $check) 
    { 
        echo "check=$check<br>";
    } 
}
else
{
    echo "<br>check list empty";
} 


    $searchText = $_GET["searchbar"];

    $sql = "SELECT * FROM job 
                    WHERE SELECT * FROM job WHERE
                    title LIKE '%$searchText%' OR 
                    location LIKE '%$searchText%'  OR 
                    description LIKE '%$searchText%'  OR 
                    companyName  LIKE '%$searchText%' OR 
                    category LIKE '%$searchText%'  OR 
                    certification LIKE '%$searchText%'  OR 
                    requiredSkills LIKE '%$searchText%'  OR 
                    experiances LIKE '%$searchText%'  OR 
                    qaulifications LIKE '%$searchText%'  OR 
                    jobType LIKE '%$searchText%'  OR 
                    salary LIKE '%$searchText%'  OR 
                    visibility LIKE '%$searchText%'" ;

    echo "<br> sw";
    $connection.close();

    $result = $conn->query($sql);
    
        echo "<br> sw";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
    } else {
    echo "0 results";
    }
    $conn->close();

        
       /*
        while ($row = $searchJobsResult->fetch_assoc())
        {
            echo "<br>". $row["title"] . " - " . $row["location"] . " - ". $row["description"]"<br>";
        } 
    
    if($count["count"] > 0)
    {
        echo "has records";
        
    }
    else
    {
        echo "no records";
    }

    $connection->close();
    */
?>