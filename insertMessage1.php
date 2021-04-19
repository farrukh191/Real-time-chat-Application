<?php  
session_start();

include("db.php");

$fromUser=$_POST['fromUser'];
$toUser=$_POST['toUser'];
$message=$_POST['message'];

$output="";

echo $sql="insert into message (Fromuser,Touser,message)values('$fromUser','$toUser','$message')";

if (mysqli_query($con,$sql)) {
	$output.="";
}
else{
	$output.="error! please try again";
}

echo $output;
?>

