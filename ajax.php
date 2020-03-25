<?php

function createTables() {
   $db = mysqli_connect("localhost", "root", "", "project");
    if (!$db) {
        die("Connection to db failed: " . mysqli_connect_error());
      }

    $sql = "CREATE TABLE IF NOT EXISTS `user_info` (
    username TEXT,
    password TEXT,
    name TEXT, 
    email TEXT)";

    if(mysqli_query($db, $sql)){
        echo "Table user_info has been created successfully"; 
    }
    else {
        echo "Error creating table: " . mysqli_error($db);
    }

    $sql2 = "CREATE TABLE IF NOT EXISTS `messages` (
        message TEXT,
        post TEXT,
        time INT,
        user TEXT)";

    if(mysqli_query($db, $sql2)){
        echo "Table messages has been created successfully"; 
    }
    else {
        echo "Error creating table: " . mysqli_error($db);
    }

    $sql3 = "CREATE TABLE IF NOT EXISTS `posts` (
        poster TEXT,
        time INT,
        title TEXT,
        url TEXT)";

    if(mysqli_query($db, $sql3)){
        echo "Table posts has been created successfully"; 
    }
    else {
        echo "Error creating table: " . mysqli_error($db);
    }
}

createTables();

function createUser($username, $password, $name, $email){
    $db = mysqli_connect("localhost", "root", "", "project");
    if (!$db) {
        die("Connection to db failed: " . mysqli_connect_error());
      }

    $sql = "INSERT INTO user_info (username, password, name, email) VALUES ('$username','$password', '$name', '$email')";
  	mysqli_query($db, $sql);
}

function accExists($username){
    $db = mysqli_connect("localhost", "root", "", "project");
    if (!$db) {
        die("Connection to db failed: " . mysqli_connect_error());
      }
    $sql = "SELECT * FROM user_info WHERE username = '$username'";
    $value = mysqli_query($db, $sql);
    if (mysqli_num_rows($value) > 0){
        return true;
    }
    else{
        return false;
    }
}

function login($username, $password){
    $db = mysqli_connect("localhost", "root", "", "project");
    if (!$db) {
        die("Connection to db failed: " . mysqli_connect_error());
      }
    $sql = "SELECT * FROM user_info WHERE username = '$username'";
    $value = mysqli_query($db, $sql);
    $resultsCheck = mysqli_num_rows($value);
    if ($resultsCheck > 0){
        $row = mysqli_fetch_assoc($value);
        $pwcheck = $row['password'];
    }
    else{
        return false;
    }
    if ($pwcheck == $password){
        return true;
    }
    else{
        return false;
    }





}


if(isset($_POST['functioncall']) && !empty($_POST['functioncall'])) {
    $functioncall = $_POST['functioncall'];
    switch($functioncall) {
        case 'createUser':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $value = accExists($username);
            if ($value){
                echo 0;
            }
            else{
                createUser($username, $password, $name, $email);
                echo 1;
            }
            break;
        case 'login':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $verified = accExists($username);
            if ($verified){
                $value = login($username, $password);
                if ($value){
                    echo 1;
                }
                else{
                    echo 0;
                }
            }
            else{
                echo -1;
            }
            break;
        case 'testPromise':
            echo "hi";
        break;
        }
            

        // other cases
    }

?>