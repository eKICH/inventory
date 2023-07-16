<?php

if(isset($_POST['exportpersons'])){
	// Include Db
	include "conn.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Employee_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('id','First Name','Last Name','Employee ID','Title','Phone','Email','Department','Date Created'));
	$query ="SELECT * FROM employee ORDER BY id ASC";
	$result = mysqli_query($con, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>