<?php require_once ('include/connection.php') ?>

<?php require_once ('include/header.php') ?>

<?php 
	$sql ="SELECT * FROM details ORDER BY IndexNo";
	$result =mysqli_query($con,$sql);
?>

<br>
	<div class="container">
		<?php
			if (isset($_GET['msg'])) {
				if ($_GET['msg'] == "failed") {
					echo '<center><div class="bg-danger text-light">
					Search Failed..! (Use Index No in Search box)</div></center>';
				}
			}elseif (isset($_GET['login'])) {
				if ($_GET['login'] == "accessDenied") {
					echo "<center><div class=\"bg-danger text-light\">You can't Access.. Please Login First..!</div></center>";
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
			    		    </tr> ";
				  	};
				echo "</tbody>
					</table> " ;
			}
		    ?>
	</div>

<?php require_once ('include/footer.php') ?>

