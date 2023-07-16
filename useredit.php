<?php
//include dashboard
include "dash-include.php";
//include Db
include "conn.php";
// check GET request id param
if(isset($_GET['id'])){
	
	$id = Mysqli_real_escape_string($con, $_GET['id']);
	
	$sql = "SELECT * FROM regaccess WHERE id=$id";

	
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
	<title>Edit User - AssetMopau</title>
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
	<h3><i class="fas fa-pen"></i><small> Edit Users</small></h3>
	</div><br>
	<div class="listinfoedit"> 
		<p><strong>You can make changes to the users and update them in the database.</strong></p>
		</div>
		<br><br>
<?php if($pizza): ?>

<div class="listtbledit">
<p class="alert alert-success" id="show_message" style="display: none; color:green;">AssetMopau: Asset Updated Successfully</p>
<p class="alert alert-danger" id="error" style="display: none; color:red;"></p>
<form class="size" action="javascript:void(0)" id="ajax-form">
						  <div class="form-group">
							<input type="hidden" class="form-control" name="id" id="id" value="<?php echo htmlspecialchars($pizza['id']); ?>">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="newfname" id="newfname" value="<?php echo htmlspecialchars($pizza['fname']); ?>" placeholder="First Name">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="newlname" id="newlname" value="<?php echo htmlspecialchars($pizza['lname']); ?>" placeholder="Last Name">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="newtitle" id="newtitle" value="<?php echo htmlspecialchars($pizza['title']); ?>" placeholder="Title">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="newphone" id="newphone" value="<?php echo htmlspecialchars($pizza['phone']); ?>" placeholder="Phone Number">
						  </div>
						  <div class="form-group">
							<input type="email" class="form-control" name="newemail" id="newemail" value="<?php echo htmlspecialchars($pizza['email']); ?>" placeholder="email">
						  </div>
						  
						<button type="submit" class="btn btn-info">Update</button>
						<a href="http://localhost/Inventory/users.php"><input type="button" class="btn btn-danger" Value="Cancel"></button></a>
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
 
        //first name required
        var fname = $("input#fname").val();
        if(fname == ""){
            $("#error").fadeIn().text("First Name required.");
            $("input#fname").focus();
            return false;
        } 
		//last name required
        var newlname = $("input#newlname").val();
        if(newlname == ""){
            $("#error").fadeIn().text("Last Name required.");
            $("input#newlname").focus();
            return false;
        } 
		//title required
        var newtitle = $("input#newtitle").val();
        if(newtitle == ""){
            $("#error").fadeIn().text("Title required.");
            $("input#newtitle").focus();
            return false;
        }
		
		//Phone required
        var newphone = $("input#newphone").val();
        if(newphone == ""){
            $("#error").fadeIn().text("Phone required.");
            $("input#newphone").focus();
            return false;
        }
 
        // Email required
       var newemail= $("input#email").val();
        if(newemail == ""){
            $("#error").fadeIn().text("Email required");
            $("input#newemail").focus();
            return false;
        } 
		
		
 
 
        // ajax
        $.ajax({
            type:"POST",
            url: "userupdate.php",
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