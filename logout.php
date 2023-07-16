<?php
//include Db
include "conn.php";

session_start();

if(isset($_SESSION['email'])){
	
	session_destroy();
	
	header("Location:http://localhost/Inventory/index.php");
	
}else{
	
	header("Location:http://localhost/Inventory/index.php");
	
}

?>