<?php  
session_start();

include("db.php");

$fromUser=$_POST['fromUser'];
$toUser=$_POST['toUser'];
$output="";

$chats=mysqli_query($con,"select * from message where(Fromuser = '".$fromUser."' AND Touser = '".$toUser."') OR (Fromuser ='".$toUser."' AND Touser = '".$fromUser."')")
or die("Failed to the database".mysql_error());

while ($chat=mysqli_fetch_assoc($chats)) {
								

								if ($chat['Fromuser'] == $fromUser) {
									$output.= '<div style="text-align:right;">

									<p style="background:lightblue; word-wrap:break-word; display:inline-block; padding:5px; width:70%;
									border-radius:10px; ">

									'.$chat['message'].'
									</p>
									</div>

											';
										}


									else{
											$output.= '
									<div style="text-align:left;">

									<p style="background:yellow; word-wrap:break-word; display:inline-block; padding:5px; width:70%;
									border-radius:10px;">

									'.$chat['message'].'
									</p>
									</div>

											';
									}




							}
							echo $output;
							
						
?>

