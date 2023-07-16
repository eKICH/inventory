<?php
// include dashboard.
include "dash-include.php";
// include db connection.
include 'conn.php';

// check GET request id param
if(isset($_GET['id'])){
	
	$id = Mysqli_real_escape_string($con, $_GET['id']);
	
	$sql = "SELECT * FROM assets WHERE id=$id";

	
	//get query results
	
	$result = Mysqli_query ($con, $sql);

	//fetch result in array format
	$pizza = Mysqli_fetch_assoc($result);
	

	
	Mysqli_free_result($result);
	Mysqli_close($con);
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Update Asset - AssetMopau</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="dash.css">
	<link rel="stylesheet" href="person.css">
</head>
<body>
<div class="listcont">
	<div class="listtitleedit">
	<h3><i class="fas fa-pen"></i><small> Edit Assets</small></h3>
	</div><br>
	<div class="listinfoedit"> 
		<p><strong>You can make changes to the asset and update them in the database. Select employee and assign the asset to them</strong></p>
		</div>
		<br><br>
<?php if($pizza): ?>

<div class="listtbledit">
<p class="alert alert-success" id="show_message" style="display: none; color:green;">AssetMopau: Asset Updated Successfully</p>
<p class="alert alert-danger" id="error" style="display: none; color:red;"></p>
<form class="size" action="javascript:void(0)" id="ajax-form">
						 <div class="form-group">
							<input type="hidden" class="form-control" name="id" id="id" placeholder="ID"  style="background-color:white;"value="<?php echo htmlspecialchars($pizza['id']); ?>">
						  </div>
						 <div class="form-group">
							<input type="text" class="form-control" name="newdescription" id="newdescription" placeholder="Description"  style="background-color:white;"value="<?php echo htmlspecialchars($pizza['description']); ?>">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="newbrand" id="newbrand" placeholder="Brand"  style="background-color:white;"value="<?php echo htmlspecialchars($pizza['brand']); ?>">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="newmodel" id="newmodel" placeholder="Model"  style="background-color:white;"value="<?php echo htmlspecialchars($pizza['model']); ?>">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="newserial" id="newserial" placeholder="Serial"  style="background-color:white;" value="<?php echo htmlspecialchars($pizza['serial']); ?>">
						  </div>
						  
						  <div class="form-group">
							<label>Status</label>
							<select class="form-control" id="newstatus" name="newstatus">
							  <option selected hidden value="">--- Please Select Status ---</option>
							  <option>In-Stock</option>
							  <option>Assigned</option>
							  <option>Re-Assigned</option>
							  <option>Under Repair</option>
							  <option>Lost/Missing</option>
							  <option>Broken</option>
							</select>
						  </div>
						  
						 
						  <div class="form-group">
						  <?php
							//include db
							include "conn.php";
							
							$dis = "SELECT * FROM employee";
							
							$res = Mysqli_query ($con, $dis);
							
							$options = "";
							$select = "";

							while($row = mysqli_fetch_array($res))
							{
								$select = $select."<option hidden></option>";
								$options = $options."<option>$row[6]</option>";
							}
						  ?>
							<label>Assign</label>
							<select class="form-control" id="assgname" name="assgname">
							<?php echo $select;?>
							 <?php echo $options;?>
							</select>
						  </div>
							
						<button type="submit" class="btn btn-info">Update</button>
						<a href="http://localhost/Inventory/listasset.php"><input type="button" class="btn btn-danger" Value="Cancel"></button></a>
			
						</form>
</div>

</div>
<?php else: ?>
<?php endif; ?>

<script type="text/javascript">
 $(document).ready(function($){
    // hide messages 
    $("#error").hide();
    $("#show_message").hide();
 
    // on submit...
    $('#ajax-form').submit(function(e){
 
        e.preventDefault();
 
 
        $("#error").hide();
 
        //description required
        var newdescription = $("input#newdescription").val();
        if(newdescription == ""){
            $("#error").fadeIn().text("Description required.");
            $("input#newdescription").focus();
            return false;
        } 
		//brand required
        var newbrand = $("input#newbrand").val();
        if(newbrand == ""){
            $("#error").fadeIn().text("Brand required.");
            $("input#newbrand").focus();
            return false;
        }
		
		//model required
        var newmodel = $("input#newmodel").val();
        if(newmodel == ""){
            $("#error").fadeIn().text("Model required.");
            $("input#newmodel").focus();
            return false;
        }
 
        // serial required
       var newserial= $("input#newserial").val();
        if(newserial == ""){
            $("#error").fadeIn().text("Serial required");
            $("input#newserial").focus();
            return false;
        }
		
		// status required
      var newstatus = $("select#newstatus").val();
        if(newstatus == ""){
            $("#error").fadeIn().text("Status required");
            $("select#newstatus").focus();
            return false;
        }
		
		// assigned required
      //var assgname = $("select#assgname").val();
       // if(assgname == ""){
       //     $("#error").fadeIn().text("Assign required");
       //     $("select#assgname").focus();
       //     return false;
       // }
		
		

        // ajax
        $.ajax({
            type:"POST",
            url: "assetupdate.php",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function(){
            $("#show_message").fadeIn();
            $("#show_message").fadeOut(5000);
			$("#ajax-form")[0].reset();
            }
			
        });
    });  

    return false;
    });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</body>
</html>