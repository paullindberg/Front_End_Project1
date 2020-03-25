<?php
function displayContent($url){
    $db = mysqli_connect("localhost", "root", "", "project");
    if (!$db) {
        die("Connection to db failed: " . mysqli_connect_error());
      }
      $sql = "select * from posts where `url` = '$url'";
    $value = mysqli_query($db, $sql);
    if (mysqli_num_rows($value) > 0){
        while($row = mysqli_fetch_assoc($value)){
            $title = $row['title'];
            $poster = $row['poster'];
            $message = $row['header'];
            $time_ID = $row['time'];

            echo "<h3>$title</h3>
            <p>By: $poster</p>
            <br>
            $message"; 
         }
         $sql = "select * from messages where `url` = '$url' ORDER by time DESC";
         $value = mysqli_query($db, $sql);
         if (mysqli_num_rows($value) > 0){
            while($row = mysqli_fetch_assoc($value)){
                $message = $row['message'];
                $user = $row['user'];
                echo "
                <h4>$user:</h4>
                $message
                ";
            }
         }
         else{
             echo "<br>
             <br>
             <p>No posts found</p>";
         }
    }

}

function addMessage($message, $date, $url, $poster){
    $db = mysqli_connect("localhost", "root", "", "project");
    if (!$db) {
       die("Connection to db failed: " . mysqli_connect_error());
     }
    $sql = "INSERT INTO messages (message, time, url, user) VALUES ('$message','$date', '$url', '$poster')";
    mysqli_query($db, $sql);
    mysqli_close($db);




}




if(isset($_POST['functioncall']) && !empty($_POST['functioncall'])) {
    $functioncall = $_POST['functioncall'];
    switch($functioncall) {
        case 'submitMessage':
          $message = $_POST['message'];
          $poster = $_POST['poster'];
          $date = getdate();
          $date = $date['0'];
          $url = $_POST['url'];
          addMessage($message, $date, $url, $poster);
 
          break;
        case 'login':
          break;
        }
            
    }

?>