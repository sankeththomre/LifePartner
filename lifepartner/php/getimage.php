<?php
include("link.php");
$query = "select * from pic where uid = '".$_GET['id']."';";
//echo $query;
$result = mysqli_query($link,$query);
$row = mysqli_fetch_assoc($result);
//echo $row["uid"];
header("Content-type: image/*");
echo $row['dp'];

?>