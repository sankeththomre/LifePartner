<?php

include ('modules/header.php');
include ('php/link.php');
$uidm = $_GET['id1'];
$uidf = $_GET['id2'];

if($uidm==$_COOKIE['uid'])
	$gender='male';
else
	$gender='female';

$querym = "select * from information where uid='$uidm';";
$queryf = "select * from information where uid='$uidf';";

$queryresultm = mysqli_query($link,$querym);
$queryresultf = mysqli_query($link,$queryf);

$rowm = mysqli_fetch_assoc($queryresultm);
$rowf = mysqli_fetch_assoc($queryresultf);

$querym2 = "select * from signup where uid='$uidm';";
$queryf2 = "select * from signup where uid='$uidf';";

$queryresultm2 = mysqli_query($link,$querym2);
$queryresultf2 = mysqli_query($link,$queryf2);

$rowm2 = mysqli_fetch_assoc($queryresultm2);
$rowf2 = mysqli_fetch_assoc($queryresultf2);

echo '
<center>
<h2>
	Since you both have an interest. Your contact details have been exchanged.
	<br>
</h2>
	<table width="70%">
		<tr>
			<th>
			'.$rowf["name"].'
			</th>
			<th>
			'.$rowm["name"].'
			</th>
		</tr>
		
		<tr>
			<td>
				<center>
				<img src = "php/getimage.php?id='.$rowf["uid"].'" height="100px" width="100px">
				</center>
			</td>
			<td>
				<center>
				<img src= "php/getimage.php?id='.$rowm["uid"].'" height="100px" width="100px">
				</center>
			</td>
		</tr>
		
		<tr>
			<th>
			'.$rowf["bdate"].'
			</th>
			<th>
			'.$rowm["bdate"].'
			</th>
		</tr>
		
		<tr>
			<th>
			Phone Num:
			'.$rowf2["phno"].'
			</th>
			<th>
			Phone Num:
			'.$rowm2["phno"].'
			</th>
		</tr>
		
	</table>
	<h2>
		<br>Lifepartner team hopes the best for you. :)';
		
		
		$query = "select * from married where uidm='$uidm' and uidf='$uidf';";
		$queryr = mysqli_query($link,$query);
		$row= mysqli_fetch_assoc($queryr);
		
		if($row[$gender]=='N' or !$row[$gender])
		{
			echo '<br>If you guys are ready to tie the knot just let us know
				<br><form action="marry.php" method="post">
				<input type="hidden" name="uidm" value="'.$uidm.'">
				<input type="hidden" name="uidf" value="'.$uidf.'">
				<input type="submit" value="Yes, I tied the knot">
				</form>';
		}
		else 
		if($row['male']=='Y' && $row['female']=='Y')
		{
			echo "<br>CONGRATULATIONS!!!<BR>LifePartner wishes you well for the rest of your journey";
		}
		else
		{
			echo "<br><br>Sit Back and relax! <br> We are waiting for your partner's confirmation";
		}
			
	echo '</h2></center>';
?>