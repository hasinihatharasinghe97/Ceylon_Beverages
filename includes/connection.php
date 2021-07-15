<?php

$dbservername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ceylon-beverages";

$connection = mysqli_connect($dbservername, $dbUsername, $dbPassword,$dbName);

// if (!$connection) {
// 	echo "No Connection";
// }
// else{
//    echo "Connected"; 
// }
/*
if ($connection->connect_error) {
	die("Connection Failed". $conn->connect_error);
}		
*/

?>