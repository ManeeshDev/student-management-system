<?php require_once ('include/connection.php') ?>

<?php require_once ('include/header.php') ?>

<?php
session_start();

if (isset($_SESSION['username'])) {
        header('Location:admin.php?Un='.$_GET['Un']);
}

if($_SERVER["REQUEST_METHOD"] == "POST")
 {

		$Uname = mysqli_real_escape_string($con,$_POST['username']);
		$Psw = sha1(mysqli_real_escape_string($con,$_POST['password']));

		$login = mysqli_query($con,"SELECT * FROM login WHERE 
			(UserName = '" . $Uname . "') and (Password = '" . $Psw . "')");

		if (mysqli_num_rows($login) == 1)
		{
			$_SESSION['username'] = $_POST['username'];

			header('Location:admin.php?Un='.$Uname);
		}
		else {
			header('Location:login.php?msg=error');
		 }
}
?>
	<div class="container h-100 w-75">
	    <div class="row h-100 justify-content-center align-items-center">
	        <div class="col-10 col-md-8 col-lg-6">
	            <!-- Form -->
	            <form class="form-example frm border border-warning p-5 shadow-lg rounded " action="" method="post">
	                <center><h2>LOGIN</h2></center>
	                <?php
		                if (isset($_GET['msg'])) {
		                	if ($_GET['msg'] == "error") {
								echo '<center><div class="bg-danger text-light rounded">Username or Password Invalied..!</div></center>';
							}
						}
					?>
	                <div class="form-group">
	                    <label for="username">Username:</label>
	                    <input type="text" class="form-control username" id="username" placeholder="Username..." name="username">
	                </div>
	                <div class="form-group">
	                    <label for="password">Password:</label>
	                    <input type="password" class="form-control password" id="password" placeholder="Password..." name="password">
	                </div>
	                <input type="submit" name="submit" value="Login" class="text-light btn btn-warning mr-2 w-75">
	                <input type="reset" name="reset" value="Cancel" class="btn btn-secondary ml-2">
	            </form>
	            <!-- Form end -->
	        </div>
	    </div>
	</div>

<?php require_once ('include/footer.php') ?>

<!-- Passwords --
	m123
	o123
	f123
-->
