/*
function goToJobPage(jobIDDiv){

    var jobID = jobIDDiv.getAttribute("data-jobid");
    setCookie("ViewJobID", jobID);
    location.replace("../HTML/jobPage.html");
}*/

function setCookie(cookieName, cookieValue) {
    const d = new Date();
    d.setTime(d.getTime() + (86400 * 30 * 30));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
    //console.log(expires);
}

function ApproveRejectFunc(element, self){
    setCookie("ApproveRejectCookie", self.value);
    element.submit();
}

function displayResults(js, choseOption)
{ 
    var myjson = js;
    var count = 1;
    
    for (var key in myjson) {
        if (myjson.hasOwnProperty(key)) 
        {   
            console.log(myjson[key]);
            let node;
            if(count > 1){
                myname = "aJobDiv"+(count-1);
                node = document.getElementById(myname);
                
                const clone = node.cloneNode(true);
                createLabels(clone);
                clone.setAttribute("id", "aJobDiv"+(count));
                clone.setAttribute("data-jobID", myjson[key].jobID);
                document.getElementById("AllJobsDiv").appendChild(clone);
                //console.log(clone.id + " " + clone.getAttribute("data-jobID"));
            }
            else{
                myname = "aJobDiv"+count;
                node = document.getElementById(myname);
                createLabels(node);
                node.setAttribute("data-jobID", myjson[key].jobID);
                //console.log(node.id + " " + node.getAttribute("data-jobID"));
            }
            count++;  
        }
    }

    function createLabels(mydiv){
        const children = mydiv.children;
        for(var child of children){
            switch (child.id) {
                case "title":
                    child.innerHTML = myjson[key].title;
                    break;
                case "companyName":
                    child.innerHTML = myjson[key].companyName;
                    break;
                
                case "location":
                    child.innerHTML = myjson[key].location;
                    break;
                case "jobType":
                    child.innerHTML = myjson[key].jobType;
                    break;
            }
        }
    } 

}

function ApplySaveFunc(thiss){
    if(thiss.value == "Saved Jobs")
    {
        location.replace("../HTML/interestedJobs.html");
    }
}

function loaded(){
    if("none" == document.getElementById("aJobDiv1").getAttribute("data-jobID"))
    {
        const myFormMan = document.getElementById("triggerForm");
        myFormMan.submit();
    }
}