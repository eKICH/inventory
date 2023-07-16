<?php 
//Include database connection
include "conn.php";

//Declare variables
$description = $con->real_escape_string($_POST['description']);
$brand = $con->real_escape_string($_POST['brand']);
$model = $con->real_escape_string($_POST['model']);
$serial = $con->real_escape_string($_POST['serial']);
$pdate = $con->real_escape_string($_POST['pdate']);
$cost = $con->real_escape_string($_POST['cost']);
$pfrom = $con->real_escape_string($_POST['pfrom']);
$status = $con->real_escape_string($_POST['status']);
$createdby = $con->real_escape_string($_POST['createdby']);

//insert data into the database
if(mysqli_query($con, "INSERT INTO assets(description,brand,model,serial,pdate,cost,pfrom,status,createdby)VALUES ('" . $description . "', '" . $brand . "', '" . $model . "','" . $serial . "','" . $pdate . "', '" . $cost . "', '" . $pfrom . "', '" . $status . "', '" . $createdby . "')")){
	echo '1';
} else {
	echo "Error: " . $sql . "" . mysqli_error($con);
}
mysqli_close($con);
?>