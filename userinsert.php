<?php
// Include database connection
include "conn.php";

//Declare variables
$fname = $con->real_escape_string($_POST['fname']);
$lname = $con->real_escape_string($_POST['lname']);
$title = $con->real_escape_string($_POST['title']);
$phone = $con->real_escape_string($_POST['phone']);
$email = $con->real_escape_string($_POST['email']);
$password = $con->real_escape_string($_POST['password']);
$password = password_hash($password, PASSWORD_DEFAULT);
//$repassword = $con->real_escape_string($_POST['repassword']);
//$repassword = password_hash($repassword, PASSWORD_DEFAULT);

//Insert data into the Database
if(mysqli_query($con, "INSERT INTO regaccess(fname,lname,title,phone,email,password)VALUES ('" . $fname . "', '" . $lname . "', '" . $title . "', '" . $phone . "', '" . $email . "', '" . $password . "')")){
	echo '1';
} else {
	echo "Error: " . $sql . "" . mysqli_error($con);
}
mysqli_close($con);


?>
