
<?php
require 'test/new.html';
require 'config.php';

if(isset($_GET["searchbar"]))
{
    //echo '<script>console.log("Form submitted!");</script>';
    $searchText =  $_GET["searchbar"];
    $sql = "SELECT * FROM job WHERE
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

    $result = $connection->query($sql);
    $searchData = array();
    $foundRecords = true;
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            array_push($searchData, $row);    
            //echo "id: " . $row["jobID"]. " - Name: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
        }
        $myjson = json_encode($searchData);
        
        echo "<script type=\"text/javascript\">displayResults($myjson)</script>";
        //echo "<br> count = ".count($searchData)."<br>";
    }
    else
    {
        $foundRecords = false;
        echo '<script>
        console.log("no records");
        </script>';
    }
}
?>
