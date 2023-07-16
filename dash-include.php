<?php include "login.php"; ?>
<!--<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>-->
<body>

		<!-- Wrapper -->
    	<div class="wrapper">

			<!-- Sidebar -->
			<nav class="sidebar">

				<!-- close sidebar menu -->


				<div class="logo">
					<h4><strong>AssetMopau</strong></h4>
				</div>
				<div class="user">
					<i class="fas fa-user-circle fa-5x"></i>
				</div>
				<ul class="list-unstyled" style="margin-left:-1vw; width:19.6vw;">
						<li style="font-size:1vw;">
						<a href="#userloggedin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="userloggedin">
							<i class="fas fa-user"></i><?php echo "".$_SESSION['userid']; ?>
						</a>
						<ul class="collapse list-unstyled" id="userloggedin">
						<!--	<li>
								<a class="scroll-link" href="#"><i class="fas fa-key"></i>Change Password</a>
							</li>-->
							<li>
								<a class="scroll-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
							</li>
						</ul>
					</li>

					</ul>
				<div class="user-in">
					<p></p>
					</div>

				<ul class="list-unstyled menu-elements">
					<li class="">
						<a class="scroll-link" href="http://localhost/Inventory/dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
					</li>

					<li>
						<a href="#assets" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="assets">
							<i class="fas fa-puzzle-piece"></i>Assets
						</a>
						<ul class="collapse list-unstyled" id="assets">
							<li>
								<a class="scroll-link" href="http://localhost/Inventory/addasset.php"><i class="fas fa-plus-circle"></i>Add an Asset</a>
							</li>
							<li>
								<a class="scroll-link" href="http://localhost/Inventory/listasset.php"><i class="fas fa-list-alt"></i>List of Assets</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#advanced" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="advanced">
							<i class="fas fa-cog"></i>Advanced
						</a>
						<ul class="collapse list-unstyled" id="advanced">
							<li>
								<a class="scroll-link" href="http://localhost/Inventory/persons.php"><i class="fas fa-user"></i>Employees / Persons</a>
							</li>
							<li>
								<a class="scroll-link" href="http://localhost/Inventory/users.php"><i class="fas fa-users"></i>Users</a>
							</li>
						</ul>
					</li>
					<!--<li>

						<a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="reports"><i class="fas fa-file"></i> Reports
						</a>
						<ul class="collapse list-unstyled" id="reports">

							<li>
								<a class="scroll-link" href="http://localhost/Inventory/assetreport.php"><i class="fas fa-list-alt"></i>Assets</a>
							</li>
							<li>
								<a class="scroll-link" href="http://localhost/Inventory/personsreport.php"><i class="fas fa-user"></i>Employees / Persons</a>
							</li>
							<li>
								<a class="scroll-link" href="http://localhost/Inventory/usersreport.php"><i class="fas fa-users"></i>Users</a>
							</li>
						</ul>
					</li>-->


					<li>
						<a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="support">
							<i class="fas fa-envelope"></i>Support
						</a>
						<ul class="collapse list-unstyled" id="support">
							<li>
								<a class="scroll-link" href="http://localhost/Inventory/aboutus.php"><i class="fas fa-exclamation-circle"></i>About Us</a>
							</li>
							<li>
								<a class="scroll-link" href="http://localhost/Inventory/contactus.php"><i class="fas fa-phone"></i>Contact Us</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
			<!-- End sidebar -->
		</div>
			<!-- Content -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <strong><a class="nav-link" href="http://localhost/Inventory/addasset.php"><i class="fas fa-plus-circle"></i> Add an Asset</a></strong>
      </li>
      <li class="nav-item">
        <strong><a class="nav-link" href="http://localhost/Inventory/listasset.php"><i class="fas fa-list-alt"></i> List of Assets</a></strong>
      </li>
    </ul>
  </div>
</nav>
	<br><br>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<!--<script type="text/javascript">
$(document).on('click', 'ul li', function(){
	$(this).addClass('active').siblings().removeClass('active')
})


</script>-->

</body>
