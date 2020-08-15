<?php 
	include ('modules/header.php');

	if(isset($_COOKIE["uid"]))
	{
		$uid=$_COOKIE["uid"];
		include ("php/link.php");
		$query = "select name from information where uid='$uid';";  //checking if profile is completed
		$queryresult= mysqli_query($link,$query);
		$query2 ="select * from pic where uid='$uid';";   //checking if a photo is uploaded or not
		$queryresult2 = mysqli_query($link,$query2);
		if(mysqli_num_rows($queryresult)==0)
		{
			include("modules/info_form.php");
		}
		else
		if(mysqli_num_rows($queryresult2)==0)
		{
			$row = mysqli_fetch_assoc($queryresult);
			setcookie("name", $row["name"], time() + (86400 * 30), "/");
			header('Location: http://localhost/lifepartner/picup.php');
			exit;
		}
		else
		{
			
			$row = mysqli_fetch_assoc($queryresult);
			setcookie("name", $row["name"], time() + (86400 * 30), "/");
			echo "<center><h2>Your Profile is complete <br> and everything looks good. <br>
					<a href='match.php'>Click here</a> to search for potential candidates for you<br><br>";
			
			$uid=$_COOKIE["uid"];			
			$query = "select * from liking where (uidm='$uid' or uidf='$uid') and male='Y' and female='Y';";
			$queryresult = mysqli_query($link, $query);
			
		
			if(mysqli_num_rows($queryresult)!=0)
			{
				echo "Looks like You have a match - <br>";
				while($row = mysqli_fetch_assoc($queryresult))
				{
					echo "<a href='getprofile.php?id1=".$row['uidm']."&id2=".$row['uidf']."'>";
					echo $row['uidf']." <- likes -> ".$row['uidm'];
					echo "</a><br>";
				}
			}
			echo "</h2></center>";
			
		}
	}
	else
	{
		echo "<center><h2>Welcome to LifePartner <br>
					We provide free match making services like none else.<br>
					<a href='login.php'>LogIn/Signup</a> to use our services.<br>
					It is short and hassle free.<br><br>";
					
		
		
		echo "</h2></center>";
		
	}

	include ('modules/footer.html');
?>