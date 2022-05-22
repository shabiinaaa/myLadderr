<?php
require '../HTML/searchCompanies.html';
require 'connectDB.php';


if(isset($_GET["searchbar"]))
{
    $searchText =  $_GET["searchbar"];
    if($searchText != "" && $searchText != null)
    {
        $sql = "SELECT * FROM company WHERE
        companyName LIKE '%$searchText%' OR noOfOpenings LIKE '%$searchText%' OR
        description LIKE '%$searchText%' OR establishedYear  LIKE '%$searchText%' OR
        hotline LIKE '%$searchText%' OR website LIKE '%$searchText%' OR field LIKE '%$searchText%' OR
        headOfficeAddress LIKE '%$searchText%' OR postalAddress LIKE '%$searchText%' OR 
        postBoxNumber LIKE '%$searchText%'" ;

        $result = $connection->query($sql);
        $searchData = array();
        if ($result->num_rows > 0) 
        {
            echo '<script>console.log("has records"); </script>';
            while($row = $result->fetch_assoc()) 
            {
                array_push($searchData, $row);    
            }
            $myjson = json_encode($searchData);

            echo "<script type=\"text/javascript\">displayResults($myjson, \"$searchText\")</script>";
        }
        else{
            echo '<script>console.log("no records"); </script>';
        }
    }
}

if(isset($_COOKIE["searchText"])) 
{
    echo '<script>console.log("searchText is set")</script>';
    $searchText = $_COOKIE["searchText"];

    //echo "<script>console.log(\"$searchText\"); </script>";
    if($searchText != "" && $searchText != null && !isset($_GET["searchbar"]))
    {
        $searchText =  $_GET["searchbar"];
        if($searchText != "" && $searchText != null)
        {
            $sql = "SELECT * FROM company WHERE
            companyName LIKE '%$searchText%' OR noOfOpenings LIKE '%$searchText%' OR
            description LIKE '%$searchText%' OR establishedYear  LIKE '%$searchText%' OR
            hotline LIKE '%$searchText%' OR website LIKE '%$searchText%' OR field LIKE '%$searchText%' OR
            headOfficeAddress LIKE '%$searchText%' OR postalAddress LIKE '%$searchText%' OR 
            postBoxNumber LIKE '%$searchText%'" ;

            $result = $connection->query($sql);
            $searchData = array();
            if ($result->num_rows > 0) {
                echo '<script>console.log("has records"); </script>';
                while($row = $result->fetch_assoc()) {
                    array_push($searchData, $row);    
                }
                $myjson = json_encode($searchData);
                
                echo "<script type=\"text/javascript\">displayResults($myjson, \"$searchText\")</script>";
                
            }
            else{
                echo '<script>console.log("no records"); </script>';
            }
        }
    }
} 
else 
{ 
    echo '<script>console.log("searchText not set")</script>';

}


?>
