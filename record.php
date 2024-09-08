<?php
include "serv_cred.php";

if($conn->connect_error){
    die("Connection failed ".$conn->connect_error);
}
$query1 = "SELECT id, username, rollno, date_of_birth, year, created_at FROM '$dbname'";
$result = $conn->query($query1);
?>