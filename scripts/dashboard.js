document.getElementById("landing").innerHTML = "Logged in as " + sessionStorage.sessionName;


function sendToServer(){

    var name = document.getElementById("topicName").value;
    var comment = document.getElementById("commentField").value;
    var user = sessionStorage.sessionName;
    if (name == "" || comment == ""){
        alert("Please fill out all fields to post");
        return;
    }
    else if (user == ""){
        alert("You need to be logged in to post.");
        return;
    }

    $.ajax({ url: 'dashboard.php',
        async: false,
        data: {functioncall: 'addTopic', title: name,
        message: comment, poster: user},
         type: 'post',
         success: function(output) {

         }
});



}


function Logout(){
    sessionStorage.sessionName = "";
    window.location.href = "index.php"

}

function CreateTopic(){
alert("We cookin");


    
}