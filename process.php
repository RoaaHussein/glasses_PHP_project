<?php 
session_start();
include("head-page.php");
$process =$_GET['p'];

if($process =='delete')

{
 $ID=$_GET['userid'];
 $stmt=mysqli_query($con ,"delete from users where userid ='$ID'");
 if($stmt)
 {
    header("location:Admin.php");
 }
 }
 
else if($process=='Ap')
{
$ID=$_GET['userid'];
$userUp=mysqli_query($con ,"update users set group_id=1 where userid='$ID'"); 

if($userUp)
{
header ("location:Admin.php");

}


}
/*else if($process=='select')
{
$showuser=mysqli_query($con," select* from users");
$num=mysqli_num_rows($showuser);



}





















?>