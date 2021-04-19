<?php  

echo "string";

$con=mysqli_connect("localhost","root","","chat");

if (!$con) {
	die("connection failed".mysql_error($con));
}

?>













<!-- <?php  
while ($fetch1=mysqli_fetch_assoc(($sele_con1))) {
	?>
	
<tr>
    <td style="float: left;"><?php echo $fetch1['chat']; ?></td>
    
  </tr>
	<?php
}


?>
 -->
 <!--  
  <tr>
    <td style="float: right;">Alfreds Futterkiste</td>
    
  </tr> -->
  
</table>
</div>




		<div class="bottom">

		<input class="inp" type="text" name="inputVal">
		<input class="btn" type="submit" name="submit">
		</div>

		
	</div>
	
</form>




<form method="post">
	<div class="client_side">
<h3 style="text-align: center;">freelancer site</h3>
		<div class="bottom">
		<input class="inp" type="text" name="inputVal1">
		<input class="btn" type="submit" name="submit1">
		</div>

		
	</div>
	
</form>

	</section>



</body>
</html>