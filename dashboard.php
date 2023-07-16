<?php 
include_once "dash-include.php" 
?>
 <?php
 include "conn.php";
 //In-Stock Assets
  $query = "SELECT COUNT(*) AS available FROM `assets` WHERE (status = 'In-Stock')";
  
  $asset_result = mysqli_query($con, $query);
  
  while($row = mysqli_fetch_assoc($asset_result)){
	  $aoutput = $row['available'];
  }
  // All Assets
  $active = "SELECT COUNT(*) AS active FROM `assets`";
  
  $active_result = mysqli_query($con, $active);
  
  while($row = mysqli_fetch_assoc($active_result)){
	  $active_output = $row['active'];
  }
  // Assets Under Repair
  $repair = "SELECT COUNT(*) AS repair FROM `assets` WHERE (status = 'Under Repair')";
  
  $repair_result = mysqli_query($con, $repair);
  
  while($row = mysqli_fetch_assoc($repair_result)){
	  $repair_output = $row['repair'];
  }
  
  // Assets Lost/Missing
  $lost = "SELECT COUNT(*) AS lost FROM `assets` WHERE (status = 'Lost/Missing')";
  
  $lost_result = mysqli_query($con, $lost);
  
  while($row = mysqli_fetch_assoc($lost_result)){
	  $lost_output = $row['lost'];
  }
  
  // Assets Broken
  $broken = "SELECT COUNT(*) AS broken FROM `assets` WHERE (status = 'Broken')";
  
  $broken_result = mysqli_query($con, $broken);
  
  while($row = mysqli_fetch_assoc($broken_result)){
	  $broken_output = $row['broken'];
  }
  // All Assets Sum Computed
  $cost = "SELECT COUNT(*) AS cost FROM `assets`";
  
  $cost_result = mysqli_query($con, $cost);
  
  while($row = mysqli_fetch_assoc($cost_result)){
	  $cost_output = $row['cost'];
  }
  // Assets Value
  $value = "SELECT SUM(cost) AS value FROM `assets`";
  
  $value_result = mysqli_query($con, $value);
  
  while($row = mysqli_fetch_assoc($value_result)){
	  $sum_output = $row['value'];
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - AssetMopau</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="dash.css">
	
</head>
<body>
<div class="dash">
<h3>Dashboard <small class="small">dashboard & statistics</small></h3>
</div>
<div class="row space">
 <div class="col-sm-4"><a href="http://localhost/Inventory/instock.php" style="color:#fff;">

    <div class="first">
	<!--<div class="puzzle"><i class="fas fa-puzzle-piece"></i></div>-->
      <div class="card-body">
        Available Assets (In-Stock)
		<div class="number"> <?php echo $aoutput; ?></div>
      </div>
    </div></a>
  </div>
 <div class="col-sm-4"><a href="http://localhost/Inventory/listasset.php" style="color:#fff;">
    <div class="second">
      <div class="card-body">
        Active Assets
		<div class="number"> <?php echo $active_output ?></div>
      </div>
    </div></a>
  </div>
  <div class="col-sm-4"><a href="http://localhost/Inventory/underrepair.php" style="color:#fff;">
    <div class="third">
      <div class="card-body">
        Under Repair
		<div class="number"><?php echo $repair_output ?></div>
      </div>
    </div></a>
  </div>
</div>

<div class="row now">
  <div class="col-sm-4"><a href="http://localhost/Inventory/lost.php" style="color:#fff;">
    <div class="fourth">
      <div class="card-body">
        Lost / Missing
		<div class="number"> <?php echo $lost_output ?></div>
      </div>
    </div></a>
  </div>
  <div class="col-sm-4"><a href="http://localhost/Inventory/broken.php" style="color:#fff;">
    <div class="fifth">
      <div class="card-body">
        Broken
		<div class="number"> <?php echo $broken_output ?></div>
      </div>
    </div></a>
  </div>
  
  <div class="col-sm-4"><a href="http://localhost/Inventory/listasset.php" style="color:#fff;">
    <div class="sixth">
      <div class="card-body">
        Value of Assets
		<div class="number"> <?php echo $cost_output ?></div>
		<div class="desc"> KES <?php echo $sum_output ?></div>
      </div>
    </div></a>
  </div>
</div>
<!-- Footer -->
<div class="assetfoot">
<footer class="page-footer font-small blue pt-4">
<!-- Copyright -->
  <div class="footer-copyright text-center py-3">&copy; 2020 All Rights Reserved AssetMopau
  </div>
  <!-- Copyright -->
</footer>	
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>