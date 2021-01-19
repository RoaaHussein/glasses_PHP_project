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
$showuser=mysqli_query($con,"select * from glasses");
$num= mysqli_num_rows($showuser);
if($num>0)

{
while ($result=mysqli_fetch_assoc($showuser))
 {
 		$img_conn=mysqli_connect($host,$user,$pass,$dbname);
				$id=$result['imgid'];
				$img_sql="select imge from  glasses where imgid=?";
				$retrive_img=$img_conn->prepare($img_sql);
				$retrive_img->bind_param("i",$id);
				$retrive_img->execute();
				$retrive_img->bind_result($src);
				$retrive_img->fetch();
				
				//echo var_dump($src);

				

			 echo "
				<ul class='logout'>
		      <div style='
			  border:1px #cccccc solid;
	border-radius:15px;
	box-shadow:0px 5px 15px black;
	
	
	 margin:20px;
	 padding-right:80px;
			  
			  
			  
			  
			  '> <img src='$src'  width='250px' height='250px' style=' padding-right:50px;padding-left:50px; margin-right:px' >



		      ";

		      echo '<br><div style="padding-left:30%">
		    <div style="color:red;text-align:center">  '.$result['name_img'].'<br></div>
		      '.$result['imgdate'].'<br>
		      '.$result['imgcontent'].'<br>

	    	';
		      echo' <p> <p> <button class="cat tuts" style="background-color:black"><a  style="color:white;"href="moreshow.php ?p=show&imgid='.$result['imgid'].'">More Detail</a></p></button>
				</div>
                  </div>
			</ul>';


        
/*echo  '
<center><div class="diva">
<img src="img/'.$result['imge'].' "alt="img"/>
 <p><a href="more.php ?p=show&imgid='.$result['imgid'].'">More Detail</a></p>
 </div></center>' ;}*/


}
}
           
  ?> 
<br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>   
  <?php
   
	
	include("footers.php");
?>
	

        
        
  












