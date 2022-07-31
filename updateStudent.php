<?php require_once ('include/connection.php') ?>

<?php require_once ('include/adminHeader.php') ?>

<?php 
	session_start();

	if (!isset($_SESSION['username'])) {
	        header('Location:index.php?login=accessDenied');
	}

	if (isset($_POST['submit'])) {

		$sql = "UPDATE details SET StName='$_POST[stname]' ,Address='$_POST[address]' ,Gender='$_POST[gender]' ,DOB='$_POST[dob]' WHERE IndexNo='$_POST[indexNo]' ";

		$result = mysqli_query($con,$sql);

		if (!$result) {
			$err = mysqli_error($con);
			$ino = $_GET['Ino'];
			header('location:updateStudent.php?msg=failed&Ino='.$ino.'&err='.$err);
		}else {
			$ino = $_GET['Ino'];
			header('location:update.php?msg=success&Ino='.$ino);
		}
	}elseif (isset($_POST['cancel'])) {
		header('location:update.php');
	}

	$indexNo =$_GET['Ino'];
	$sql = "SELECT * FROM details WHERE IndexNo='$indexNo'";

	$result =mysqli_query($con,$sql);
	$row =mysqli_fetch_array($result);
?>

	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-4">
				<center><h4 class="bg-warning">Update Student</h4></center>
				<form name="addform" class="frm border border-info pt-2 px-5 pb-2 m-auto shadow-lg" method="post" action="" onsubmit="return validate()">
				<?php 
					if (isset($_GET['msg'])) {
						if ($_GET['msg'] == "failed") {
							$errMsg = $_GET['err'];
							echo '<center><div class="bg-danger text-light rounded">The Student Updating Failed..<br>
							<small class="text-warning">'.$errMsg.'</small></div></center>';
						}
					} 
				?>
				  <div class="form-group">
				    <label for="indexNo">Index No</label>
				    <input type="text" class="form-control" name="indexNo" id="indexNo" value="<?php echo $row['IndexNo'];?>" readonly placeholder="Your Index Number">
				  </div>
				  <div class="form-group">
				    <label for="stname">Student Name</label>
				    <input type="text" class="form-control" name="stname"  id="stname" value="<?php echo $row['StName'];?>" placeholder="Student Name">
				  </div>
				  <div class="form-group">
				    <label for="address">Address</label>
				    <input type="text" class="form-control" name="address" id="address" value="<?php echo $row['Address'];?>" placeholder="Your Address">
				  </div>
				  <div class="form-group">
				    <label for="">Gender</label>
				    <div class="form-check">
				      <input class="form-check-input" type="radio" name="gender" id="radios1" 
				      	<?php if($row['Gender']=="Male") {echo "checked"; }?> value="Male">

				      <label class="form-check-label" for="radios1" style="margin-right:30px;">Male</label>

				      <input class="form-check-input" type="radio" name="gender" id="radios2" 
				     	 <?php if($row['Gender']=="Female") {echo "checked"; }?> value="Female">

				      <label class="form-check-label" for="radios2">Female</label>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="dob">Date of Birth</label>
				    <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $row['DOB'];?>">
				  </div>
				  <input type="submit" name="submit" value="Update" class="btn btn-primary mr-sm-2">
				  <input type="submit" name="cancel" value="Cancel" class="btn btn-secondary">
				</form>
			</div>
		</div>
	</div>
	<br><br><br>

<?php require_once ('include/footer.php') ?>

