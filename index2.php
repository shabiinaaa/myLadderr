<?php
    echo "Check box test<hr>" ; 
    if(!empty($_POST["Preferences"])) 
    {

        foreach($_POST["Preferences"] as $check) 
        { 
            echo "check=$check<br>";
        } 
    }
    else
    {
        echo "<br>check list empty";
    } 
?>