<?php
$host ="localhost";
$user ="root";
$pass = "";
$db="eshop";

// $dbcon = mysqli_connect('localhost','root','eshop');

$con=mysqli_connect($host,$user,$pass,$db);

if ($con) {
	echo "";
}
else{
	echo "db not connected";
}

?>