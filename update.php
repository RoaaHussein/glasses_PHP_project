


                    

<html>
    <head>
       <!-- <link rel="stylesheet" href="css/adminupdate.css">-->
    </head>
    <body>
        <br><br><<center>
               
              <div align="center">
    <form  class="form-account" action="admininsert.php" method="post"
              enctype="multipart/form-data" style="background-color:#3d3d29 ; width:40%; color:black; height:auto">
    <fieldset>
    <legend style="background-color:#ff3300; padding:10px"> ADD NOW MEMBER</legend>
    <fieldset>
    <legend>personal information</legend>
    <p>PLASE INTER THE NEW PERSONAL INFORMATION</p>
        <label> NAME</label>
        <input type="text" placeholder="enter your name" name="username">
        <br>
        
        <label>FULL_NAME</label>
        <input type="text" placeholder="enter your name" name="username">
        <br>
            <label>USER_PASSWORD</label>
                <input type="password" placeholder="enter your password" name="password">
                <br>
                
                
                 
                        <label>EMAIL</label><br>
                        
                            <input type="email" name="mail"><br><br>
                
                    
                    
                    
                                            <label>GENDER</label>
                        <input type="radio" name="gender" value="male">male
                        <input type="radio" name="gender" value="female">female
                        <br>
                          <input type="file" name="userimg" class="button">
                          <br>


                                         <input type="submit" name="send" value="EditInfo" style="background-color:white;color:black ; width: 150px;border-radius:1em;">

                                        </div>
    </form></center>
<?php
 if($_SERVER['REQUEST_METHOD']=='POST')
    {
        //$ID=$_POST['id'];
        $name = $_POST['username'];
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];
        $email = $_POST['mail'];
      
  
        //$date = $_POST['date'];
        $gender = $_POST['gender'];
   
        $usertype=1;
        $img = $_FILES['userimg']['name'];
        $tmp = $_FILES['userimg']['tmp_name'];
        $folder = "img/";
        
        
        move_uploaded_file($tmp,$folder.$img);
        $stmt = mysqli_query($con,"update users set username= '$name',
        mail = '$email', password = '$password',user_image= '$img'
        where userid = '$ID' ");
        if($stmt)
        {
            header("location:update.php");
            echo "done";
        }
        else
        {
            echo "NO";
        }
    }


        