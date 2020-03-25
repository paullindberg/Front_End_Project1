<?php
function createTables() {
   $db = mysqli_connect("localhost", "root", "", "project");
    if (!$db) {
        die("Connection to db failed: " . mysqli_connect_error());
      }

    $sql = "CREATE TABLE IF NOT EXISTS user_info (
    username TEXT,
    password TEXT,
    name TEXT, 
    email TEXT)";

    if(mysqli_query($db, $sql)){

    }
    else {

    }

    $sql2 = "CREATE TABLE IF NOT EXISTS messages (
        message TEXT,
        time INT,
        url TEXT,
        user TEXT)";

    if(mysqli_query($db, $sql2)){
    }
    else {

    }

    $sql3 = "CREATE TABLE IF NOT EXISTS posts (
        header TEXT,
        poster TEXT,
        time INT,
        title TEXT,
        url TEXT)";

    if(mysqli_query($db, $sql3)){

    }
    else {

    }
}
?>