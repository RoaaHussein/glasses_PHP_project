<?php


include("head-page.php");
//$ID = $_SESSION['userid']; 
//delete this after you add the
$ID=9;

$getuser = mysqli_query($con,"select * from users where userid = '$ID' ");
$userinfo = mysqli_fetch_assoc($getuser);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
	<title>profile</title>

    			<meta charset="utf-8">
		<meta name="auther" content="sally krwi">
		<meta name="description" content="who can you cheese your vacation">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-UA-compatible" content="IE-edge">
		<link rel="shortcut icon" href="imgs/favicon.ico">
		<title>POSITION TO TRAVELS</title>
		<link rel="stylesheet" type="text/css" href="stylep.css">
		     <link rel="icon" href="images/images.png"/>
        <link rel="stylesheet" href="css/style.css"/>
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	
</head>
<body>
	<div  class="all">
		
			
			
			
			<div class="contener">
	<form class="form-account" action="profile.php" method="POST"
										enctype="multipart/form-data">
            <p> PROFILE PAGE</p>
            <?php if(isset($userinfo['user_img'])){
            	echo "<img src='". $userinfo['user_img']."''>";
            }
            else{
            	echo "<img src='profile.png'>";
            }

            	?>
				           <br>
						    <input type="file" name="userimg" >
				
				<!-- -------------------------------------------------------------------------------------------------------- -->
					
						
		
		                <input id="name" class="input" name="username" type="text" placeholder="name" size="30" value="<?php echo $userinfo['username']  ?>"><br>
										<input id="name" class="input" name="email" type="email" placeholder="email" size="30" value="<?php echo $userinfo['mail']  ?>"><br>
									
						
						<input type="submit" name="send" value="EditInfo">
		</form>
		<?php
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name =  $_POST['username'];
        $email = $_POST['email'];
        $img = $_FILES['userimg']['name'];
        $tmp = $_FILES['userimg']['tmp_name'];
        $folder = "profile.php";
        $path="img".$img;
       
        move_uploaded_file($tmp,$path);

        if(empty($img))
        {
            $img = $userinfo['userimg'] ;
        }
        $stmt = mysqli_query($con,"update users set username='$name',
        mail = '$email',user_img = '$path'  where userid = '$ID' ");
        
        if($stmt)
        {
            header("location:profile.php");
        }else
        {
            echo "error";
        }
        
    }
    ?>
    
		
				
				</div>
			            

						  
		<div class="footer">

        
	<!-- footer -->
	<section id="wsfooter">
	<p>napldu srvpour dawxogf</p>
	<p>tel:12345 | fax:12345 | Email: sally krwi@gmail.com
	<a href="mailto:sally krwi@gmail.com">Email:sally krwi@gmail.com</a>
	</p>
	
	
	
	
	
	</section>

		</div>



</div>



	</body>
	</html>
	
	