<?php
require 'config.php';

$sql = "SELECT * FROM job;" ;
$result = $connection->query($sql);


if ($result->num_rows > 0) 
{
    $searchData =array();
    while($row = $result->fetch_assoc()) 
    {
        array_push($searchData, $row);
            
        //echo "<br>id: " . $row["jobID"]. " - Name: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
    }
    echo "<br>count ".count($searchData);
}
else
{
    echo "5<br>";
    echo "no records";
}

?>