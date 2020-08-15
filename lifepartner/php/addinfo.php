<?php
	$uid= $_GET['uid'];
	$name=$_GET['name'];
	$dob=$_GET['dob'];
	$gender=$_GET['gender'];
	$religion=$_GET['religion'];
	
	echo $uid;
	echo "$dob $name $gender $religion";
	
	
	include("link.php");
	$query = "insert into information values(
				'$uid',
				'$name',
				'$dob',
				'$gender',
				'$religion');";
	
	$queryresult= mysqli_query($link,$query);
	if($queryresult ==1)
	{
		echo "Your Profile has been updated successfully";
		setcookie("name", $name, time() + (86400 * 30), "/");
		header('Location: http://localhost/lifepartner/index.php');
		exit;
	}
?>