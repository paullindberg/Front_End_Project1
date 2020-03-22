<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Sign up results</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

</head>
  <body>
    
    <h1>Sign up results</h1>
    <div align="center">



<?php
  //initialize db connection
  $db = mysqli_connect("localhost", "pma", "", "image_upload");


//check fann_get_total_connections
if (!$db) {
  die("Connection to db failed: " . mysqli_connect_error());
}

  // Initialize message variable
  $msg = "";

  //When sign up button is clicked
  if (isset($_POST['signup'])) {
  	
  	//gets user inputted name/date/photog/loc
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);




    //////////////////////////////////////////
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS user_info (
    username VARCHAR(11) NOT NULL PRIMARY KEY,
    password TEXT NOT NULL,
    name TEXT NOT NULL,
    email TEXT NOT NULL
    )";

    if ($db->query($sql) === TRUE) {
      
    } else {
        echo "Error creating table: " . $db->error;
      }
    //////////////////////////////////////////

    $query = mysql_query("SELECT * FROM user_info WHERE username='$username'");
    if(mysql_num_rows($query) > 0){
      echo 'Username already exists';
    }else{
      $sql = "INSERT INTO user_info (username, password, name, email) VALUES ('$username','$password', '$name', 'email')";
      header("location:index.html");
      mysqli_query($db, $sql);
    }

    //insert values into db
    
  	//$sql = "INSERT INTO user_info (username, password, name, email) VALUES ('$username','$password', '$name', 'email')";


  	//mysqli_query($db, $sql);
  	
  }

  /*$result = mysqli_query($db, "SELECT * FROM user_info");
  //query, get all from db
  //print image and data
  while ($row = mysqli_fetch_array($result)) {
    echo "<div id='img_div'>";
      echo "<p>".$row['username']."</p>";
      echo "<p>".$row['password']."</p>";
      echo "<p>".$row['name']."</p>";
      echo "<p>".$row['email']."</p>";
    echo "</div>";
}*/

?>


      </div>
    </div>
  </div>
</body>
</html>