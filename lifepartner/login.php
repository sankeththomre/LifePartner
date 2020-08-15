<?php include ('modules/header.php');
if(isset($_COOKIE["uid"]))
{
	header('Location: http://localhost/lifepartner/index.php');
	exit;
}
?>



<div id ="form">

<div id="login">
<center><br><br><br>
Log In here<br><br>
	<form id="log" method="get" action="php/login.php">
		<input type="text" style="height:40px; width:300px; border-radius:15px;"  name="uid" placeholder="USER NAME"><br><br>
		<input type="password" style="height:40px; width:300px; border-radius:15px;" name="pwd" placeholder="PASSWORD"><br><br>
		<input type ="submit" name="submit" style="height:40px; width:300px; border-radius:15px;" value="LogIn">
	</form>
</center>
	
</div>

<div id="signup">
<center><br><br><br>
Sign Up using this form <br><br>
<form id="sign" method="get" action="php/login.php">
			<input type="text" style="height:40px; width:300px; border-radius:15px;"name="uid" placeholder="USER NAME"><br><br>
			<input type="text" style="height:40px; width:300px; border-radius:15px;"name="contact" placeholder="PHONE NUMBER"><br><br>
			<input type="text" style="height:40px; width:300px; border-radius:15px;" name="contact2" placeholder="PHONE NUMBER"><br><br>
			<input type="password" style="height:40px; width:300px; border-radius:15px;" name="pwd" placeholder="PASSWORD">
			<br><br>
			<input type="password" style="height:40px; width:300px; border-radius:15px;" name="pwd2" placeholder="Re-ENTER PASSWORD"><br><br>
			<input type ="submit" name="submit" style="height:40px; width:300px; border-radius:15px;" value="SignUp">
</form>
</center>

</div>


</div>

<?php echo file_get_contents("modules/footer.html");?>
	