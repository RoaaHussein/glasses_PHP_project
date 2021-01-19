<?php 
	require_once "connect.php";

	$id=$_GET['img_id'];

	$st = mysqli_query($con,"select imge from image where imgid=$id");
	$num=mysqli_num_rows($st);
	$re = mysqli_fetch_assoc($st);
	$content=$re['imge'];

	//$img =file_get_contents($_FILES['tmp_name'])

	//header("content-type: image/jpg");
	echo $content;

?>