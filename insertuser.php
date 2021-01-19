<?php  include("head-page.php");?>
<?php

        //$ID= $_SESSION['userid'];
        
         if($_SERVER['REQUEST_METHOD']=='POST')
    {
        //$ID=$_POST['id'];
        $name = $_POST['username'];
       // $fullname = mysqli_real_escape_string($_POST['fullname']);
        $fullname =$_POST['fullname'];
        $password = $_POST['password'];
        $email = $_POST['mail'];
      
  
        //$date = $_POST['date'];
        $gender = $_POST['gender'];
   
        $usertype=1;
        if(!empty($_FILES['userimg'])){
        $img = $_FILES['userimg']['name'];
        $tmp = $_FILES['userimg']['tmp_name'];
        $folder = "img/";
        
        
        move_uploaded_file($tmp,$folder.$img);
        $stmt = mysqli_query($con,"insert into users (username,password,mail,fullname,group_id,gender_user,user_img)values('$name','$password',' $email','$fullname','$usertype',' $gender','$img') ");
    }
    else{
    	$stmt = mysqli_query($con,"insert into users (username,password,mail,fullname,group_id,gender_user)values('$name','$password',' $email','$fullname','$usertype',' $gender') ");

    }
        // if($stmt)
        // {
        //     header("location:Admin.php");
        // }
        // else
        // {
        //     echo "NO";
        // }
    }

?>

<html>
    <body>
        
               <br><br> 
       <div align="center">
	<form  class="form-account"  action="insertuser.php" method="post"
              enctype="multipart/form-data" style="background-color:white ; width:50%; color:black; height:auto">
	<fieldset>
	<legend style="background-color:#808080; padding:10px;color: white"> ADD NOW MEMBER</legend>
	<fieldset>
	<legend style="padding:10px;font-weight:bold">PERSONAL INFORMATION</legend><br>
	<p style="color: ">PLEASE ENTER USER INFORMATION</p><br>

		<label style="color:#b30000;font-weight:bold"> NAME</label><br>
		<input type="text" placeholder="enter your name" name="username" style="width:50%;">
		<br>
		
		<label style="color:#b30000;font-weight:bold">FULL_NAME</label><br>
		<input type="text" placeholder="enter your name" name="fullname"  style="width:50%">
		<br>
			<label style="color:#b30000;font-weight:bold">USER_PASSWORD</label><br>
				<input type="password" placeholder="enter your password" name="password"  style="width:50%">
				<br>
				
				
				 
				        <label style="color:#b30000;font-weight:bold">EMAIL</label><br>
						
							<input type="email" name="mail"  style="width:50%"><br><br>
				
					
					
					
									<label style="color:#b30000;font-weight:bold">GENDER</label><br>
						<input type="radio" name="gender" value="male"  style="width:50%">male<br>
						<input type="radio" name="gender" value="female"  style="width:50%">female
						<br>
						<label style="color:#b30000;font-weight:bold">USER IMAGE</label><br>
						<center>  <input type="file" name="userimg" class="button"></center>
						  <br>


										 <input type="submit" name="send" value="insertInfo" style="background-color:#808080;color:white ; width: 150px;border-radius:1em;">

	                                    </div>
						
	
	
	</fieldset>
	
	</fieldset>		
	

	</form>
	
           
          

                                  
            
    
    </body></html>