<?php
	include ('modules/header.php');
	include('php/link.php');
	
	$uid=$_COOKIE['uid'];
	
	$query="select gender,religion from information where uid='$uid';";
	
	$queryresult= mysqli_query($link,$query);
	
	$result= mysqli_fetch_assoc($queryresult);
	
	if($result["gender"]=="M")
	{
		$religion=$result['religion'];
		$query="select * from information where gender='F' and religion='$religion';";
	}
	else
	{
		$religion=$result['religion'];
		$query="select * from information where gender='M' and religion='$religion';";
	}
	$queryresult=mysqli_query($link,$query);
	
	echo "<center><h2>Your Likes will be anonymous.<br>A match will be created only when a person you like will like you back.</h2><br><table>";
	echo "<tr> <th>Name</th>
				<th>Birthdate</th>
				<th>Photo</th>
				
		</tr>";
	
	while($row=mysqli_fetch_assoc($queryresult))
	{
		
		echo "<tr>
				<td>".$row["name"]."</td>
				<td>".$row["bdate"]."</td>
				<td><img src='php/getimage.php?id=".$row["uid"]."' height='100px' width='100px'></td>
				<td><a href='php/like.php?id=".$row["uid"]."'> <button>Like</button></a></td>
				</tr>";

	}
	
	echo "</table></center>";



?>