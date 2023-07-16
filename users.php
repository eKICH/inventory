<?php include_once "dash-include.php";

include_once 'conn.php';
$query = "select * from regaccess";
$result = $con->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Users - AssetMopau</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="person.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="dash.css">

</head>
<body>
<div class="use">
<button type="submit" class="btn btn-success btn-md" data-toggle="modal" data-target="#user" href="#">Add New User <i class="fas fa-plus"></i>

</button>
<!-- Add user Modal -->
				<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="reglabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header" style="background-color:#d6edd7; color:#ee0000;">
						<h5 class="modal-title" id="reglabel"><small>Add User</small></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>

					  <p class="alert alert-success" id="show_message" style="display: none; color:green;">AssetMopau: User Added Successfully</p>
					  <p class="alert alert-danger" id="error" style="display: none; color:red;"></p>

					  <div class="modal-body">

						<form class="" action="javascript:void(0)" id="ajax-form" style="width:400px; margin-left:2vw;">
						  <div class="form-group">
							<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name*">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name*">
						  </div>

						  <div class="form-group">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email*">
						  </div>
							<span id="available"></span>
						  <div class="form-group">
							<input type="password" class="form-control" name="password" id="password" placeholder="Password*">
						  </div>
						  <div class="form-group">
							<input type="password" class="form-control" name="repassword" id="repassword" placeholder="Confirm Password*" >
						  </div>

						<div class="modal-footer">
						<button type="submit" class="btn btn-info" id="btnsubmit">Add</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					  </div>
					</form>
				</div>

					</div>
				  </div>
				</div>
				<!--End of add user -->
</div>
<div class="usecont">
	<div class="usetitle">
	<h3><i class="fas fa-users"></i><small> Users</small></h3>
	</div><br>

	<!--<div class="p">
	<h3><i class="fas fa-users i"></i><small> List of Users</small></h3>
	</div>-->

	<div class="useinfo">
	<p><strong>Manage the users you want in the AsserMopau System. After you add users, they can access system, review reports and check assets in and out.</strong></p>
	</div>
	<br><br><br>

	<div class="usetbl">
	<table id="example" class="display table-bordered" style="width:100%">
        <thead>
            <tr style="color:#000;">
                <th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
                <th>Job Title</th>
				<th>Phone</th>
				<th>Action</th>
            </tr>

        </thead>
        <tbody>
		<?php
		while($rows = mysqli_fetch_assoc($result))
		{
		?>
            <tr style="color:#000;">
                <td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['fname'];?></td>
				<td><?php echo $rows['lname'];?></td>
				<td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['title'];?></td>
				<td><?php echo $rows['phone'];?></td>
				<td>
				<a class="pen" href="useredit.php?id=<?php echo $rows['id'];?>""><i class="fas fa-pen"></i></a>
				<a href="#" class="usetrash" data-toggle="modal" data-target="#edelete" href="#"><i class="fas fa-trash-alt"></i></a>
				<!-- Delete Modal -->
				<div class="modal fade" id="edelete" tabindex="-1" role="dialog" aria-labelledby="reglabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header" style="background-color:#d6edd7; color:#ee0000;">
						<h5 class="modal-title" id="reglabel"><small>Delete User</small></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<p></p>
						<div class="alert alert-danger" role="alert">
						Are you sure you want to delete this user?
						</div>
					  </div>
					  <div class="modal-footer">
						<button type="submit" class="btn btn-danger"><a href="userdelete.php?id=<?php echo $rows['id'];?>" style="text-decoration:none; color:#fff;">Delete</button>
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
<form method="POST" action="exportusers.php">
<input type="submit" class="btn btn-danger" name="exportusers" value="Export to CSV File"/>
</form>
</div>

<!-- Footer -->
<div class="usefoot">
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


<script type="text/javascript">
$(document).ready(function(){
	$('#email').blur(function(){
		var email = $(this).val();
		$.ajax({
			url:"checkuser.php",
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
		//title required
        var title = $("input#title").val();
        if(title == ""){
            $("#error").fadeIn().text("Title required.");
            $("input#title").focus();
            return false;
        }

		//Phone required
        var phone = $("input#phone").val();
        if(phone == ""){
            $("#error").fadeIn().text("Phone required.");
            $("input#phone").focus();
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
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         true
    } );
} );
</script>
</body>
</html>
