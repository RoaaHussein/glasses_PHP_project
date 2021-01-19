<?php  include("head-page.php");?>





  
  <div class="col-3">
        <?php
            $stmt = mysqli_query($con,"select * from image");
$num = mysqli_num_rows($stmt);
if($num)
{
    while($re = mysqli_fetch_assoc($stmt))
    {?>
      
   
            <img src="img/<?php  echo $re['imge'] ?>">
            <br>
     <?php echo '<a href="moreroom.php?p=show&photo_id='.$re['Rom_ID'].' ">Read More </a> ';?>
        
   <?php }
}
        ?>
        </div>
		<!--<?php 
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
		'.$result['more'].'<br>';
echo '</center></div>';


}
}?>-->
           
  

        
        
  













		
		
		