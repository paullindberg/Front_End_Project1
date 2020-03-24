<!doctype html>
<html>
 <head>
 <meta charset="utf-8">
 <title>DashBoard</title>

 <script
 src="https://code.jquery.com/jquery-3.4.1.js"
 integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
 crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootst
rap/3.3.6/css/bootstrap.min.css">
 </head>
 <body class="container">
   <h1 id="landing"></h1>
   <button onclick="Logout()" class="btn btn-default">Logout</button>
   <br>
   <br>

   <form id="topicForm" method="post">
      <label for="topicName" >Subject:</label>
      <br>
      <input type="text" name="postTitle" id="topicName">
      <br>
      <br>
      <textarea name="comment" id="commentField"></textarea>
      <br>
      <input type="submit" value="Create Topic" name="submitTopic" onclick="sendToServer()">
</form>


   <br>
   <?php
   getPosts();
   ?>
   <br>
   


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"
 charset="utf-8"></script>
 <script src="scripts/dashboard.js" charset="utf-8"></script>


 </body>
</html>


<?php
function display()
{
    $title = $_POST["postTitle"];
    $date = getdate();
    $date = $date['0'];
}


function getPosts(){
   $db = mysqli_connect("localhost", "root", "", "project");
    if (!$db) {
        die("Connection to db failed: " . mysqli_connect_error());
      }
    $sql = "SELECT * FROM posts ORDER by time DESC";
    $value = mysqli_query($db, $sql);
    $resultsCheck = mysqli_num_rows($value);
    if ($resultsCheck > 0){
       while($row = mysqli_fetch_assoc($value)){
          $title = $row['title'];
          $poster = $row['poster'];
          $url = "posts/" . $row['url'];
          echo "<a href=$url><h3>$title</h3> by: $poster</a>";
       }
    }
    else{
      echo "There are no posts!";
   }
    mysqli_close($db);


}

function addTopic($title, $message, $poster, $date){
   $db = mysqli_connect("localhost", "root", "", "project");
   if (!$db) {
       die("Connection to db failed: " . mysqli_connect_error());
     }
   $sql = "SELECT * FROM posts WHERE poster = '$poster'";
   $value = mysqli_query($db, $sql);
   $resultsCheck = mysqli_num_rows($value);
   $index = strval($resultsCheck + 1);
   $url = $poster . $index . '.php';
   $sql = "INSERT INTO posts (poster, time, title, url) VALUES ('$poster','$date', '$title', '$url')";
   mysqli_query($db, $sql);
   mysqli_close($db);
   



}


if(isset($_POST['submit']))
{
   display();
} 




if(isset($_POST['functioncall']) && !empty($_POST['functioncall'])) {
   $functioncall = $_POST['functioncall'];
   switch($functioncall) {
       case 'addTopic':
         $title = $_POST['title'];
         $message = $_POST['message'];
         $poster = $_POST['poster'];
         $date = getdate();
         $date = $date['0'];
         addTopic($title, $message, $poster, $date);
         echo 0;

         break;
       case 'login':
         break;
       }
           
   }



?>