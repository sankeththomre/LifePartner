<?php
	if(isset($_POST["uid"]) && isset($_POST["pwd"]))
	{
		$uid = $_POST["uid"];
		$pwd= $_POST["pwd"];
		if($uid=="admin" && $pwd=="lifepartner")
		{
			setcookie("admin", "true", time() + (86400 * 30), "/");
			header('Location: admin/information.php');
			exit;
		}
	}
	include("modules/header.php");
?>

<center><br><br><br>
<h2>ADMIN PANEL LOG IN</h2><br><br>
	<form id="log" method="post" action="admin.php">
		<input type="text" style="height:40px; width:300px; border-radius:15px;"  name="uid" placeholder="USER NAME"><br><br>
		<input type="password" style="height:40px; width:300px; border-radius:15px;" name="pwd" placeholder="PASSWORD"><br><br>
		<input type ="submit" name="submit" style="height:40px; width:300px; border-radius:15px;" value="LogIn">
	</form>
</center>

<?php	
	include("modules/footer.html");
?>