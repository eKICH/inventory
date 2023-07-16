<?php
//include database connection
include "conn.php";

//Declare variables


//update query
$sql = "UPDATE employee SET fname='$_POST[newfname]',lname='$_POST[newlname]',empid='$_POST[newempid]',title='$_POST[newtitle]',phone='$_POST[newphone]',email='$_POST[newemail]',department='$_POST[newdepartment]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($con,$sql))
	header("refresh:1; url=persons.php");
else
	echo"Not updated";
?>