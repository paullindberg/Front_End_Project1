<?php

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