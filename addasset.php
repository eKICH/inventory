<?php include_once "dash-include.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add an Asset - AssetMopau</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="dash.css">
	<link rel="stylesheet" href="person.css">
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	
</head>
<body>
<div class="assetcont">
<div class="assettitle">
<h3><i class="fas fa-puzzle-piece"></i><small> Add an Asset</small></h3>
</div><br><br>
<p class="alert alert-success" id="show_message" style="display: none; color:green;">AssetMopau: Asset Added Successfully</p>
<p class="alert alert-danger" id="error" style="display: none; color:red;"></p>
<div class="assetform">
<form class="" action="javascript:void(0)" id="ajax-form">
  <div class="form-row">
    <div class="form-group col-sm-4">
	<label for="description">Description <span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="description" name="description" placeholder="Description">
    </div>
	<div class="form-group col-sm-4">
	<label for="brand">Brand <span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand">
    </div>
	<div class="form-group col-sm-4">
	<label for="model">Model <span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="model" name="model" placeholder="Model">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-sm-4">
	<label for="serialno">Serial No <span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="serial" name="serial" placeholder="Serial No">
    </div>
	<div class="form-group col-sm-4">
	<label for="purchasedate">Purchase Date <span style="color:red;">*</span></label>
      <input type="text" id="datepicker" class="form-control"  name="pdate" placeholder="Purchase Date">
	  <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
    </div>
	
	<div class="form-group col-sm-4">
	<label for="cost">Cost <span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-sm-4">
	<label for="purchasedfrom">Purchased From <span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="pfrom" name="pfrom" placeholder="Purchased From">
    </div>
	<div class="form-group col-sm-4">
	<!--<label for="status">Status</label>-->
      <input type="text" style="background-color:#c3d479;"class="form-control" id="status" name="status" value="In-Stock" hidden>
    </div>
	<div class="form-group col-sm-4">
	<!--<label for="user">Created By</label>-->
      <input type="hidden" style="background-color:#fff;"class="form-control" id="createdby" name="createdby" value="<?php echo $_SESSION['userid']; ?>">
    </div>
</div><br>

<div class="form-row">
<div class="form-group">
<button type="submit" class="btn btn-success">Add Asset</button>
<a href="http://localhost/Inventory/addasset.php"><input type="button" class="btn btn-danger" Value="Cancel"></button></a>
</div>
</div>
</form>
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
</div>
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
        var description = $("input#description").val();
        if(description == ""){
            $("#error").fadeIn().text("Description required.");
            $("input#description").focus();
            return false;
        } 
		//brand required
        var brand = $("input#brand").val();
        if(brand == ""){
            $("#error").fadeIn().text("Brand required.");
            $("input#brand").focus();
            return false;
        }
		
		//model required
        var model = $("input#model").val();
        if(model == ""){
            $("#error").fadeIn().text("Model required.");
            $("input#model").focus();
            return false;
        }
 
        // serial required
       var serial= $("input#serial").val();
        if(serial == ""){
            $("#error").fadeIn().text("Serial required");
            $("input#serial").focus();
            return false;
        }
		
		// purchase date required
      var pdate = $("input#datepicker").val();
        if(pdate == ""){
            $("#error").fadeIn().text("Purchase Date required");
            $("input#datepicker").focus();
            return false;
        }
		
		// cost required
      var cost = $("input#cost").val();
        if(cost == ""){
            $("#error").fadeIn().text("Cost required");
            $("input#cost").focus();
            return false;
        }
		
		// Purchased From required
      var pfrom= $("input#pfrom").val();
        if(pfrom == ""){
            $("#error").fadeIn().text("Purchased from required");
            $("input#pfrom").focus();
            return false;
        }

        // ajax
        $.ajax({
            type:"POST",
            url: "assetinsert.php",
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
</body>
</html>