<?php
//include database connection
include "conn.php";

//Declare variables
$newdescription = $con->real_escape_string($_POST['newdescription']);
$newbrand = $con->real_escape_string($_POST['newbrand']);
$newmodel = $con->real_escape_string($_POST['newmodel']);
$newserial = $con->real_escape_string($_POST['newserial']);
$newstatus = $con->real_escape_string($_POST['newstatus']);
$assgname = $con->real_escape_string($_POST['assgname']);

//update query
$sql = "UPDATE assets SET description='$_POST[newdescription]',brand='$_POST[newbrand]',model='$_POST[newmodel]',serial='$_POST[newserial]',status='$_POST[newstatus]',assignedto='$_POST[assgname]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($con,$sql))
	header("refresh:1; url=listasset.php");
else
	echo"Not updated";
?>