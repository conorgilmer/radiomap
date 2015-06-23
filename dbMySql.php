<?php
require('config.php');

class DB_con
{
 function __construct()
 {
  $conn = mysql_connect(SERVER,USER,PWD) or die('localhost connection problem'.mysql_error());
  mysql_select_db(DB, $conn);
 }
 
 public function insert($lng,$lat,$name,$address,$type,$signal)
 {
  $res = mysql_query("INSERT markers(id, lat,lng,name,address,type,signal, tstamp) VALUES('','$lat','$lng','$name','$address', '$type', '$signal', now())");
  return $res;
 }
 
 public function select($table)
 {
  $res=mysql_query("SELECT * FROM markers");
  return $res;
 }
}

?>
