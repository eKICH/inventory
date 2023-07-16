<?php include "login.php"; ?>
<!DOCTYPE html>
<html lang=eng>
	<head>
		<title>AssetMopau: Asset Inventory Management System</title>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="persons.css">
		<link rel="stylesheet" href="dash.css">

	</head>

<body style="">
	<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #b2c95e;">
		  <a class="navbar-brand" href="#"><strong style="color:#030063;">AssetMopau</strong></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="http://localhost/Inventory/index.php">Login <span class="sr-only">(current)</span></a>
			  </li>
			  <!--<li class="nav-item">
				<a class="nav-link" href="#">About</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Contact Us</a>
			  </li>-->
			  <!-- Button trigger modal -->
			  <li class="nav-item">
				<a class="nav-link" href="http://localhost/Inventory/register.php">Register</a>
			  </li>
			</ul>
			<!--<form class="form-inline">
			<input class="form-control mr-sm-2" type="username" name="username" placeholder="Username" aria-label=""style="background-color: #b2c95e;">
			<input class="form-control mr-sm-2" type="password" name="password" placeholder="Password" aria-label="" style="background-color: #b2c95e;">
			<button class="btn btn-success my-2 my-sm-0" type="submit">Sign in</button>
			</form>-->
		  </div>
	</nav>

<div class="container" style="width:30vw;height:65vh; margin-top:80px;border-shadow:-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 5px 10px 5px 5px rgba(0,0,0,0.75);
box-shadow: 5px 10px 10px 5px rgba(0,0,0,0.75);">
<script type="text/javascript">
function validate(){
var email=document.f2.email.value;
var password=document.f2.password.value;
var status=false;

if(email==""){
document.getElementById("emaillocation").innerHTML=
"Email can't be blank!";
status=false;
}else{
document.getElementById("emaillocation").innerHTML=
"";
status=true;
}

if(password==""){
document.getElementById("passwordlocation").innerHTML=
"Password Required!";
status=false;
}else{
document.getElementById("passwordlocation").innerHTML=
"";
status=true;
}

return status;
}
</script>
<form name="f2" method="POST" onsubmit="return validate()"><br>
	<div class="form-group">
    <i class="fas fa-user-circle fa-4x" style="padding-left:150px; color:#b2c95e;"></i>
  </div>
	<?php

          if (isset($_GET['newpwd'])) {
           if ($_GET['newpwd'] == "passwordupdated") {
              echo '<p class="alert alert-success">Your password has been reset!</p>';
          }
        }

       ?>
  <div style="color:red;">
	<?php if(isset($_GET['error'])) echo $_GET['error']; ?>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="email">
	<span id="emaillocation" style="color:red"></span>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password">
	<span id="passwordlocation" style="color:red"></span>
  </div>
  <!--<div class="form-group">
    <a href="" style="padding-left:220px;">Forgot Password?</a>
  </div>-->
  <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit">Signin</button>
</form>

<a href="resetpwd.php" title="Click to Reset password" data-toggle="tooltip" style="text-decoration:none; margin-left:18vw;">Forgot Password!</a>

</div>

<!-- Footer -->
<footer class="page-footer font-small blue pt-4">
<!-- Copyright -->
  <div class="footer-copyright text-center py-3">&copy; 2020 All Rights Reserved AssetMopau
  </div>
  <!-- Copyright -->
</footer>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>
