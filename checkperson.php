<?php
include "conn.php";

if(isset($_POST['email']))
{
	$sql = "SELECT * FROM employee WHERE email = '".$_POST['email']."'";
	$result = mysqli_query($con, $sql);
	echo mysqli_num_rows($result);

}

?>
