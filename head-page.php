
<?php
	session_start();
	include("connect.php");
	include("functionn.php");
?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
	<title>My Project</title>
	<link rel="stylesheet" type="text/css" href="lab9/css/s.css">
	<link rel="stylesheet" type="text/css" href="lab9/css/a.css">
	<link rel="stylesheet" type="text/css" href="lab9/css/font-awesome.min.css">
</head>
<body>
	<div class="top-header">
		  <div class="right"> 
            <div class="profile-icon">
			<?php
			if(isset($_SESSION['username']))
			{
			 echo '
			
				<ul class="logout">'.$_SESSION['username'].'

					<li><a href="logout.php">Logout</a></li>
			

				</ul>
				
			'
			;
			}else
			{
				echo ' <ul>
                <i class="fa fa-user fa-5"></i>
                <li ><a href="login.php">Login</a></li>
                <i class="fa fa-users fa-5"></i>
				<li ><a href="create Acount.php">Create Acount</a></li>
            </ul>';
			}
			
			
			?>
					

		</div>
		
		<div class="left">
		
			
		</div>
	</div>
	
	<div class="nav">
	<div>
	
	
	
	 
	
		<div class="right-nav">
			<ul>
			
			
			<li><a class="active" href="places to travels.php"> Home </a></li>
				
				
				<li><a href="about.php"> About Me </a></li>
				
				<!--<li ><a class="Admin" href="Admin.php"> Admin</a></li>
				
				<li ><a class="Admin" href="profile.php">My profile</a></li>-->
			</ul>
		</div>
	</div>
	<h1 style="color:white;"> latest trends <style="text-align= left; "></h1>
	</div>
	<?php cart(); ?>

	
	
		<!--<div class="shop " >
		<!-- <a href="cart.php"><img src="shop.png" width="100" height="100" style=" border-radius:150px"/></a>
		 <a href="cartt.php"><img src="img/b.png"></a>
		</div> 
			<div style="float:right;margin-right:-170px;margin-top:80px;margin-left:130px">
		<h3>product:<?php total_item() ;?></h3>
	</div>-->
				
        