<?php session_start(); ?>
<?php include("db.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	
<style type="text/css">
	*{
		margin:0;
		padding: 0;
		box-sizing: border-box;
	}

	.container{
		border: 1px solid red;
		width: 400px;
		height: 150px;
		margin:6% auto;
	}

.in{
	width: 100%;
	height: 30px;
}

input[name="submit"]{
	color:blue;
	width: 70px;
	height: 30px;
	margin-top: 5px;
}

</style>

</head>


 <?php  
// echo $_SESSION['userid'];

// if (isset($_POST['submit'])) {
// 	$name=$_POST['Uname'];
// 	$ins="insert into users(user)values('$name')";
// 	$query=mysqli_query($con,$ins);
// 	if ($query) {
// 		header("location:index.php");
// 	}
// 	else{
// 		echo "data not found";
// 	}

// }

?> 


<body>


<?php  

if (isset($_POST['uName'])) {
	$sql="insert into users(user)values('".$_POST['uName']."')";
	if ($con -> query($sql)) {
		header("location:index.php");
	}
	else{
		echo "Error try again later :)";
	}
}

?>




	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Register your name</h4>
			</div>

			<div class="modal-body">
			
				<form  action="register.php"  method="POST">
					<p>Name</p>
					<input type="text" name="uName" id="uName" class="form-control" autocomplete="off">
					<input type="submit" name="submit" class="btn btn-primary" style="float: right" value="ok">
				</form>
		
			</div>
		</div>
	</div>
 




</body>
</html>