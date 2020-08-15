<?php

$uid= $_COOKIE['uid'];
include ("link.php");

$query = "select gender from information where uid= '$uid'; ";
$queryresult = mysqli_query($link,$query);
$row = mysqli_fetch_assoc($queryresult);

if($row['gender']=='M')
{
	$uidm = $uid;
	$uidf= $_GET['id'];
	$liking= "male";

}
else
{
	$uidf = $uid;
	$uidm= $_GET['id'];
	$liking="female";
}

$query="select count(*) from liking where uidf='$uidf' and uidm='$uidm';";
$queryresult= mysqli_query($link,$query);
$row = mysqli_fetch_assoc($queryresult);
if($row['count(*)']==0)
{
	$query="insert into liking (uidm,uidf,$liking) values ('$uidm','$uidf','Y');";
	}
else
{
	$query = "update liking set $liking='Y' where uidf='$uidf' and uidm='$uidm';";
}

$queryresult= mysqli_query($link, $query);
if($queryresult!=0)
{
	echo "Like submitted Successfully";
}
?>