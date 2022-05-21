function searchBtn(formName)
{
    var name = formName.name;
    const form = document.getElementById[name];
    formName.submit();
};

function displayResults(js)
{ 
    var myjson = js;
    $count = 0;
    for (var key in myjson) 
    {
        if (myjson.hasOwnProperty(key)) 
        {   
            //console.log(myjson[key]);

            document.getElementById("title").innerHTML = myjson[key].title;
            document.getElementById("companyName").innerHTML = myjson[key].companyName;
            document.getElementById("location").innerHTML = myjson[key].location;
            document.getElementById("jobType").innerHTML = myjson[key].jobType;

            if($count > 0){
                const node = document.getElementById("job1");
                const clone = node.cloneNode(true);
                document.getElementById("JobDiv").appendChild(clone);
            }
            $count++;
            /*
            var jobdiv = document.createElement("label");
            jobdiv = document.createElement("label");

            console.log(myjson[key].title);
            const node1 = document.createTextNode(myjson[key].title);
            jobdiv.appendChild(node1);

            console.log(myjson[key].description);
            const node2 = document.createTextNode(myjson[key].description);
            jobdiv.appendChild(node2);
            
            const maindiv= document.getElementById("JobDiv");
            if(maindiv == null){console.log("null");}
            maindiv.appendChild(jobdiv); 
            
            console.log(myjson[key].jobID);
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
            console.log(myjson[key].visibility);
            */
           
        }
    }
    
    
};