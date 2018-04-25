<?php
// $dbhost = 'elephant.ecs.westminster.ac.uk';
// $dbuser = 'w1626698';
// $dbpass = 'XkX5wCVuemXv';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;
if (!$conn)
 {
 die('Could not connect: ' . mysql_error());
 }
mysql_select_db("w1626698_0", $conn);
?>
