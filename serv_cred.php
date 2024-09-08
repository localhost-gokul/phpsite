<?php
$hostname ="localhost";   //server name
$username ="root";        //MSYQL username
$password ="";            //MYSQL password
$dbname = "student_db";   //database name

//initializing the connection with MYSQL
$conn = new mysqli($hostname, $username, $password);

if($conn ->connect_error){
    die("connection failed: ".$conn->connect_error);
}
?>