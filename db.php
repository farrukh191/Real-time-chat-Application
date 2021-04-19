<?php  


$con=mysqli_connect("localhost","root","","chat");

if (!$con) {
	die("connection failed".mysql_error($con));
}

?>