<?php
	$link = mysqli_connect("localhost","root","") or
	die("Could Not Connect ".mysqli_error());
	
	mysqli_select_db($link,"matrimony");
	
?>