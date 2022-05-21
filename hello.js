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