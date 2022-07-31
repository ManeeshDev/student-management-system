<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stusent Management</title>

	<style type="text/css">
		body{
			background-image: url("images/School.png");
			height: 500px; /* You must set a specified height */
			background-position: center; /* Center the image */
			background-repeat: no-repeat; /* Do not repeat the image */
			background-size: cover; /* Resize the background image to cover the entire container */
		}
	</style>

	<link rel="stylesheet" href="css/main.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<header>
		<nav class="navbar navbar-light bg-dark">
		  <a class="navbar-brand text-success" href="index.php">STUDENT MANAGEMENT</a>
		  <form class="form-inline" method="post" action="search.php">
		    <input class="form-control mr-sm-2" type="search" id="searchID" name="searchID" placeholder="Search" aria-label="Search">
		    <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit">Search</button>
		  	<a class="abtn" href="login.php">&nbsp;Login&nbsp;</a>
		  </form>
		</nav>
	</header>
