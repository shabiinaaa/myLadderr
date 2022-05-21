
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Jobs - Ladderr</title>
    <link rel="stylesheet" href="../CSS/searchJobsStyles.css">
    <script src="../JS/searchJobs.js"></script>
</head>
<body>
    <!-- #region Bread crumb / Title / Search bar-->
    <div class="firstRowDiv">
        <!-- #region Bread Crumb-->
        <div class="breadCrumbStyle">
            <a href="Home.html">Home > &nbsp;</a>  
            <a href="Jobs.html">Jobs > &nbsp;</a> 
            <a href="searchJobs.html">Search Jobs</a> 
        </div>
        <!-- #endregion -->

        <!-- #region Page title-->
        <div class="PageTitleStyle">
            <label>Search Results for&nbsp;</label>
            <label id="SearchText">remote</label>
        </div>
        <!-- #endregion -->

        <!-- #region Search bar -->
        <div class="SearchbarDivStyle">
            <form method="get" action="searchJobs.php" name="searchbarForm">
                <img src="../images/search.png" alt="search icon" width="50px" height="45px">
                <input type="text" class="searchbarStyle" name="searchbar">
            </form>
        </div>
        <!-- #endregion -->
    </div>
    <!-- #endregion -->

    <!-- #region Sort by & Jobs-->
    <div class="secondRowDiv">
        <!-- #region Left filter grid-->
        <div class="leftFilterGridDiv">
            <!-- #region Preference-->
            <label>Preference</label>
            <div class="filterGridInnerDiv">
                <div>
                    <form method="get" action="../PHP/searchJobs.php">
                        <input type="checkbox" name="Preferences[]" id="appliedJobs" value="Applied">
                        <label for="appliedJobs">Applied</label>
                    </form>
                </div>
                <div>
                    <form method="get" action="../PHP/searchJobs.php">
                        <input type="checkbox" name="Preferences[]" id="interestedJobs" value="Interested">
                        <label for="interestedJobs">Saved</label>
                    </form>
                    
                </div>
            </div>  
            <!-- #endregion -->
        
            <hr width="100%">
        
            <!-- #region JobType-->
            <label>Job Type</label>
            <div class="filterGridInnerDiv">
                <div>
                    <input type="checkbox" name="JobType" id="fulltime" value="fulltime">
                    <label for="fulltime">Full-Time</label>
                </div>
                <div>
                    <input type="checkbox" name="JobType" id="parttime" value="parttime">
                    <label for="parttime">Part-Time</label>
                </div>
                <div>
                    <input type="checkbox" name="JobType" id="internship" value="internship">
                    <label for="internship">Internship</label>
                </div>
                <div>
                    <input type="checkbox" name="JobType" id="contract" value="contract">
                    <label for="contract">Contract</label>
                </div>
                <div>
                    <input type="checkbox" name="JobType" id="freelance" value="freelance">
                    <label for="freelance">Freelance</label>
                </div>
            </div>
            <!-- #endregion -->

            <hr width="100%">

            <!-- #region Location-->
            <label>Location</label>
            <div class="filterGridInnerDiv" id="LocationDiv">
                <div>
                    <input type="checkbox" name="location" id="remote" value="remote">
                    <label for="remote">Remote</label>
                </div>
                <div>
                    <input type="checkbox" name="location" id="Western" value="western">
                    <label for="Western">Western</label>
                </div>
                <div>
                    <input type="checkbox" name="location" id="central" value="central">
                    <label for="central">Central</label>
                </div>
                <div>
                    <input type="checkbox" name="location" id="sabaragamuwa" value="sabaragamuwa">
                    <label for="Sabaragamuwa">Sabaragamuwa</label>
                </div>
            </div>
            <!-- #endregion -->
            
            <hr width="100%">

            <!-- #region Date Posted-->
            <label>Date Posted</label>
            <div class="filterGridInnerDiv" id="LocationDiv">
                <div>
                    <input type="radio" name="datePosted" id="past1Hour">
                    <label for="past1Hour">Last 1 Hour</label>
                </div>
                <div>
                    <input type="radio" name="datePosted" id="past1Day">
                    <label for="past1Day">Last 1 Day</label>
                </div>
                <div>
                    <input type="radio" name="datePosted" id="past1Week">
                    <label for="past1Week">Past 1 Week</label>
                </div>
                <div>
                    <input type="radio" name="datePosted" id="past1Month">
                    <label for="past1Month">Past 1 Month</label>
                </div>
                <div>
                    <input type="radio" name="datePosted" id="past3Month">
                    <label for="past3Month">Past 3 Months</label>
                </div>
                <div>
                    <input type="radio" name="datePosted" id="alltime">
                    <label for="alltime">All time</label>
                </div>
            </div>
            <!-- #endregion -->
        
            <hr width="100%">

            <!-- #region Experiance-->
            <label>Experiance</label>
            <div class="filterGridInnerDiv">
                <select name="experiance" id="experianceSelect" class="experianceSelectStyle">
                    <option value="">none</option>
                    <option value="No Experiance">No Experiance</option>
                    <option value="0-1 year">0-1 year</option>
                    <option value="1-3 years">1-3 years</option>
                    <option value="3-5 years">3-5 years</option>
                    <option value="10 years">10 years</option>
                    <option value="more than 10">more than 10</option>
                </select>
            </div>
            <!-- #endregion -->

            <hr width="100%">

            <!-- #region Salary-->
            <label>Salary</label>
            <div class="rangeSelectedDiv">
                <label>0 -&nbsp;</label>
                <label id="SelectedAmount"></label> 
                <label>&nbsp; LKR/hour</label>
            </div>
            <div class="filterGridInnerDiv">
                <input type="range" name="salary" id="salaryRange" min="5" max="100" value="100">
            </div>
            <div class="rangeMinMaxLabelDiv">
                <div>
                    <label id="minSalary"></label>
                    <label>LKR/hour</label>
                </div>
                <div>
                    <label id="maxSalary"></label>
                    <label>LKR/hour</label>
                </div>
            </div>
            <!-- #endregion -->

            <hr width="100%">

            <!-- #region Filter-->
            <div class="btnDivStyle">
                <input type="submit" name="filterBtn" value="Filter" class="filterBtnStyle">
            </div>
            <!-- #endregion -->

        </div>
        <!-- #endregion -->

        <div class="Sort-Jobsdiv">
            <!-- #region Sort by-->
            <div class="sortByStripDiv">
                <hr>
                <div class="sortByDiv">
                    <label>Sort By :&nbsp;</label>
                    <div class="sortByList">
                        <label>&nbsp;Date</label>
                        <label>Most Popular</label>
                        <label>Company Name(A-Z)</label>
                        <label>Company Name(Z-A)</label>
                    </div>
                </div>
                <hr>
            </div>
            <!-- #endregion -->
        
            <!-- #region Jobs-->
                <div id="AllJobsDiv" class="AllJobsDiv">
                    <div id="aJob" class="aJob">
                        
                    </div>
                </div>
            <!-- #endregion -->

        </div>
        
    </div>
    <!-- #endregion -->
</body>
</html>

<?php
require ("connectDB.php");
if(isset($_GET["searchbar"]))
{
    $searchText = $_GET["searchbar"];
    $searchJobsSQL = "SELECT * FROM job 
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
                    visibility LIKE '%$searchText%'"; 

    $searchJobsResult = $connection->query($searchJobsSQL);
    
    $searchData = array();
    $foundRecords = true;
    if($searchJobsResult->num_row > 0)
    {
        while ($row = $searchJobsResult->fetch_assoc())
        {
            array_push($searchData, $row);
        } 
        $myjson = json_encode($searchData);
        echo "<script src="."../JS/searchJobs.js"."> displayResults($myjson); </script>";
    }
    else
    {
        $foundRecords = false;
        echo '<script>console.log("no records")</script>';
    }

    $connection->close();
}
?>
