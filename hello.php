
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
         initial-scale=1.0">
    <title>new</title>
</head>
<body>
    <div>
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="searchbarForm">
            <input type="text" class="searchbarStyle" name="searchbar">
            <input type="submit" id="submitBtn" name="submitBtn">
        </form>
    </div>
    
    <div id="jobsDiv">

    </div>

<?php
require 'config.php';

if(isset($_GET["searchbar"]))
{
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
            array_push($searchData,$row);    
            //echo "id: " . $row["jobID"]. " - Name: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
        }
        $myjson = json_encode($searchData);
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

<script>
    if('<?php echo $foundRecords ?>' == true)
    { 
        var myjson = JSON.parse('<?= $myjson; ?>');

        console.log(myjson);
        
        for (var key in myjson) 
        {
            if (myjson.hasOwnProperty(key)) 
            {
                console.log(myjson[key].title);
                const jobdiv = document.createElement("label");
                const node = document.createTextNode(myjson[key].title);
                jobdiv.appendChild(node);
                
                document.getElementById('jobsDiv').appendChild(jobdiv); 

                /*console.log(myjson[key].jobID);
                console.log(myjson[key].title);
                console.log(myjson[key].location);
                console.log(myjson[key].description);
                console.log(myjson[key].companyName);
                console.log(myjson[key].companyID);
                console.log(myjson[key].jobType);
                console.log(myjson[key].qaulifications);
                console.log(myjson[key].requiredSkills);
                console.log(myjson[key].salary);
                console.log(myjson[key].experiances);
                console.log(myjson[key].certification);
                console.log(myjson[key].category);
                console.log(myjson[key].visibility);*/
            }
        }
    }
</script>

</body>
</html>
