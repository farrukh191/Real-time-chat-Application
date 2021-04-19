<?php  
session_start();
include('db.php');


echo $cemail=$_SESSION['cemail'];
    echo $cpass=$_SESSION['cpassword']; echo "<br>";
    echo $cid=$_SESSION['CcustomerId']; echo "<br>";
   


	echo $jobid1=$_SESSION['customerjobid']; echo "<br>";




		echo $users=mysqli_query($con,"select * from customer_signup where customer_id='".$cid."'")
		or die("Failed to query database".mysqli_error());
		$user=mysqli_fetch_assoc($users);


?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">

			<p>Hi <?php echo $user['first_name'];  ?></p>
			<input type="text" name="fromUser" id="fromUser" value="<?php echo $user['customer_id'] ?>" />
			<p>send message to :</p>


			<ul>
				<?php  
				$msgs=mysqli_query($con,"select * from jobapplied inner join provider_signup on jobapplied.provider_id=provider_signup.provider_id where jobapplied.customer_id='$cid' and jobapplied.job_id='$jobid1' ")
					or die("Failed to query database".mysql_error());
					while ($msg=mysqli_fetch_assoc($msgs)) {
						echo '
							<li><a href="?toUser='.$msg['provider_id'].'">'.$msg['p_first'].' '.$msg['p_last'].'</a></li>
						';
					}
					
				?>
			</ul>
?php echo ?
			<a href="../clientApplied.php?jobid=<?php echo $jobid1; ?>"><--- Back</a>
			
		</div>
		<div class="col-md-4">



				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>
								
									<?php  

											if (isset($_GET['toUser'])) {
												$userName=mysqli_query($con,"select * from provider_signup inner join jobapplied on jobapplied.provider_id=provider_signup.provider_id where jobapplied.customer_id='$cid' and jobapplied.job_id='$jobid1' and provider_signup.provider_id='".$_GET['toUser']."'")
												or die("Failed to the database".mysql_error());
												$uName=mysqli_fetch_assoc($userName);
												echo '<input type="text" value='.$_GET['toUser'].' id="toUser" name="toUser"  hidden  />';
												echo $uName['p_first'].' '.$uName['p_last'];
											
											}
											else{
												$userName=mysqli_query($con,"select * from provider_signup inner join jobapplied on jobapplied.provider_id=provider_signup.provider_id where jobapplied.customer_id='$cid' and jobapplied.job_id='$jobid1'")
												or die("Failed to the database".mysql_error());
												$uName=mysqli_fetch_assoc($userName);
												$_SESSION['toUser'] = $uName['provider_id'];
												echo '<input type="text" value='.$_SESSION['toUser'].' id="toUser" name="toUser"  hidden  />';
												echo $uName['p_first'].' '.$uName['p_last'];
											}
									?>

							</h4>
						</div>

				<div class="modal-body" id="msgBody" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">

					<?php  

						if (isset($_GET['toUser'])) {
							 $sel="select * from message where (Fromuser ='".$cid."' AND Touser='".$_GET['toUser']."') OR (Fromuser ='".$_GET['toUser']."' AND Touser='".$cid."')";
							$chats=mysqli_query($con,$sel)
						
							or die("Failed to the database".mysql_error());

							while ($chat=mysqli_fetch_assoc($chats)) {
								

								if ($chat['Fromuser'] == $cid) {
									echo '
									<div style="text-align:right;">

									<p style="background:lightblue; word-wrap:break-word; display:inline-block; padding:5px; width:70%;
									border-radius:10px; ">

									'.$chat['message'].'
									</p>
									</div>

											';
										}


									else{
											echo '
									<div style="text-align:left;">

									<p style="background:yellow; word-wrap:break-word; display:inline-block; padding:5px; width:70%;
									border-radius:10px;">

									'.$chat['message'].'
									</p>
									</div>

											';
									}




							}
							
						}

					?>
					

			    </div>

			    <div class="modal-footer">
			    	<textarea id="message" class="form-control" style=" width: 76%; height: 60px; "></textarea>
					<button id="send" class="btn btn-primary" style=" height: 60%; ">send</button>
			    </div>
		</div>
	</div>	


			
		</div>
		<div class="col-md-4">
			
		</div>
	</div>
</div>



</body>


<script type="text/javascript">
	
$(document).ready(function(){

	$("#send").on("click",function(){

		$.ajax({
			url:"insertMessage1.php",
			method:"POST",
			data:{
				fromUser: $("#fromUser").val(),
				toUser: $("#toUser").val(),
				message: $("#message").val()

			},

			dateType:"text",
				success:function(data)
				{
					$("#message").val("");
					// alert(data);
					// alert($("#message").val(""));
			 	}


		});

	});

	setInterval(function(){
		$.ajax({
			url:"realTimeChat.php",
			method:"POST",
			data:{
				fromUser: $("#fromUser").val(),
				toUser: $("#toUser").val()
			},
			dateType:"text",
				success:function(data)
				{
					$("#msgBody").html(data);
			 	}
		});
	},700);
	
});


</script>


</html>