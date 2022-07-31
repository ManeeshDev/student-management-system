<?php require_once ('include/connection.php') ?>

<?php require_once ('include/adminHeader.php') ?>

<?php
	session_start();

	if (!isset($_SESSION['username'])) {
	        header('Location:index.php?login=accessDenied');
	}

	if (isset($_POST['submit'])) {
		$psw =sha1($_POST['password']);

		$sql = "INSERT INTO login (UserName,Password,AdminType) VALUES ('$_POST[uname]','$psw','$_POST[adminTyp]')";

		$result =mysqli_query($con,$sql);

		if (!$result) {
			$err = mysqli_error($con);
			header('location:adminPanel.php?msg=failed&err='.$err);
		}else {
			header('location:adminPanel.php?msg=success');
		}
	}
?>

<br>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-4">
				<center><h4 class="bg-warning">Add Admin</h4></center>
				<form name="addform2" class="frm border border-info pt-2 px-5 pb-2 m-auto shadow-lg" method="post" action="" onsubmit="return validate2()">
				<?php
					if (isset($_GET['msg'])) {
						if ($_GET['msg'] == "success") {
							echo '<center><div class="bg-success text-light rounded">The Admin Successfully Added..</div></center>';
						}elseif ($_GET['msg'] == "failed") {
							$errMsg = $_GET['err'];
							echo '<center><div class="bg-danger text-light rounded">The Admin Adding Failed..<br>
							<small class="text-warning">'.$errMsg.'</small></div></center>';
						}
					}
				?>
				  <div class="form-group" >
				    <label for="indexNo">User Name</label>
				    <input type="text" class="form-control" name="uname" id="uname" placeholder="Your User Name">
				  </div>
				  <div class="form-group">
				    <label for="stname">Password</label>
				    <input type="password" class="form-control" name="password"  id="password" placeholder="Password">
				  </div>
				  <div class="form-group">
				    <label for="">Admin Type</label>
				    <div class="form-check">
				      <input class="form-check-input" type="radio" name="adminTyp" id="radios1" value="Admin">
				      <label class="form-check-label" for="radios1" style="margin-right:30px;">Admin</label>

				      <input class="form-check-input" type="radio" name="adminTyp" id="radios2" value="Co-Admin">
				      <label class="form-check-label" for="radios2">Co-Admin</label>
				    </div>
				  </div>
				  <input type="submit" name="submit" value="Submit" class="btn btn-primary mr-sm-2">
				  <input type="reset" name="reset" value="Reset" class="btn btn-danger mr-sm-2">
				  <a class='btn btn-secondary' href='admin.php'>&nbsp;Cancel&nbsp;</a>
				</form>
				<br>
				  <a class='abtnR' href='adminPanel.php'>&nbsp;&nbsp;&nbsp;Refresh&nbsp;&nbsp;&nbsp;</a>
			</div>
			<div class="col-8 pt-0 mt-0">
			<?php
				if (isset($_GET['Dmsg'])) {
					if ($_GET['Dmsg'] == "success") {
						echo '<center><div class="bg-success text-light">The Admin Successfully Deleted..</div></center>';
					}
					elseif ($_GET['Dmsg'] == "failed") {
						$errMsg = $_GET['err'];
						echo '<center><div class="bg-danger text-light">The Admin Deleting Failed..<br>
							<small class="text-warning">'.$errMsg.'</small></div></center>';
					}
					elseif ($_GET['Dmsg'] == "accessDenied") {
						echo '<center><div class="bg-danger text-light">You have No Administrative Privileges to Delete..!</div></center>';
					}
					elseif ($_GET['Dmsg'] == "youIn") {
						echo "<center><div class=\"bg-danger text-light\">You Logged In Now..! You can't Delete your Account.</div></center>";
					}
				}

				$sql2 ="SELECT * FROM login ORDER BY AdminType ASC, AssignedDate DESC";
				$result2 =mysqli_query($con,$sql2);

				echo "
					<table class='table table-light table-hover' >
					  <thead class='thead thead-dark'>
					    <tr class='text-warning'>
					      <th scope='col'>ID</th>
					      <th scope='col'>User Name</th>
					      <th scope='col'>Admin Type</th>
					      <th scope='col'>Assigned Date | Time</th>
					      <th scope='col'>Action</th>
					    </tr>
					  </thead>
					  <tbody>";

				  	while ($row2=mysqli_fetch_array($result2))
				  	{
					    echo "<tr class='table-active'>
			    		      <td>".$row2['ID']."</td>
			    		      <td>".$row2['UserName']."</td>
			    		      <td>".$row2['AdminType']."</td>
			    		      <td>".$row2['AssignedDate']."</td>
			    		      <td><a class='abtn4' href='deleteAdmin.php?Id=".$row2['ID']."' 
			    		      onclick=\"return confirm('Are you sure.? Do you want Delete this admin..!')\" >
			    		      &nbsp;Delete&nbsp;</a></td>
			    		    </tr> ";
				  	};
				echo "</tbody>
					</table> " ;
			?>
			</div>
		</div>
	</div>

<?php require_once ('include/footer.php') ?>

