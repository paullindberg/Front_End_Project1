function goBack(){
    window.location.href = "../dashboard.php";

}


function sendToServer(){

    var path = window.location.pathname;
    var page = path.split("/").pop();
    console.log( page );

    var comment = document.getElementById("commentField").value;
    var user = sessionStorage.sessionName;
    console.log(comment);

    $.ajax({ url: 'scripts.php',
    async: false,
    data: {functioncall: 'submitMessage', poster: user, url: page,
    message: comment},
     type: 'post',
     success: function(output) {

     }
});







}