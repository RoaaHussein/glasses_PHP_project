
<?php
include("head-page.php");

                    //$ID= $_SESSION['userid'];
                    if(isset($_GET['userid']))
                    {
                            $ID= $_GET['userid'];
                            $getuser = mysqli_query($con,"select * from users where userid = '$ID' ");
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
    <body style="background-color:#f2f2f2 ">
        <br><br><br><center>
            <label style="font-size:40px;color:#b30000">Update Information User</label>
                <form class="form-account" action="adminupdate.php" method="post" 
              enctype="multipart/form-data" style="width: 30%;font-weight:bold;">   
            <pre style="font-family:arail;">
                <input type="hidden" name="id" value="<?php if(isset($userinfo['userid'])) echo $userinfo['userid'];  ?>">
    NEW_USER NAME<input type="text" name="username" value="<?php if(isset($userinfo['username'])) echo $userinfo['username']; ?>"><br>
    NEW_USER PASSWORD<input type="password" name="password" value="<?php  if(isset($userinfo['password']))echo $userinfo['password'];?>"><br>
           
             NEW_USER EMAIL<input type="email" name="email" value="<?php if(isset($userinfo['mail']))echo $userinfo['mail'];  ?>"><br>
            NEW_USER FULLNAM<input type="text" name="fullname" value="<?php if(isset($userinfo['fullname'])) echo $userinfo['fullname']; ?>"><br>
                  
           <!--  Date                 <input type="date" name="date" value="<?php  //if(isset($userinfo['date']))echo $userinfo['date']; ?>"><br> -->
           <label>USER_IMAGE</label>
            <img src="img/<?php if(isset($userinfo['user_img']))echo $userinfo['user_img'];  ?>"><br>                                        <input type="file" name="userimg" class="button"><br>
                                    <input type="submit" name="send" value="Update" style="background-color:#1a1a1a;color:white;border-radius:1em;width:5em; align-content: center;" >
            </pre>
    </form></center>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $ID=$_POST['id'];
        $name =  $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $fullname =  $_POST['fullname'];
   
        // $date = $_POST['date'];
        

        if(!empty($_FILES['userimg']))
        {
        $img = $_FILES['userimg']['name'];
        $tmp = $_FILES['userimg']['tmp_name'];
        $folder = "img/";
        move_uploaded_file($tmp,$folder.$img);
//        if(!empty($img))
//        {
//            $img = $userinfo['userimage'] ;
//        }
        $stmt = mysqli_query($con,"update users set username= '$name',
        password = '$password', mail = '$email',fullname=' $fullname',user_img= '$img'
        where userid= '$ID' ");}

        else{  
          $stmt = mysqli_query($con,"update users set username= '$name',
        password = '$password', mail = '$email',fullname=' $fullname'
        where userid= '$ID' ");}
    
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
        