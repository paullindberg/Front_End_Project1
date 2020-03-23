document.getElementById("landing").innerHTML = "Logged in as " + sessionStorage.sessionName;

function Logout(){
    sessionStorage.sessionName = "";
    window.location.href = "index.html"

}

function CreateTopic(){
alert("We cookin");


    
}