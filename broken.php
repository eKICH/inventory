<?php include_once "dash-include.php";

include_once 'conn.php';

$query = "SELECT * FROM assets WHERE status='Broken'";

$repair_result = mysqli_query($con, $query);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Broken Assets - AssetMopau</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="dash.css">
	<link rel="stylesheet" href="person.css">
</head>
<body>
<div class="listcont">
<div class="listtitle">
<h3><i class="fas fa-list"></i><small> List of Broken Assets</small></h3>
</div><br>
<div class="listinfo"> 
	<p><strong>In this section you can see all the Broken Assets that are behold repair.</strong></p>
	</div>
	<br><br><br>
<div class="listtbl">
<table id="example" class="display table-bordered" style="width:100%">
        <thead>
            <tr style="color:#000;">
				<th>Description</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Serial No</th>
                <th>Purchase date</th>
                <th>Cost</th>
				<th>Purchased From</th>
				<th>Status</th>
				<th>Assigned To</th>
				<th>Action</th>
            </tr>

        </thead>
        <tbody>
		<?php 
		while($rows = mysqli_fetch_assoc($repair_result))
		{
		?>
            <tr style="color:#000;">
                <td><?php echo $rows['description'];?></td>
                <td><?php echo $rows['brand'];?></td>
                <td><?php echo $rows['model'];?></td>
                <td><?php echo $rows['serial'];?></td>
                <td><?php echo $rows['pdate'];?></td>
				<td><?php echo $rows['cost'];?></td>
				<td><?php echo $rows['pfrom'];?></td>
				<td><?php echo $rows['status'];?></td>
				<td><?php echo $rows['assignedto'];?></td>
				<td>
				<a class="pen" href="assetedit.php?id=<?php echo $rows['id'];?>"" ><i class="fas fa-pen"></i></a>      
				<a href="#" class="trash" data-toggle="modal" data-target="#delete" href="#"><i class="fas fa-trash-alt"></i></a> 
				<!-- Delete Modal -->	
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="reglabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header" style="background-color:#d6edd7; color:#ee0000;">
						<h5 class="modal-title" id="reglabel"><small>Delete Asset</small></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						
						<div class="alert alert-danger" role="alert">
						Are you sure you want to delete this Asset?
						</div>
					  </div>
					  <div class="modal-footer">
						<button type="submit" class="btn btn-danger"><a href="deleteasset.php?id=<?php echo $rows['id'];?>" style="text-decoration:none; color:#fff;">Delete</a></button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					  </div>
					</div>
				  </div>
</div>
				</td>
            </tr>
		<?php
		}
		?>	 
		</tbody> 
</table>

</div>

<div class="listfoot">
<footer class="page-footer font-small blue pt-4">
<!-- Copyright -->
  <div class="footer-copyright text-center py-3">&copy; 2020 All Rights Reserved AssetMopau
  </div>
  <!-- Copyright -->
</footer>	
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
    $('#example').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         true
    } );
} );
</script>
</script>
</body>
</html>