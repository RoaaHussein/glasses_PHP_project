
<?php
 
	
	include("head-page.php");
	$admin_name=@$_POST['user_name'];
	$admin_pass=@$_POST['password'];

	if(isset($_POST['login']))
	{
		if(empty($admin_name) || empty ($admin_pass))
		{
			echo '<script> alert("please enter your name and password");</script>';

		}
		else
			{$select_c="select * from users where username='user_name' && password= 'password'";

             $run_c=mysqli_query($connect,$$select_c);
             if(mysqli_num_rows( $run_c>0)){

$row_c(mysqli_fetch_array($run_c));
$user=$_POST['user_name'];
$pass=@$_POST['password'];
if($user!=$username && $pass !=$password)
	{echo '<script> alert("the information is not correct");</script>';}
             }
             	else
             		{echo '<script> alert("the information is not correct");</script>';}

	}
	}

?>

<div class="body-login">
<div class="title"><h1>Sign Form </h1></div>
<div class="container-login">
	
	<div class="right-login">
		<div class="form-login">
			<form action="login.php" method="post">
				<p>User Name</p>
				<input type="text" name="username" utofocus placeholder="Please Enter Your user name"
				autocomplete="off" >
				<p>Password</p>
				<input type="password" name="password" placeholder="Please Enter Your Password" autocomplete="off">
				<input type="submit" name="login" value="Login">
				<a href="#">forget pass</a>
				<a  class="account" href="create acount.php">Create Acount</a>
			</form>
		</div>
	</div>
</div>
</div>

<?php
  if($_SERVER['REQUEST_METHOD']=='POST')
	{
	if(!empty ($_POST['username'] && !empty($_POST['password'])))
	{

 $name=$_POST['username'];
 $pass=$_POST['password'];
//
//  $hashedpass=sha1( $pass);
 echo $name;
 $stmt=mysqli_query($con ,"select* from users where username='$name' and   password='$pass'");
 $num=mysqli_num_rows($stmt);
if($stmt)
 {
	 $result = mysqli_fetch_assoc($stmt);
	 $_SESSION['username'] =$result['username'];
	 $_SESSION['userid']=$result['userid'];
	 header("location:places to travels.php");
}
else
{
echo "no";
}
}
}






?>