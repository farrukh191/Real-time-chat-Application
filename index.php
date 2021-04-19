<?php session_start(); ?>
<?php include("db.php"); ?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<?php  

if (isset($_GET['userId'])) {
	$_SESSION['userId'] = $_GET['userId'];

	header("location:chatbox.php");
}

?>


<body>


	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>please select your account</h4>
			</div>

			<div class="modal-body">
				<ol>
			<?php  

				$users=mysqli_query($con,"select * from users")
				or die("Failed to query database".mysql_error());

				while ($user=mysqli_fetch_assoc($users)) {
					echo '

							<li>
								<a href="index.php?userId='.$user["id"].'">'.$user["user"].'</a>
							</li>

				';
				}


			// 	$select="select * from users";
			// 	$query=mysqli_query($con,$select);

			// 	while ($fetch=mysqli_fetch_assoc($query)) {
			// 	echo '

			// <li>
			// 	<a href="chatbox.php?user_id='.$fetch["id"].'">'.$fetch["user"].'</a>
			// </li>

			// 	';
			// 	}

			?>
				</ol>

		<a href="register.php" style="float: right; bottom: 0;">Register here</a>
			</div>
		</div>
	</div>
 








</body>
</html>