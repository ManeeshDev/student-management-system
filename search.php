<?php require_once ('include/connection.php') ?>

<?php require_once ('include/header.php') ?>

<?php 

	$indexno=$_POST['searchID'];
	$sql = "SELECT * FROM details WHERE IndexNo='".$indexno."'";

	$result = mysqli_query($con,$sql);

	$row = mysqli_fetch_array($result);

?>

<?php 
	if($row>0){
 ?>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-4">
				<center><h4 class="bg-warning">Search Student</h4></center>
				<form name="addform" class="frm border border-info pt-2 px-5 pb-2 m-auto" method="post" action="" >
				  <div class="form-group">
				    <label for="indexNo">Index No</label>
				    <input type="text" class="form-control" name="indexNo" id="indexNo" value="<?php echo $row['IndexNo'];?>" readonly>
				  </div>
				  <div class="form-group">
				    <label for="stname">Student Name</label>
				    <input type="text" class="form-control" name="stname"  id="stname" value="<?php echo $row['StName'];?>" readonly>
				  </div>
				  <div class="form-group">
				    <label for="address">Address</label>
				    <input type="text" class="form-control" name="address" id="address" value="<?php echo $row['Address'];?>" readonly>
				  </div>
				  <div class="form-group">
				    <label for="">Gender</label>
				    <div class="form-check">
				      <input class="form-check-input" type="radio" name="gender" id="radios1" 
				      	<?php if($row['Gender']=="Male") {echo "checked"; }?> value="Male" disabled>

				      <label class="form-check-label" for="radios1" style="margin-right:30px;">Male</label>

				      <input class="form-check-input" type="radio" name="gender" id="radios2" 
				     	 <?php if($row['Gender']=="Female") {echo "checked"; }?> value="Female" disabled>

				      <label class="form-check-label" for="radios2">Female</label>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="dob">Date of Birth</label>
				    <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $row['DOB'];?>" readonly>
				  </div>
				  <a class='abtn3' href='index.php' style="margin-left:80px;">&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;</a>
				</form>
			</div>
		</div>
	</div>
	<br><br>
<?php 
	}else{
		header('location:index.php?msg=failed');
	}
 ?>

<?php require_once ('include/footer.php') ?>

