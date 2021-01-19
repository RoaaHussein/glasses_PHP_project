<?php 
//session_start();
include ("head-page.php");

?>
<html>
<head>
		<meta charset="utf-8">
</head>
    <body>


           
   <?php 
    $ID=$_GET['imgid'];

$showuser=mysqli_query($con,"select * from image where imgid=$ID");
$num= mysqli_num_rows($showuser);
if($num>0)

{
while ($result=mysqli_fetch_assoc($showuser))
 {

 		$img_conn=mysqli_connect($host,$user,$pass,$dbname);
				$id=$result['imgid'];
				$img_sql="select imge from image where imgid=?";
				$retrive_img=$img_conn->prepare($img_sql);
				$retrive_img->bind_param("i",$id);
				$retrive_img->execute();
				$retrive_img->bind_result($src);
				$retrive_img->fetch();
			echo ' <center><div>';
echo"<br><br><img src='$src'  width='250px' height='250px' border:solid >";

		echo  '
		<br>
		'.$result['name_img'].'<br>
		'.$result['imgdate'].'<br>
		'.$result['imgcontent'].'<br>
			'.$result['price'].'<br>
		'.$result['more'].'<br>';
			
			// echo '<h1>'.$result['imgid'].'</h1>';
			echo '<button class="cat tuts" style="background-color:black">><a href="cartt.php?add_cart='.$result['imgid'].'">buy</a></button>';
			
		?> 
		<!--<br><br><br><a href="cart.php?id=echo# $result['imgid']"><button type="button">add to cart</button> </a>-->
<?php
echo '</center></div>';

		  
}
}?>
   <br> <br> <br> <br> <br> <br> <br> <br> <br>    <br> <br> <br> <br>  <br> <br> <br>  <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br>   <br> <br> <br> <br> <br> <br> <br>    
 <?php
   
	
	include("footers.php");
?>

        
        
  












