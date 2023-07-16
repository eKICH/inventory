<?php

if(isset($_POST['exportasset'])){
	// Include Db
	include "conn.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Assets_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('id','Description','Brand','Model','Serial','Purchase Date','Cost','Purchased From','Status','Assigned To','Created By','Date Created'));
	$query ="SELECT * FROM assets ORDER BY id ASC";
	$result = mysqli_query($con, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>