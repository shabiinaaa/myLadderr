<?php
require '../HTML/searchJobs.html';
require 'connectDB.php';


if(isset($_GET["searchbar"]))
{
    $searchText =  $_GET["searchbar"];
    if($searchText != "" && $searchText != null)
    {
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

if(isset($_COOKIE["searchText"])) 
{
    echo '<script>console.log("is set")</script>';
    $value = $_COOKIE["searchText"];
    $searchText =  $value;
    if($searchText != "" && $searchText != null &&$_GET["SaveJob"])
    {
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
else { echo '<script>console.log("not set")</script>';}

if($_GET["SaveJob"])
{
    echo '<script>console.log("SaveJob clicked")</script>';
    if(isset($_COOKIE["saveJobID"])){
        echo '<script>console.log("saveJobID is set")</script>';

        if(isset($_COOKIE["regID"]))
        {
            echo '<script>console.log("regID is set")</script>';
            $jobID = $_COOKIE["saveJobID"];
            $regID = $_COOKIE["regID"];
            $sqlSave = "INSERT INTO saves(registeredID, jobID) VALUES($jobID, $regID);";
 
            if ($connection -> query($sqlSave) === TRUE) {
                echo '<script> console.log("successfully saved!"); </script>';
            }
            else{
                echo "<script>alert(\"Error: $sqlSave . $conn->error\")</script>";
            }
        }
        else{
            echo '<script>console.log("regID is not set")</script>';
            echo '<script> alert("Please sign up to save job"); </script>';
        }
    }   
}
?>
