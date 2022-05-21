<?php
require 'connectDB.php';
require '../HTML/AppliedJobs.html';


$applied = array();
$job = array();

if(($_GET["ApproveRejectRadio"]))
{
    $choseOption = $_GET["ApproveRejectRadio"];
    $sql = "SELECT * FROM appliesTo";
    switch ($choseOption) {
        case 'Approved':
            $sql = 'SELECT * FROM appliesTo WHERE approvalStatus = "Y"';
            break;
        case 'Rejected':
            $sql = 'SELECT * FROM appliesTo WHERE approvalStatus = "N"';
            break;
        default:
            $sql = 'SELECT * FROM appliesTo';
            break;
    }

    $result = $connection->query($sql);

    $myRegID = 10;
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            if($row["registeredID"] == $myRegID)
            {
                $a = $row["approvalStatus"] ;
                $id = $row["jobID"];
                $sql2 = "SELECT * FROM job where jobid=$id";

                $result2 = $connection->query($sql2);
                array_push($applied, $row);
                
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
}
else{
    echo '<script>console.log("not approve reject form"); </script>';
}
?>