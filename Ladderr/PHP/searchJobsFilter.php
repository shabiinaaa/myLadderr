<?php
require 'connectDB.php';
if(isset($_GET["filterBtn"]))
{ 
    global $row;
    $searchText = $_COOKIE["searchText"];

    $sql = "SELECT * FROM job WHERE title LIKE '%$searchText%' OR description LIKE '%$searchText%' OR companyName LIKE '%$searchText%' OR category LIKE '%$searchText%' OR certification LIKE '%$searchText%' OR requiredSkills LIKE '%$searchText%'  OR qaulifications LIKE '%$searchText%'  " ;
    
    if(isset($_GET["JobType"]))
    {
        $rt = $_GET["JobType"];
        $sql1 = "";
        foreach($rt1 as $type){
            $sql1 += " AND jobType LIKE '%$type%' ";
        }
        $sql = $sql . $sql1;
    }

    if(isset($_GET["location"]))
    {
        $rt = $_GET["location"];
        $sql2 = " AND location LIKE '%$rt%' ";
        if($rt != "")
        {
            $sql = $sql . $sql2;
        }
    }
    
    if(isset($_GET["experiance"]))
    {
        $rt = $_GET["experiance"];
        $sql3 = " AND experiances LIKE '%$rt%' ";
        if($rt != "")
        {
            $sql = $sql . $sql3;
        }
    }

    if(isset($_GET["salary"]))
    {
        $rt = $_GET["salary"];
        $sql4 = " AND salary > $rt ";
        if($rt != "")
        {
            $sql = $sql . $sql4;
        }
    }
    //echo "<script> alert(\"$sql\"); </script>";
                        
    $result = $connection->query($sql);
    $row1 = array();

    if ($result->num_rows > 0) 
    {
        while($searchData = $result->fetch_assoc())
        {
            array_push($row1, $searchData);
        }
    }
    else{
        echo '<script>console.log("no records"); </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Jobs - Ladderr</title>
    <link rel="stylesheet" href="../CSS/searchJobs.css">
    <script src="../JS/searchJobs.js"></script>
</head>
<body onload="loaded()">
    
    <div class="firstRowDiv">
        <!-- #region Bread Crumb-->
        <div class="breadCrumbStyle">
            <a href="Home.html">Home > &nbsp;</a>  
            <a href="Jobs.html">Jobs > &nbsp;</a> 
            <a href="../HTML/searchJobs.html">Search Jobs</a> 
        </div>
        <!-- #endregion -->

        <!-- #region Page title-->
        <div class="PageTitleStyle">
            <label>Search Results for&nbsp;</label>
            <label id="SearchText" name="SearchText" ></label>
        </div>
        <!-- #endregion -->

        <!-- #region Search bar -->
        <div class="SearchbarDivStyle">
            <form method="get" action="../PHP/searchJobs.php" name="searchbarForm"  id="searchbarForm">
                <input type="text" class="searchbarStyle" name="searchbar" id="searchbar" " >
            </form>
            <img src="../images/search.png" alt="search icon" width="50px" height="45px" 
                    onclick="searchBtn(searchbarForm, searchbar)">
        </div>
        <!-- #endregion -->
    </div>

    <div class="secondRowDiv">

        <!-- #endregion -->

        <div class="SortJobsdiv">
            <hr>
            <!-- #region Jobs-->
                <div id="AllJobsDiv" class="AllJobsDiv" >
                    <?php
                    if(isset($_GET["filterBtn"]))
                    {   
                        global $row;
                        $searchText = $_COOKIE["searchText"];
                    
                        $sql = "SELECT * FROM job WHERE title LIKE '%$searchText%' OR description LIKE '%$searchText%' OR companyName LIKE '%$searchText%' OR category LIKE '%$searchText%' OR certification LIKE '%$searchText%' OR requiredSkills LIKE '%$searchText%'  OR qaulifications LIKE '%$searchText%'  " ;
                        
                        if(isset($_GET["JobType"]))
                        {
                            $rt = $_GET["JobType"];
                            $sql1 = "";
                            foreach($rt1 as $type){
                                $sql1 += " AND jobType LIKE '%$type%' ";
                            }
                            $sql = $sql . $sql1;
                        }
                    
                        if(isset($_GET["location"]))
                        {
                            $rt = $_GET["location"];
                            $sql2 = " AND location LIKE '%$rt%' ";
                            if($rt != "")
                            {
                                $sql = $sql . $sql2;
                            }
                        }
                        
                        if(isset($_GET["experiance"]))
                        {
                            $rt = $_GET["experiance"];
                            $sql3 = " AND experiances LIKE '%$rt%' ";
                            if($rt != "")
                            {
                                $sql = $sql . $sql3;
                            }
                        }
                    
                        if(isset($_GET["salary"]))
                        {
                            $rt = $_GET["salary"];
                            $sql4 = " AND salary > $rt ";
                            if($rt != "")
                            {
                                $sql = $sql . $sql4;
                            }
                        }
                        
                        //echo "<script> alert(\"$sql\"); </script>";
                    
                        $result = $connection->query($sql);
                        $row1 = array();
                    
                        if ($result->num_rows > 0) 
                        {
                            while($searchData = $result->fetch_assoc())
                            {
                                array_push($row1, $searchData);
                                echo '<div id="aJobDiv1" class="aJobDiv"  data-jobID="none" >
                                            <form action="../PHP/searchJobs.php" method="get" name="ajobform1">
                                                <input type="submit" name="SaveJob" id="SaveJob" 
                                                    value="Save" class="saveView" onclick="saveJob(parentElement, parentElement.parentElement)">
                                                <label name="jobIdLabel" value="stuff"></label>
                                            </form>'.
                                            "<label id=\"title\">".$searchData["title"]."</label>
                                            <label>".$searchData["companyName"]."</label>
                                            <label>".$searchData["location"]."</label>
                                            <label>".$searchData["jobType"]."</label>"
                                            .'<form action="../PHP/jobPage.php" method="get" >
                                                <input type="button" name="ViewJob" id="ViewJob" 
                                                value="View Details" class="saveView" onclick="createJobIDcookie(parentElement)">
                                            </form>
                                        </div>';
                            }
                        }
                        else{
                             echo '<script>console.log("no records"); </script>';
                        }
                    }

                    ?>
                </div>
            <!-- #endregion -->

        </div>

        
    </div>
</body>
</html>