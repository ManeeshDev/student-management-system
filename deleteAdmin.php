<?php require_once ('include/connection.php') ?>

<?php 
	session_start();

	if (!isset($_SESSION['username'])) {
	        header('Location:index.php?login=accessDenied');
	}

	$user = $_SESSION['username'];

	$ses_sql = "SELECT * FROM login WHERE UserName = '$user' ";
	$ses_result =mysqli_query($con,$ses_sql);

	$row =mysqli_fetch_array($ses_result);

	if ($row['AdminType'] == 'Admin') {
		
		$id=$_GET['Id'];
		$sql = "DELETE FROM login WHERE ID='$id' ";

		//check is you, you can't delete you
		if ($row['ID'] == $id) {

			header('location:adminPanel.php?Dmsg=youIn');

		}else{
			$result = mysqli_query($con,$sql);

			if (!$result) {
				$err = mysqli_error($con);
				$id=$_GET['Id'];
				header('location:adminPanel.php?Dmsg=failed&Id='.$id.'&err='.$err);
			}else {
				$id=$_GET['Id'];
				header('location:adminPanel.php?Dmsg=success&Id='.$id);
			}
		}

			
	}else{
		header('location:adminPanel.php?Dmsg=accessDenied');
	}
?>

