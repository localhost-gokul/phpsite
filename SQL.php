<?php
$servername ="localhost"; //server name
$username ="root";        //MSYQL username
$password ="";            //MYSQL password
$dbname = "student_db";   //database name

//initializing the connection with MYSQL
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn ->connect_errno){
    die("connection failed: ".$conn->connect_errno);
}
?>