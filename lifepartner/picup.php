<?php
function upload()
	{
		include ('php/link.php');
		$maxsize= 8388608;
		if($_FILES['mypic']['error']==UPLOAD_ERR_OK)
		{
			if(is_uploaded_file($_FILES['mypic']['tmp_name']))
			{
				if($_FILES['mypic']['size']<$maxsize)
				{
					$check = getimagesize($_FILES['mypic']['tmp_name']);
					if($check)
					{
						$image = addslashes(file_get_contents($_FILES['mypic']['tmp_name']));
						$uid= $_COOKIE['uid'];
						$query = "insert into pic values ('$uid','{$image}')";
						mysqli_query($link,$query) or die ("ERROR IN UPLOADING FILE");
						echo '<center><h2>IMAGE Successfully Uploaded</h2><br><br>
						     <img src="php/getimage.php?id='.$_COOKIE['uid'].'" height="400px" width="400px" ></center>';
						
					}
					else
						echo "NOT AN IMAGE";
				}
				else
					echo "IMAGE IS GREATER THAN 5 MB";
			}
			else "TEMP_ERROR";
		}
		else
			echo "MYPIC ERROR";
	}
include ('modules/header.php');

if(isset($_FILES['mypic']))
{
	try{
		$msg = upload();
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
	
}
else
	echo '


<div id ="form">

<center><br><br><br>
Upload an Image to make yout profile better<br><br>
	<form method="POST" action="picup.php" enctype="multipart/form-data">
		<input type="file" style="height:40px; width:300px; border-radius:15px;"  name="mypic" <br><br>
		<input type ="submit" name="submit" style="height:40px; width:300px; border-radius:15px;" value="Upload">
	</form>
</center>
	
</div>
</body>
</html>';
?>
