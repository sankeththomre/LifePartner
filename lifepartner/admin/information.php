<?php
include("link.php");
if(isset($_GET['uid']) && $_GET["submit"]=="Update")
{
	$uid=$_GET['uid'];
	$name=$_GET['name'];
	$gender=$_GET['gender'];
	$religion=$_GET['religion'];
	$query="update information 
			set name='$name', gender='$gender', religion='$religion'
			where uid='$uid'";
	$result = mysqli_query($link,$query);
}
else
if(isset($_GET['uid']) && $_GET["submit"]=="Delete")
{
	$uid=$_GET['uid'];
	$query="delete from information
			where uid='$uid'";
	$result = mysqli_query($link,$query);
}


echo "<center><table border='1'>";
echo "<tr>
		<th>User id	</th>
		<th>Name</th>
		<th>Date of Birth</th>
		<th>Gender</th>
		<th>Religion</th>
		</tr>";			
if(isset($_COOKIE["admin"]))
{
	if($_COOKIE["admin"]=="true")
	{
		echo "<center><h2>WELCOME TO THE ADMIN PANEL</h2></center>";
		
		
		$query= "select * from information;";
		$result= mysqli_query($link,$query);
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<tr><form action='information.php' method='get'>
				<td><input type='hidden' name='uid' value='".$row["uid"]."'>".$row["uid"]."</td>
				<td><input type='text' name='name' value='".$row["name"]."'>
				</td>
				<td>".$row["bdate"]."</td>
				<td><input type='text' name='gender' value='".$row["gender"]."'></td>
				<td><input type='text' name='religion' value='".$row["religion"]."'></td>
				<td> <input type='submit' name='submit' value= 'Delete' /></td>
				<td> <input type='submit' name='submit' value='Update' /></td>
				
				</form>
				</tr>";
		}
		
	}
}
else
{
	header('Location: http://localhost/lifepartner/index.php');
	exit;
}
echo "</table></center>";

?>