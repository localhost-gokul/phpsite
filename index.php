<?php
include "serv_cred.php"; //import the credentials file

//check the server method as post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $date_of_birth = $_POST['date_of_birth'];
    $year = $_POST['year']; 

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
            die("Error creating the table : ". $conn->connect_error);
        }
    }
    else{
        die("Error creating the database :". $conn->connect_error);
    }

    //Insert the students details into the database
    $sql_insert = "INSERT INTO students (name, rollno, date_of_birth, year) VALUES ('$student_name', '$rollno', '$date_of_birth', '$year')";

    //Check the Query is inserted it display the message by using the Javascript
    if($conn -> query($sql_insert) === true){
        echo "<script>alert('New Record created successfully.')</script>";
    }
    else{
        echo "Error ". $sql_insert ."<br>". $conn->connect_error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Studnet Details</title>
</head>
<body>
    <h1>Add a new details</h1>
    <form action="index.php" method="post">
        Student Name : <input type="text" name="name" required><br><br>
        Roll No : <input type="text" name="rollno" required><br><br>
        Date of birth : <input type="date" name="date_of_birth" required><br><br>
        Year : 
        <input type="radio" name="year" value="First"required> First
        <input type="radio" name="year" value="Second"> Second
        <input type="radio" name="year" value="Third"> Third
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <form action="record.php" method="get">
        <input type="submit" value="View Record">
    </form>
</body>
</html>