<?php
    //header("Location: http://localhost/MLB_09.01_02/js.html");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Ladderr_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error. "<br>");
    }
    else{
        echo "Connection success <br>";
    }
    
    if(isset($_REQUEST["searchbar"]))
    {
      $stuName = $_POST["searchbar"];
      $sql= "SELECT * FROM job where companyName LIKE '%$stuName%'";
      if($result=$conn->query($sql))
      {
        if($result->num_rows > 0)
        {
            include 'js.html';


            /*
            echo ("<table border='1'>"); 
            echo ("<td>". $row['jobID']. "</td>");
            echo ("<td>" . $row['title'] . "</td>"); 
            echo ("<td>" . $row['description'] . "</td>"); 
            echo ("<td>" . $row['location'] . "</td>"); 
            echo ("<tr>");
            echo ("</table>");
            */
            while($row = $result->fetch_assoc())
            {
              echo ("<script>");
              echo ('console.log("shab")');
              echo ("var title = $row['title'];");
              echo ("document.getElementById['para1'].innerHTML = title;");
              echo ("</script>");
            }

        }
        else
        {
          echo "no results";
        }
      }
    }
  /*
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

    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            $searchData = array(
                "jobID" => $row["jobID"],
                "title" => $row["title"],
                "description" => $row["description"]
            );
            
            echo "id: " . $row["jobID"]. " - Name: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
        }
        //echo "<br/><br/> count : ". count($searchData);
        
        /*
        echo
            "<script>
                alert('done');
                console.log('somefunc()');
                document.getElementById("para1").innerHTML = "shabsster"; 
                window.history.go(-1);
                somefunc();
                console.log('somefunc()');
            </script>";
        */
            
/*
    } 
    else 
    {
        echo "0 results";
    }
*/
    $conn->close();

?>