<?php
$uid= $_COOKIE["uid"];
?>
<center>
<h2> Looks Like your profile is incomplete. <br> Please fill it to find a match. <br></h2>
<form id="Register" action="php/addinfo.php" method="get">
<table id="tab">
<tr>
	<td>
		Enter Name			
	</td>
	<td>
		<input type="text" size="30" name="name" placeholder="Name" style="height:40px; width:300px; border-radius:15px;"/><br><br>
		<input type="text" name="uid" hidden="true" value="<?php echo $uid?>">
	</td>
</tr>
<tr>
	<td>
		<label for="dob" >Date Of Birth		 </label>
	</td>
	<td>
		<input id="dob" style="height:40px; width:300px; border-radius:15px;" name="dob" type="date" /><br><br>
	</td>
<tr>
	<td>
		Gender		
	</td>
	<td>
		<input type="radio" name="gender" value="M">Male
		<input type="radio" name="gender" value="F">Female<br><br><br>
	</td>
</tr>
<tr>
	<td>
			Religion
	</td>
	<td>
		<input type="text" style="height:40px; width:300px; border-radius:15px;" size="30" name="religion" placeholder="Religion"/><br><br>
	</td>
</tr>

<tr>
	
	<td>
		<input type="submit" style="height:40px; width:80px; border-radius:15px;"value="Register" />
	</td>
	<td>
		<input type="reset" style="height:40px; width:80px; border-radius:15px;" value="Reset"/>
	</td>
</tr>
</table>
</form>


</center>