<?php
//Include Database connection.
require('conn.php');

//Script to trigger delete.
$id=$_REQUEST['id'];
$query = "DELETE FROM assets WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location:http://localhost/Inventory/listasset.php"); 
Mysqli_close($con);
?>