<?php
require('config.php');

class DB_con
{
 function __construct()
 {
  $conn = mysql_connect(SERVER,USER,PWD) or die('localhost connection problem'.mysql_error());
  mysql_select_db(DB, $conn);
 }
 
 public function insert($lng,$lat,$name,$address,$type,$freq,$band,$signal,$email)
 {
  $res = mysql_query("INSERT markers(id, lat,lng,name,address,type, freq, band,signal, email, tstamp) VALUES('','$lat','$lng','$name','$address', '$type', '$freq', '$band' ,'$signal', '$email', now())");
  return $res;
 }
 
 public function select($table)
 {
  $res=mysql_query("SELECT * FROM markers");
  return $res;
 }
}

?>
