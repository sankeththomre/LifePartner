<?php
	include ('php/link.php');
	$uidm=$_POST['uidm'];
	$uidf=$_POST['uidf'];
	
	$gender;
	if($_COOKIE['uid']==$uidm)
		$gender="male";
	else
		$gender="female";
	
	$query = "select * from married where uidm='$uidm' and uidf='$uidf';";
	if(mysqli_num_rows(mysqli_query($link,$query))==0)
	{
		$query = "insert into married (uidm,uidf) values ('$uidm','$uidf');";
		$queryresult = mysqli_query($link,$query);
		if($queryresult==0)
		{
			echo "There was a problem inserting";
			exit;
		}
	}
	$query = "update married set $gender='Y' where uidm='$uidm' and uidf='$uidf';";
	$queryresult = mysqli_query($link,$query);
	
	if($queryresult==1)
	{
		echo "Sit back and relax! <br> We are now waiting for your partner's confirmation.";
	}
?>