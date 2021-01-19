<?php 

include("head-page.php");
$process =$_GET['p'];

if($process =='delete')

{
 $ID=$_GET['imgid'];
 $stmt=mysqli_query($con ,"delete from image where imgid ='$ID'");
 if($stmt)
 {
    header("location:imagetable.php");
 }
 }
 



if($process =='update')

{
 $ID=$_GET['imgid'];

 {
    include("updateimage.php");
 }
 }






















?>