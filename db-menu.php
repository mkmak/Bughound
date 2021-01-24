<!DOCTYPE html>

<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
		die();
	}
	else {
	   $name = $_SESSION['name'];
	}
	
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Database Maintenance - Menu</title>
		<link rel="stylesheet" type="text/css" href="menu-style.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
		<div id="header"><img src="img/dog.png" id="dog-pic"></div>
		<h1> Welcome back, <?php echo $name ?>!</h1>
		<br>
		<h2>Database Maintenance</h2>
		<div class="btn">Edit / Add Areas</div>
		<div class="btn"> Add Programs</div>
		<div class="btn">Edit Programs</div>
		<div class="btn">Delete Programs</div>
		<div class="btn">Add Employees</div>
		<div class="btn">Edit Employees</div>
		<div class="btn">Delete Employees</div>
		<div class="btn">Export Areas</div>
		<br>
		<a href="logout.php"><div class="btn">Logout</div></a>
		
    </body>
</html>