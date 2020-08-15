<!DOCTYPE html>
<html>
<head>
	<title>LifePartner</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<center><img src="img/logo.png"></center>
<div id="mainmenu">
	<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="#stories">Success Stories</a></li>
	<ul style="float:right;list-style-type:none;">
		<li>
		<?php 
			if(isset($_COOKIE["name"]))
				echo "<a class='active' href='login.php'>".$_COOKIE["name"]."</a>";
			else
			if(isset($_COOKIE["uid"]))
				echo "<a class='active' href='login.php'>".$_COOKIE["uid"]."</a>";
			else
				echo "<a class='active' href='login.php'>Login/SignUp</a>";
		?>
		</li>
		<li><a href="#customercare">Customer Care</a></li>
	</ul>
	</ul>
</div>