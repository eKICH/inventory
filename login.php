<?php
//Include Database Connection
include "conn.php";

//Start Session

session_start();
$error = '';
if(isset($_POST['submit'])){
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$query = ("SELECT * FROM regaccess WHERE email='$email'");
	$data = mysqli_query($con, $query);
	
	$total = mysqli_num_rows($data);
	
	if($total > 0){
		$row = mysqli_fetch_array($data);
		$password_hash = $row['password'];
		if(password_verify($password,$password_hash)){
			$_SESSION['userid'] = $email;
			header('location:http://localhost/Inventory/dashboard.php');
		}
		else{
			$error = "Wrong email or Password!";
			header("Location:http://localhost/Inventory/index.php?error=".$error);
		}
	}
	
}

?>