<?php
include ('link.php');
$var = $_GET["submit"];
	if($var=="SignUp")
	{
		$uid=$_GET["uid"];
		$contact=$_GET["contact"];
		$contact2=$_GET["contact2"];
		$pwd=$_GET["pwd"];
		$pwd2=$_GET["pwd2"];
		
		if($contact==$contact2 && $pwd==$pwd2)
		{
			$query="insert into signup values ('$uid',$contact,'$pwd')";
			$queryresult =mysqli_query($link,$query);
			
			if($queryresult>0)
			{
				echo "<center><h2>User Created<br>
				<a href='http://localhost/lifepartner/login.php'>Click here to LogIn</a></h2></center>";
				
			}
		}
	}
	else
	if($var=="LogIn")
	{
		$uid= $_GET["uid"];
	$pwd= $_GET["pwd"];
		
		$query="select uid from signup where uid='$uid' and pwd='$pwd'";
		$queryresult=mysqli_query($link,$query);
		
		if(mysqli_num_rows($queryresult)>0)
		{
			echo "user logged in";
			setcookie("uid", $uid, time() + (86400 * 30), "/");
			header('Location: http://localhost/lifepartner/');
			exit;
		}
	}

?>