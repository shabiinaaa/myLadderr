<?php
require 'connectDB.php';
require '../HTML/interestedJobs.html';

$saved = array();
$job = array();


$sql = "SELECT * FROM saves";
    
$result = $connection->query($sql);

$myRegID = 8;
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        if($row["registeredID"] == $myRegID)
        {
            $id = $row["jobID"];
            $sql2 = "SELECT * FROM job where jobid=$id";

            $result2 = $connection->query($sql2);
            array_push($saved, $row);
            
            if ($result2->num_rows > 0) 
            {
                while($row2 = $result2->fetch_assoc()) 
                {
                    echo "<script>console.log(\"$a\")</script>";
                    array_push($job, $row2);   
                }
            }
        }
    }

    
    $myjson = json_encode($job);
    $status =$_GET["ApproveRejectRadio"];
    echo "<script type=\"text/javascript\">displayResults($myjson, \"$status\")</script>";

}
else{
    echo '<script>console.log("no records"); </script>';
}
?>