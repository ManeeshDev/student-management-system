<?php require_once ('include/connection.php') ?>

<?php require_once ('include/adminHeader.php') ?>

<?php require_once ('include/optionBar.php') ?>

<?php 
	session_start();

	if (!isset($_SESSION['username'])) {
	        header('Location:index.php?login=accessDenied');
	}
 
	$sql ="SELECT * FROM details ORDER BY IndexNo";
	$result =mysqli_query($con,$sql);

	if (isset($_GET['Un'])) {
		$Uname = $_GET['Un'] ;
	}else{
		$Uname = "" ;
	}
?>

<br>
	<div class="container">
		<?php 
			if (isset($_GET['msg']) and isset($_GET['Ino']) ) {
				if ($_GET['msg'] == "success") {
					$ino = $_GET['Ino'];
					echo '<center><div class="bg-success text-light">The Student ( '.$ino.' ) Successfully Deleted..</div></center>';
				}
			}

			if (mysqli_num_rows($result) ==0) {
				echo "<div class='container text-danger'>
				<hr> <h2 align='center'>No Students..!</h2> 
				<hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr>
				</div> ";
			}
			else{
				echo "
					<table class='table table-light table-hover'>
					  <thead class='thead thead-dark'>
					    <tr class='text-warning'>
					      <th scope='col'>Index No</th>
					      <th scope='col'>Student Name</th>
					      <th scope='col'>Address</th>
					      <th scope='col'>Gender</th>
					      <th scope='col'>Birth Day</th>
					      <th scope='col'>Action</th>
					    </tr>
					  </thead>
					  <tbody>";

				  	while ($row=mysqli_fetch_array($result)) 
				  	{
					    echo "<tr class='table-active'>
			    		      <td>".$row['IndexNo']."</td>
			    		      <td>".$row['StName']."</td>
			    		      <td>".$row['Address']."</td>
			    		      <td>".$row['Gender']."</td>
			    		      <td>".$row['DOB']."</td>
			    		      <td><a class='abtn4' href='deleteStudent.php?Ino=".$row['IndexNo']."'>&nbsp;Delete&nbsp;</a></td>
			    		    </tr> ";
				  	};
				echo "</tbody>
					</table> " ;
			}
		    ?>
	</div>
	
	<br><br>

<?php require_once ('include/footer.php') ?>
