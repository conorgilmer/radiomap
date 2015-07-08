<!DOCTYPE html> 
<html lang="en"> 
	<head> 
	<meta charset="utf-8"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/bootstrap.min.js"></script> 
	</head> 
<body> 
<div class="container"> 
	<div class="row"> 
	<h3>List of Radio Reports RTE LW 252</h3> 
	</div> 
	<div class="row">
		<p>
        	<a href="create.php" class="btn btn-success">Create</a>
                </p>
		<table class="table table-striped table-bordered"> 
		<thead> 
		<tr> 
			<th>Latitude</th> 
			<th>Longitude</th> 
			<th>Name</th> 
			<th>Address</th> 
			<th>Type</th> 
			<th>Signal</th> 
			<th>Action</th> 
		</tr> 
		</thead> 
		<tbody> 
<?php 
	include 'database.php'; 
	$pdo = Database::connect(); 
	$sql = 'SELECT * FROM markers ORDER BY id DESC'; 
	foreach ($pdo->query($sql) as $row) { 
		echo '<tr>'; 
		echo '<td>'. $row['lat'] . '</td>'; 
		echo '<td>'. $row['lng'] . '</td>'; 
		echo '<td>'. $row['name'] . '</td>';
		echo '<td>'. $row['address'] . '</td>';
		echo '<td>'. $row['typ'] . '</td>';
		echo '<td>'. $row['sig'] . '</td>';
echo '<td width=250>';
	   	echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
	   	echo ' '; //spacer may use colspan
	   	echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
	   	echo ' '; //spacer
	   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
	   	echo '</td>';
		echo '</tr>'; }
	 Database::disconnect(); 
	?> 
		</tbody> 
		</table> 
	</div> 
</div> <!-- /container --> 
</body> 
</html>
