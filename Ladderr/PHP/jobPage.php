<?php
require 'connectDB.php';

if(isset($_COOKIE["ViewJobID"]))
{
    if(isset($_COOKIE["regID"]))
    {
        $jobID = $_COOKIE["ViewJobID"];
        if($jobID != "none")
        {
            $sql = "SELECT * FROM job WHERE jobId = $jobID";

            if($connection->query($sql) === TRUE)
            {
                $result = $connection->query($sql);
                $searchData = array();
                if ($result->num_rows > 0) 
                {
                    echo '<script>console.log("has records"); </script>';
                    $row  = $result->fetch_assoc() ;
                }
                else{
                    echo '<script>console.log("no records"); </script>';
                } 
            }
        }
    }
    else{
        echo '<script>console.log("regID is not set")</script>';
        echo '<script> alert("Please sign up to save job"); </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Description - Ladderr</title>
    <link rel="stylesheet" href="../CSS/jobDescription.css">
    <script src="../JS/jobDescription.js"></script>
</head>
<body >
    
    <div class="firstRowDiv">
        <!-- #region Bread Crumb-->
        <div class="breadCrumbStyle">
            <a href="Home.html">Home > &nbsp;</a>  
            <a href="Companies.html">Jobs > &nbsp;</a> 
            <a href="../HTML/jobDescription.html"> Job Description</a> 
        </div>
        <!-- #endregion -->

        <!-- #region Page title-->
        <div class="PageTitleStyle">
            <label id="jobTitle" name="jobTitle" ></label>
        </div>
        <!-- #endregion -->

        <form action="<?php htmlspecialchars($_SESSION["PHP_SELF"]) ?>" method="get">
            <input type="submit" value="Apply Job" name="applyBtn">
        </form>
    </div>

    <div class="secondRowDiv">
        <div id="aJobDiv1" class="aJobDiv"  data-companyID="none" >
            <div class="jobDets">
                <div id="fieldList">
                    <?php 
                    foreach($row as $field => $vall)
                    {
                        //echo "<script>console.log(\"$field\"); </script>";
                        echo "<label>$field </label>";
                    }
                    ?>
                </div> 
                <div id="dataList">
                    <?php
                    foreach($row as $field => $vall)
                    {
                        //echo "<script>console.log(\"$vall\"); </script>";
                        echo "<label>: $vall</label>";
                    }
                    ?>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_GET["applyBtn"]))
{   
    if(isset($_COOKIE["regID"]))
    {
        $jobID = $_COOKIE["saveJobID"];
        $regID = $_COOKIE["regID"];

        $sqlCheck= "SELECT * FROM appliesTo WHERE registeredID=$regID";

        $results = $connection -> query($sqlCheck);
        $whetherApplied = 0;


        if ($results->num_rows > 0) 
        {
            while($row = $results->fetch_assoc())
            {
                if($row["jobID"] == $jobID && $row["registeredID"] == $regID){
                    $whetherApplied = 1;
                    break;
                }
            }
        }
        if(($whetherApplied == 0))
        {
            $date = date("Y-m-d");
            $status = 'N';
            $sqlApply = "INSERT INTO appliesTo(registeredID, jobID, appliedDate, approvalStatus) VALUES($regID, $jobID, '$date', '$status')";
            
            echo "<script>alert(\"You havent Already applied!\")</script>";
            if ($connection -> query($sqlApply) === TRUE) {
                echo '<script> console.log("successfully saved!"); </script>';
            }
            else{
                echo "<script>alert(\"Error: $sqlApply . $connection->error\")</script>";
            }
        }
        else
        {
            echo "<script>alert(\"You have Already applied!\")</script>";
        }
    }
}

?>