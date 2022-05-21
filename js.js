
function myFunction() {
    var name = document.getElementById("txt1").value;
    document.getElementById("para1").innerHTML = "Hello I am "+ name + "<br/>"; 
}
    
function myFunc(){
    var btn = document.getElementById("btn1");
    btn.click();
} 

function searchBtn(){
    console.log("Form submit trigger");
    //alert("Form submit trigger");
    
    var name = document.getElementById("searchbar").value;
    console.log(name);
    document.getElementById("para1").innerHTML = name + "<br/>"; 

    const form =  document.getElementById("searchbarForm");
    form.submit();
}

function somefunc(){
    alert("some func");
}

