<?php
//include database connection
include "conn.php";



//update query
$sql = "UPDATE regaccess SET fname='$_POST[newfname]',lname='$_POST[newlname]',title='$_POST[newtitle]',phone='$_POST[newphone]',email='$_POST[newemail]'  WHERE id='$_POST[id]'";

//execute the query
if(mysqli_query($con,$sql))
	header("refresh:1; url=users.php");
else
	echo"Not updated";
?>