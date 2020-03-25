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
   <link rel="stylesheet" type="text/css" href="stylesheets/dashboard.css" />
 </head>
 <!-- <body class="container"> -->
 <body>
      <header>
         <nav class="navbar">
         <h1 class="page-name">reddit-lite</h1>
         <h1 class="dashboard-heading">dashboard</h1>
         </nav>
      </header>

      <section class="container-fluid">
      <h3 id="landing"></h3>
      <!-- <button onclick="Logout()" class="btn btn-default">Logout</button> -->
      <button onclick="Logout()" class="btn btn-lg btn-primary btn-block">Logout</button>
      <br>
      <br>

      <form id="topicForm" method="post">
         <label for="topicName" class="input-labels">Subject:</label>
         <br>
         <!-- <input type="text" name="postTitle" id="topicName"> -->
         <input type="text" name="postTitle" id="topicName" class="form-control input-lg" placeholder="Enter subject">
         <br>
         <br>
         <label class="input-labels">Text</label>
         <!-- <textarea name="comment" id="commentField"></textarea> -->
         <textarea name="comment" id="commentField" placeholder="Enter text" class="form-control input-lg"></textarea>
         <br>
         <!-- <input type="submit" value="Create Topic" name="submitTopic" onclick="sendToServer()"> -->
         <input type="submit" value="Create Topic" class="btn btn-success btn-block" name="submitTopic" onclick="sendToServer()">
      </form>
      </section>
</body>


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
   $db = mysqli_connect("localhost", "root", "winsongin", "project");
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
      // echo "There are no posts!";
      echo "<h2 class='no-posts'>There are no posts!</h2>";
   }
    mysqli_close($db);


}

function addTopic($title, $message, $poster, $date){
   $db = mysqli_connect("localhost", "root", "winsongin", "project");
   if (!$db) {
       die("Connection to db failed: " . mysqli_connect_error());
     }
   $sql = "SELECT * FROM posts WHERE poster = '$poster'";
   $value = mysqli_query($db, $sql);
   $resultsCheck = mysqli_num_rows($value);
   $index = strval($resultsCheck + 1);
   $url = $poster . $index . '.php';
   $sql = "INSERT INTO posts (poster, time, title, url, header) VALUES ('$poster','$date', '$title', '$url', '$message')";
   mysqli_query($db, $sql);
   mysqli_close($db);
   $content = "<?php\n
   \$url = '$url';
   include 'scripts.php';
   displayContent(\$url);
   ?>
   

   <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>
<script src=\"pages.js\" charset=\"utf-8\"></script>

<br>
<br>
<form id=\"topicForm\" method=\"post\">
      <textarea name=\"comment\" id=\"commentField\"></textarea>
      <br>
      <input type=\"submit\" value=\"Post\" name=\"submitTopic\" onclick=\"sendToServer()\">
</form>
<button onclick=\"goBack()\">Back</button>
   
   
   ";

   $file = fopen("posts/".$url, "w") or die("Unable to open file");
   fwrite($file, $content);
   fclose($myfile);
   



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
       case 'testPromise':
         echo "Hello from dashboard.php";
         break;
       }
           
   }



?>