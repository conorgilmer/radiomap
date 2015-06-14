<?php
require("config.php");

function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&apos;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

// Opens a connection to a mySQL server
$connection=mysql_connect (localhost, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active mySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RTE Radio 252 Long Wave Reception</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<?php include('header.php');  ?>

<div id="body">
        <div id="content">
    <table align="center">
    <tr>
    <th colspan="2"><a href="add_data.php">Add Report</a></th>
    <th colspan="2"><a href="list.php">List Reports</a></th>
    <th colspan="2"><a href="index.php">Map Reports</a></th>
    </tr>
    <tr>
    <th>Long</th>
    <th>Lat</th>
    <th>Name</th>
    <th>Address</th>
    <th>Type</th>
    <th>Signal</th>
    </tr>

    <?php

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
 // echo 'name="' . parseToXML($row['name']) . '" ';
 // echo 'name="' . parseToXML('&','&amp;', $row['name']) . '" ';
 // echo 'address="' . parseToXML($row['address']) . '" ';
           echo "<tr>
            <td>". $row['lng'] ." </td>
            <td>". $row['lat'] ." </td>
            <td>". $row['name'] ." </td>
            <td>". $row['address'] ." </td>
            <td>". $row['type'] ." </td>
            <td>". $row['signal'] ." </td>
            </tr>";
}
?>
    </table>
    </div>
</div>
<?php include('footer.php');  ?>
