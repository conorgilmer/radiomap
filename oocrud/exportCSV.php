<?php
//handle the database connectivity 
$dsn = 'mysql:host=localhost;dbname=opendata';
$username = 'root';
$password = '';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    exit;
}

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=markers-data.csv");
header("Pragma: no-cache");
header("Expires: 0");

$query = "SELECT * FROM markers";
try {
       $statement = $db->prepare($query);
       $statement->execute();
       $results = $statement->fetchAll();
       $statement->closeCursor();

       $content = '';
       $title = '';
       foreach ($results as $rs){
           $content .= stripslashes($rs["name"]). ',';
           $content .= stripslashes($rs["address"]). ',';
           $content .= stripslashes($rs["lat"]). ',';
           $content .= stripslashes($rs["lng"]). ',';
           $content .= stripslashes($rs["sig"]). ',';
           $content .= ($rs["typ"] == "tx") ? "Transmitter," : "RX,"; // ternary operator
           $content .= "\n";
        }

        $title .= "Name,Address,Latitude,Longitude,Signal,Type"."\n";
        echo $title;
        echo $content;

   } catch (PDOException $e) {
       $error_message = $e->getMessage();
    	echo $error_message;
       exit;
 }

?>
