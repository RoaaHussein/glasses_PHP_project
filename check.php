
<?php
require "DBconnect.php";
$check="body";
error_reporting(E_ALL ^ E_NOTICE);

$var='/^[\x{0590}-\x{05ff}\x{0600}-\x{06ff}a-zA-Z]+$/u';


 //if(!empty( $_POST['username1'])&& !empty( $_POST['usern//ame2'])&&!empty( $_POST['tele'])&&!empty( $_POST['country'])&&
//!empty( $_POST['remittance'])&&!empty( $_POST['address']))
if(!empty( $_POST['username1']))
{ 
             
    
  echo "<script>alert('hekklokjoj');</script>";             

$fname=$_POST['username1'];
$sname=$_POST['username2'];
$country=$_POST['country'];
$tele=$_POST['tele'];
$remittance=$_POST['remittance'];
$address=$_POST['address'];
                               
                                if(mysqli_query($con,"insert into buyer (buyer_fname,buyer_sname,buyer_address,buyer_tele,buyer_country,buyer_remittance) values('$fname','$sname','$address',77777,'$country',11)"))
                                    {
                                         echo  '<script>
                                     alert("Add Successful")</script>';
                                       }
                                else
                                    { echo  '<script>
                                     alert("Add Not Successful")</script>';}
}else{
	echo  '<script>
alert("sorry!  something is empty")</script>';

}   

 ?>  

<html>
<head>
        <link rel="stylesheet" href="css1/awosme/css/font-awesome.css"/>
        <link rel="stylesheet" href="css1/awosme/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/create.css">
    <meta charset="utf-8">
</head>
    <body>
        <?php 
            include "header.php";
        ?>


<?php
echo '    <br><br><br> <div style="float:left;width:100%;">';
             
 if(isset($_GET['page'])){
        $url2=$_SESSION['url'];
        header("refresh:0;url=$url2");
    
    
    exit();
        
    }
   
 if(isset($_SERVER['HTTP_REFERER'])&& $_SERVER['HTTP_REFERER']!='' ){
       $url=explode('/',$_SERVER['HTTP_REFERER']);
        $url=end($url);
        $url=explode('.',$url);  
        $_SESSION['url']=$_SERVER['HTTP_REFERER'];
    
    }else{
        $url[]='check';
    }
   
    ?>
    
    <a href='check.php?page=1' > <?php  echo $url[0];?></a>>check
        </div> 

<br><br><br><br> <br><br><br>  <br><br><br>  <br><br>
<h1 style="margin: 0em 0em 0em 10em;float: left;">
  <pre>
                  Check Out:</pre></h1></center>
                          <br>        
          


        <div class="div1"> <br><br>
                <form method="Post" action="check.php" enctype="multipart/form-data">
                    <label>First Name</label><br>
                    <input name="username1"  type="text" utofocus placeholder="First Name"><br>
                    <label>Second Name</label><br>
                    <input name="username2"  type="text" utofocus placeholder=" Second Name"><br>
                   
                   
                    <label>Country</label><br>
                    <input name="country"  type="text" utofocus placeholder="Country"><br>
                     <label>Telephone</label><br>
                     <input name="tele"  type="text" minlength="9"  utofocus placeholder="Phone"><br>
                  
                    
                    <label> Remittance:</label><br>
                     <input name="remittance"  type="number" value="" placeholder="Remittance"><br>
                      <label> Address:</label><br>
                     <input name="address"  type="text"  placeholder="address"><br>
                    <br>
                     <input type="submit" value="Go" style="font-weight:bold;font-size:1em;color:white;border-radius:1em;height: 2.5em;margin-left: 6em;background-color:#191e34;
    width:8em;">
               <input type="reset" value="cancle" style="color:white;font-weight:bold;font-size:1em;border-radius:1em;margin:0.1em 0em 0em 1em; height: 2.5em;margin-right: 9em;background-color:#191e34;
    width:8em;">

                </form>
           
        </div><br><br>
        <?php 
            include "footer1.php";
        ?>
    </body>
</html>




