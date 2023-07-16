<?php include_once "dash-include.php";

include_once 'conn.php';
$query = "select * from employee";
$result = $con->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>AssetMopau: Persons/Employees</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="dash.css">
	<link rel="stylesheet" href="person.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
<div class="emp">
<button type="submit" class="btn btn-success btn-md" data-toggle="modal" data-target="#emp" href="#">Add <i class="fas fa-plus"></i>
</button>
</div>
<div class="cont">
	<div class="title">
	<h3><i class="fas fa-user"></i><small> Persons/Employees</small></h3>
	</div><br>
	<div class="info">
	<p><strong>Manage the persons/employees you want in the database. After you add persons/employees, you can review reports and check assets in and out.</strong></p>
	</div>
	<br><br><br>
<div class="tbl">
<table id="example" class="display table-bordered" style="width:100%">
        <thead>

            <tr style="color:#000;">
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
                <th>Employee ID</th>
                <th>Title</th>
                <th>Phone No</th>
                <th>Email</th>
                <th>Department</th>
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
                <td><?php echo $rows['empid'];?></td>
                <td><?php echo $rows['title'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['department'];?></td>
				<td>
				<a class="pen" href="personedit.php?id=<?php echo $rows['id'];?>""><i class="fas fa-pen"></i></a>
				<a href="#" class="trash" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i></a>
				<!-- Delete Modal -->
				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="reglabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header" style="background-color:#d6edd7; color:#ee0000;">
						<h5 class="modal-title" id="reglabel"><small>Delete Person/Employee</small></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<div class="alert alert-danger" role="alert">
						Are you sure you want to delete this person?
						</div>
					  </div>
					  <div class="modal-footer">
						<button type="submit" class="btn btn-danger"><a href="persondelete.php?id=<?php echo $rows['id'];?>" style="text-decoration:none; color:#fff;">Delete</button>
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
<form method="POST" action="exportpersons.php">
<input type="submit" class="btn btn-danger" name="exportpersons" value="Export to CSV File"/>
</form>
</div>
<!-- Footer -->
<div class="empfoot">
<footer class="page-footer font-small blue pt-4">
<!-- Copyright -->
  <div class="footer-copyright text-center py-3">&copy; 2020 All Rights Reserved AssetMopau
  </div>
  <!-- Copyright -->
</footer>
</div>
</div>
<!-- Add Modal -->
				<div class="modal fade" id="emp" tabindex="-1" role="dialog" aria-labelledby="reglabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header" style="background-color:#d6edd7; color:#ee0000;">
						<h5 class="modal-title" id="reglabel"><small>Add a Person/Employee</small></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <p class="alert alert-success" id="show_message" style="display: none; color:green;">AssetMopau: Employee Added Successfully</p>
					  <p class="alert alert-danger" id="error" style="display: none; color:red;"></p>
					  <div class="modal-body">
						<form action="javascript:void(0)" id="ajax-form" style="width:400px; margin-left:5vh;">
						  <div class="form-group">
							<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name*">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name*">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="empid" id="empid" placeholder="Employee ID*">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="title" id="title" placeholder="Title*">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone*">
						  </div>
						  <div class="form-group validate">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email*">
						  </div>
							<span id="available"></span>
						  <div class="form-group">
							<input type="text" class="form-control" name="department" id="department" placeholder="Department*">
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

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

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
		//employee id required
        var empid = $("input#empid").val();
        if(empid == ""){
            $("#error").fadeIn().text("Employee ID required.");
            $("input#empid").focus();
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
		 // Department required
       var department= $("input#department").val();
        if(department == ""){
            $("#error").fadeIn().text("Department required");
            $("input#department").focus();
            return false;
        }



        // ajax
        $.ajax({
            type:"POST",
            url: "personinsert.php",
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
<script>
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

<script type="text/javascript">
$(document).ready(function(){
	$('#email').blur(function(){
		var email = $(this).val();
		$.ajax({
			url:"checkperson.php",
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
