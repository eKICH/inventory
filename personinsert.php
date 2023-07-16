<?php
//Include the Database Connection
include "conn.php";

//Declare variables
$fname = $con->real_escape_string($_POST['fname']);
$lname = $con->real_escape_string($_POST['lname']);
$empid = $con->real_escape_string($_POST['empid']);
$title = $con->real_escape_string($_POST['title']);
$phone = $con->real_escape_string($_POST['phone']);
$email = $con->real_escape_string($_POST['email']);
$department = $con->real_escape_string($_POST['department']);

//Insert data into the database
if(mysqli_query($con, "INSERT INTO employee(fname,lname,empid,title,phone,email,department)VALUES ('" . $fname . "', '" . $lname . "', '" . $empid . "','" . $title . "','" . $phone . "', '" . $email . "', '" . $department . "')")){
	echo '1';
} else {
	echo "Error: " . $sql . "" . mysqli_error($con);
}
mysqli_close($con);
?>