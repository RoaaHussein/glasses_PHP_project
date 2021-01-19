<?php 
//session_start();
include ("head-page.php");
?>

<?php
  
	include("lab9/connect.php");
	
?>
<!DOCTYPE HTML>
	<html>
	<head>
	<title>GREATE ACOUNT</title>
	<style="background-color:black"> 
	
	
	<meta charset="utf-8">
	</head>

	<body>
		<div align="center">
	<form  style="background-color:#19194d ; width:60%; color:white; height:auto"   enctype="multipart/form"  action="<?php echo $_SERVER['PHP_SELF']  ;?>"  method="POST">
	<fieldset>
	<legend style="background-color:#ff3300; padding:10px"> GREATE ACOUNT</legend>
	<fieldset>
	<legend>personal information</legend>
	<p>PLASE INTER YOUR PERSONAL INFORMATION</p>
		<label>USER NAME</label>
		<input type="text" placeholder="enter your name" name="username">
		<br><br>
			<label>USER FULLNAME</label>
		<input type="text" placeholder="enter your  full name" name="fullname">
		<br><br>
		
		<label>YOUR PASSWORD</label>
				<input type="password" placeholder="enter your password" name="userpassword">
				<br><br>
				<!--<label>CONFIRMPASSWORD</label>
					<input type="password" placeholder="enter your confirmpassword"> -->
				    <br><br>
				        <label>EMAIL</label><br>
						
							<input type="email"placeholder="enter your email" name="email" ><br><br>
				
					
					
					
											<label>GENDER</label><br>
						<input type="radio" name="gender" value="male">male<br>
						<input type="radio" name="gender" value="female">female
						<br>

											<input type="submit" value="REGISTER">
											<input type="submit" value="CANCLE">

	                                    </div>
						
	
	
	</fieldset>
	
	</fieldset>
	</form>
	
	
</body>
</html>
<?php

 if($_SERVER['REQUEST_METHOD']=='POST')
{
$name=$_POST['username'];

$password=$_POST['userpassword'];
$email=$_POST['email'];
$fullname=$_POST['fullname'];
//$gender=$_POST['genger'];


$stmt=mysqli_query($con,"insert into users(username,password,mail,fullname) values('$name','$password','$email','$fullname')");
	if($stmt)
	
	{
	 echo "you account is done click here to login ";
	 	echo '
				<a href="login.php">login</a>
            ';


	}

	else
	{
	 echo "error";
	}

}

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
   
	
	include("footers.php");
?>
