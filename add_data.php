<?php
include_once 'dbMySql.php';
$con = new DB_con();

// data insert code starts here.
if(isset($_POST['btn-save']))
{
	$lng = $_POST['lng'];
	$lat = $_POST['lat'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	//$type = $_POST['type'];
	$type = "RX"; 
	$signal = $_POST['signal'];
	
	$res=$con->insert($lng, $lat, $name, $address, $type, $signal);
	if($res)
	{
		?>
		<script>
		alert('Record inserted...');
        window.location='index.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error inserting record...');
        window.location='index.php'
        </script>
		<?php
	}
}
// data insert code ends here.

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RTE 252 LW Reception Monitor</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<?php include('header.php');?>

<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
  <tr>
    <th><a href="add_data.php">Add Reading</a></th>
    <th><a href="list.php">List</a></th>
    <th><a href="index.php">Map</a></th>
    <th><a href="about.php">About</a></th>
    </tr>


    <tr>
    <td colspan="4"><input type="text" name="lng" placeholder="Longtitude" required /></td>
    </tr>
    <tr>
    <td colspan="4"><input type="text" name="lat" placeholder="Latitude" required /></td>
    </tr>
    <tr>
    <td colspan="4"><input type="text" name="name" placeholder="Name" required /></td>
    </tr>
    <tr>
    <td colspan="4"><input type="text" name="address" placeholder="Address" required /></td>
    </tr>
    <!--tr>
    <td colspan="4"><input type="text" name="type" placeholder="Type" required /></td>
    </tr>
    <tr-->
    <td colspan="4"><input type="text" name="signal" placeholder="Signal" required /></td>
    </tr>
    <tr>
    <td colspan="4">

    <button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

<?php include('footer.php');?>
