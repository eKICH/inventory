<?php

if(isset($_POST['exportusers'])){
	// Include Db
	include "conn.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Users_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('id','First Name','Last Name','Email','Title','Phone','Date Created'));
	$query ="SELECT id,fname,lname,email,title,phone,Date_Created FROM regaccess ORDER BY id ASC";
	$result = mysqli_query($con, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>