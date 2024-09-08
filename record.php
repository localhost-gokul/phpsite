<?php
include "serv_cred.php"; //server credentials file

//check the server connection if failed it dies
if($conn->connect_error){
    die("Connection failed ".$conn->connect_error);
}

$conn->select_db($dbname);
//display the details by using the query1
$query1 = "SELECT id, name, rollno, date_of_birth, year, created_at FROM students";
$result = $conn->query($query1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Details</title>
</head>
<body>
    <h1>All student details</h1>
    <?php if ($result->num_rows > 0):?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID </th>
                <th>Name</th>
                <th>Rollno</th>
                <th>Date of Birth</th>
                <th>Year</th>
                <th>Created At</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()):?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['rollno'];?></td>
                <td><?php echo $row['date_of_birth'];?></td>
                <td><?php echo $row['year'];?></td>
                <td><?php echo $row['created_at'];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    <?php else: ?>
        <script>alert("No records found")</script>
    <?php endif; ?>

    <?php $conn->close(); ?>
</body>
</html>