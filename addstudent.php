<?php require_once ('include/connection.php') ?>

<?php require_once ('include/adminHeader.php') ?>

<?php 
	session_start();

	if (!isset($_SESSION['username'])) {
	        header('Location:index.php?login=accessDenied');
	}

	if (isset($_POST['submit'])) {

		$sql = "INSERT INTO details (IndexNo,StName,Address,Gender,DOB) VALUES ('$_POST[indexNo]','$_POST[stname]','$_POST[address]','$_POST[gender]','$_POST[dob]')";

		if (!mysqli_query($con,$sql)) {
			$err = mysqli_error($con);
			header('location:addstudent.php?msg=failed&err='.$err);
		}else {
			header('location:addstudent.php?msg=success');
		}
	}
?>

	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-4">
				<center><h4 class="bg-warning">Add Student</h4></center>
				<form name="addform" class="frm border border-info pt-2 px-5 pb-2 m-auto shadow-lg" method="post" action="" onsubmit="return validate()">
				<?php 
					if (isset($_GET['msg'])) {
						if ($_GET['msg'] == "success") {
							echo '<center><div class="bg-success text-light rounded">The Student Successfully Added..</div></center>';
						}elseif ($_GET['msg'] == "failed") {
							$errMsg = $_GET['err'];
							echo '<center><div class="bg-danger text-light rounded">
							The Student Adding Failed..<br>
							<small class="text-warning">'.$errMsg.'</small></div></center>';
						}
					} 
				?>
				  <div class="form-group">
				    <label for="indexNo">Index No</label>
				    <input type="text" class="form-control" name="indexNo" id="indexNo" placeholder="Your Index Number">
				  </div>
				  <div class="form-group">
				    <label for="stname">Student Name</label>
				    <input type="text" class="form-control" name="stname"  id="stname" placeholder="Student Name">
				  </div>
				  <div class="form-group">
				    <label for="address">Address</label>
				    <input type="text" class="form-control" name="address" id="address" placeholder="Your Address">
				  </div>
				  <div class="form-group">
				    <label for="">Gender</label>
				    <div class="form-check">
				      <input class="form-check-input" type="radio" name="gender" id="radios1" value="Male">
				      <label class="form-check-label" for="radios1" style="margin-right:30px;">Male</label>

				      <input class="form-check-input" type="radio" name="gender" id="radios2" value="Female">
				      <label class="form-check-label" for="radios2">Female</label>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="dob">Date of Birth</label>
				    <input type="date" class="form-control" name="dob" id="dob">
				  </div>
				  <input type="submit" name="submit" value="Submit" class="btn btn-primary mr-sm-2">
				  <input type="reset" name="reset" value="Reset" class="btn btn-danger mr-sm-2">
				  <a class='btn btn-secondary' href='admin.php'>&nbsp;Cancel&nbsp;</a>
				</form>
			</div>
		</div>
	</div>
	<br><br><br>

<?php require_once ('include/footer.php') ?>

