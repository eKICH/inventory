<!DOCTYPE html>
<html lang=eng>
	<head>
		<title>AssetMopau: Registration</title>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="persons.css">
		<link rel="stylesheet" href="dash.css">
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #b2c95e;">
		  <a class="navbar-brand" href="#"><strong style="color:#030063;">AssetMopau</strong></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item">
				<a class="nav-link" href="http://localhost/Inventory/index.php">Login <span class="sr-only">(current)</span></a>
			  </li>
			 <!-- <li class="nav-item">
				<a class="nav-link" href="#">About</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Contact Us</a>
			  </li>-->
			  <!-- Button trigger modal -->
			  <li class="nav-item active">
				<a class="nav-link" href="http://localhost/Inventory/register.php">Register</a>
			  </li>
			</ul>
		  </div>
	</nav>
<!-- Register User -->
<div class="container">
<h3 style="width:400px; margin-left:25vw; margin-top:1.5vh">User Registration</h3>
<form action="javascript:void(0)" id="ajax-form" style="width:400px; margin-left:25vw;" method="POST">
<p class="alert alert-success" id="show_message" style="display: none; color:green;">AssetMopau: Registration Successfull</p>
<p class="alert alert-danger" id="error" style="display: none; color:red;"></p>
  <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname">
  </div>
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname">
  </div>
  <div class="form-group validate">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email">
		<span id="available"></span>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="repassword">Confirm Password</label>
    <input type="password" class="form-control" id="repassword" name="repassword">
  </div>

  <button type="submit" class="btn btn-success" id="btnsubmit" disabled>Register</button>
  <a href="http://localhost/Inventory/register.php"><input type="button" class="btn btn-danger" Value="Cancel"></button></a>
</form>
</div>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4">
<!-- Copyright -->
  <div class="footer-copyright text-center py-3">&copy; 2020 All Rights Reserved AssetMopau
  </div>
  <!-- Copyright -->
</footer>
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
        var lname = $("input#lname").val();
        if(lname == ""){
            $("#error").fadeIn().text("Last Name required.");
            $("input#lname").focus();
            return false;
        }

        // Email required
       var email= $("input#email").val();
        if(email == ""){
            $("#error").fadeIn().text("Email required");
            $("input#email").focus();
            return false;
        }


		// Password required
       var password= $("input#password").val();
        if(password == ""){
            $("#error").fadeIn().text("Password required");
            $("input#password").focus();
            return false;
        }

		// check password length
		var password= $("input#password").val();
		if(password.trim().length < 8){
			$("#error").fadeIn().text("Password too short. 8 Characters or more required");
            $("input#password").focus();
            return false;
		}


		// Retype Password required
       var repassword= $("input#repassword").val();
        if(repassword == ""){
            $("#error").fadeIn().text("Retype Password required");
            $("input#repassword").focus();
            return false;
        }
		//Password match validation
		var repassword= $("input#repassword").val();
		var password= $("input#password").val();
		if (password != repassword){
			$("#error").fadeIn().text("Password and Confirm Password don't match");
            $("input#repassword").focus();
            return false;
		}

        // ajax
        $.ajax({
            type:"POST",
            url: "useraccess.php",
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$('#email').blur(function(){
		var email = $(this).val();
		$.ajax({
			url:"check.php",
			method:"POST",
			data:{email:email},
			dataType:"text",
			success:function(html){
				if(html != '0')
				{
					$('#available').html('<span class="text-danger">Sorry!.. Email Taken</span>');
					$('#btnsubmit').attr("disabled",true);
				}
			else{
				$('#available').html('<span class="text-success">Email Available</span>');
				$('#btnsubmit').attr("disabled",false);
				}
			}

		});
	});
});
</script>
