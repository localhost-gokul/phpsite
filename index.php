<?php
include "SQL.php"; //import the credentials file

$success_message = "";

//check the server method as post and the user is click the submit button
if(($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['submit'])){
    $student_name = $_POST['student_name'];
    $rollno = $_POST['rollno'];
    $date_of_birth = $_POST['data_of_birth'];
    $study_year = $_POST['study_year']; 

    //if the database is not create it create a new 
    $dbcheck = "CREATE DATABASE IF NOT EXISTS $dbname";
    if($conn->query($dbcheck) === true ){
        //select the database 
        $conn->select_db($dbname);

        //create the students table if it doesn't exists
        $create_table = "CREATE TABLE IF NOT EXISTS students (
        id            INT(11)     AUTO_INCREMENT PRIMARY KEY,
        student_name  VARCHAR(50) NOT NULL,
        rollno        VARCHAR(20) NOT NULL,
        date_of_birth DATE        NOT NULL,
        year          ENUM('First', 'Second', 'Third')  NOT NULL,
        created_at    TIMESTAMP   DEFAULT CURRENT_TIMESTAMP
        );";
        
        //If the error is accuired display the message
        if($conn->query($create_table) !== true){
            die("Error creating the table : ". $conn -> error);
        }
        else{
            die("Error creating the database :". $conn -> error);
        }
    }
    $sql_insert = "INSERT INTO students (student_name, rollno, date_of_birth, year) VALUES ('$student_name', '$rollno', '$date_of_birth', '$year')";

    if($con -> query($sql_insert) === true){
        echo "<script>alert('New Record created successfully.')</script>";
    }
    else{
        echo "Error ". $sql_insert ."<br>". $conn -> error;
    }
}

$conn -> close();
?>