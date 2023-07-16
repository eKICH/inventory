<?php
//Create Database Connection

$dbconn		="localhost";
$dbusername = "root";
$dbpassword ="";
$dbname		="inventory";

$con = new mysqli("$dbconn","$dbusername","$dbpassword","$dbname");

if($con === false){
	die("ERROR: Could not connect. " . $con->connect_error);
}
?>