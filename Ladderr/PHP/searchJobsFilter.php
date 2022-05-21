<?php

echo "<script>console.log(\"check box check\")</script>";
if($_GET["Preferences[]"]){
    if(!empty($_GET["Preferences[]"])) {
        foreach($_GET["Preferences[]"] as $check) 
        { 
            echo "<script>console.log(\"$check\")</script>";
        }
    }
    else{
        echo "<script>console.log(\"unchecked\")</script>";
    }
}

?>