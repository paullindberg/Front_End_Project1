<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Gallery</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

</head>
  <body>
    <a href="upload.html"><-upload more photos</a>
    <h1>Photo gallery</h1>
    <div align="center">
      
      



<?php
  //initialize db connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");


//check fann_get_total_connections
if (!$db) {
  die("Connection to db failed: " . mysqli_connect_error());
}

  // Initialize message variable
  $msg = "";

  //When upload button is clicked
  if (isset($_POST['upload'])) {
  	//image file name
  	$image = $_FILES['image']['name'];
  	//gets user inputted name/date/photog/loc
    $name = mysqli_real_escape_string($db, $_POST['name']);

  	//target image file directory
  	$target = "uploads/".basename($image);

    //insert values into db
    //image BLOB?
  	$sql = "INSERT INTO images (image, name) VALUES ('$image','$name')";


  	mysqli_query($db, $sql);
  	if (move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$_FILES["image"]["name"])) {
      //if file uploaded, successful msg
  		$msg = "Successful";
  	}else{
  		$msg = "Failed to upload";
  	}
  }

  $result = mysqli_query($db, "SELECT * FROM images");
  //query, get all from db
  //print image and data
  while ($row = mysqli_fetch_array($result)) {
    echo "<div id='img_div'>";
      echo "<img src='uploads/".$row['image']."' height=15% width=15% >";
      echo "<p>".$row['name']."</p>";
    echo "</div>";
}

?>


      </div>
    </div>
  </div>
</body>
</html>