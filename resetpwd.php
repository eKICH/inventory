<!DOCTYPE html>
<html lang=eng>
	<head>
		<title>Send Password - AssetMopau</title>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="persons.css">
		<link rel="stylesheet" href="dash.css">

	</head>

<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #b2c95e;">
		  <a class="navbar-brand" href="#"><strong style="color:#030063;">AssetMopau</strong></a>
	</nav>
  <div class="form-xp" style="margin-top:5vh; margin-left:30vw;">
<p>Please enter your email to receive reset code to recover your forgotten password.</p>
<?php
	if (isset($_GET['resubmit'])) {
		if ($_GET['resubmit'] == "expired") {
			echo '<p class="alert alert-success">You need to re-submit your request! Token Already Used..</p>';
		}
	}
 ?>
<form action="includes/reset-request.inc.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="email">Email<span style="color:red;">*</span></label>
      <input type="text" class="form-control"  name="email" style="background-color:#f1f1f1;" placeholder="Enter Your Email Address">
    </div>
  </div>
  <button type="submit" name="reset-request-submit" class="btn btn-info">Receive new password by email</button>
</form>
</div>
<?php
	if (isset($_GET['reset'])) {
		if ($_GET['reset'] == "success") {
			echo '<p class="alert alert-success" style="margin-top:1vh; margin-left:30vw; width:23vw;">Reset Link Sent to Your Email!</p>';
		}
	}
 ?>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
