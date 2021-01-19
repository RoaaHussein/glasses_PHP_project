
<?php
include("head-page.php");

                    //$ID= $_SESSION['userid'];
                    if(isset($_GET['imgid']))
                    {
                            $ID= $_GET['imgid'];
                            $getuser = mysqli_query($con,"select * from image where imgid = '$ID' ");
                            $userinfo = mysqli_fetch_assoc($getuser);
                    }
                    //$num=mysqli_num_rows();
                    //$_SESSION['userid']=$userinfo['userid'];
//                    if(isset($Gid))
//                    {
//                        
//                    }
                    
?> 
<html>
    <head>
     <!--    <link rel="stylesheet" href="css/adminupdate.css"> -->
    </head>
    <body>
        <br><br>
        <center>
                 
       <div align="center">
    <form  class="form-account"  action="imagetable.php" method="post"
              enctype="multipart/form-data" style="background-color:white ; width:50%; color:black; height:auto" >
                        
                        <legend style="background-color:#666666; padding:10px;color: white;width:40%"> UPDATE PICTURE</legend>
                
                            <br><br>
                        <br>
                        <input type="hidden" name="id" value="<?php if(isset($userinfo['imgid'])) echo $userinfo['imgid'];  ?>">

                                        <label style="color: #e63900;font-weight:bold;width:30%"> Name</label><br>
                                  <input type="text"  name="imgname" value="<?php if(isset($userinfo['name_img'])) echo $userinfo['name_img']; ?>"> 

                                <label style="color: #e63900;font-weight:bold;width:30%">Image_Date</label><br>   

                            <input type="date" name="dateimg" value="<?php if(isset($userinfo['imgdate']))echo $userinfo['imgdate'];  ?>" style="width:50%;">
                            <br>
                            <label style="color:black;font-weight:bold;width:30%">Change_Picture</label><br>

                               <img src="img/<?php if(isset($userinfo['name_img']))echo $userinfo['name_img'];  ?>"><br>                    <input type="file" name="pecimg" class="button"><br>
                                    
                                        <br>
                                            <label style="color:black;font-weight:bold">Description Of Picture</label><br><br>

                                            <textarea name="text" maxlength="500" minlength="10"  rows="8" cols="30" value="<?php if(isset($userinfo['imgcontent'])) echo $userinfo['imgcontent']; ?>"></textarea>
                                            <br><br>
                    


                                         <input type="submit" name="send" value="Refresh" style="background-color:#666666;color:white ; width: 140px;border-radius:1em;">

                                        </div>
                        
    
    
        
    

    </form></center>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $ID=$_POST['id'];
        $nameimg = $_POST['imgname'];
        $dateimg = $_POST['dateimg'];
        $cont = $_POST['text'];

        if(!empty($_FILES['pecimg']))
        {
        $img = $_FILES['pecimg']['name'];
        $tmp = $_FILES['pecimg']['tmp_name'];
        $folder = "img/";
        move_uploaded_file($tmp,$folder.$img);
//        if(!empty($img))
//        {
//            $img = $userinfo['userimage'] ;
//        }
        $stmt = mysqli_query($con,"update image set name_img= '$nameimg',
        imgdate = '$dateimg', imgcontent = '$cont',imge= '$img'
        where imgid= '$ID' ");}

        else{  
         $stmt = mysqli_query($con,"update image set name_img= '$nameimg',
        imgdate = '$dateimg', imgcontent = '$cont'
        where imgid= '$ID' ");}
    
        if($stmt)
        {
          
                echo '<script> alert("DONE ^.^ ");</script>';

        }
        else
        {
            echo "try again";
        }
    }
?>
<!--=====================================================================================
=========================================================================================-->
        