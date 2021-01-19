<?php  include("head-page.php");?>
<?php
	


        //$ID= $_SESSION['userid'];
        
         if($_SERVER['REQUEST_METHOD']=='POST')
    {
        
        $name_f = $_POST['photo_name'];
        $date_f =$_POST['date'];
        $desc_f = $_POST['text'];
      
  
      if(!empty($_FILES['userimg']))
      {
        $img = $_FILES['userimg']['name'];
        $tmp = $_FILES['userimg']['tmp_name'];
        $folder = "img/";
        
        
        move_uploaded_file($tmp,$folder.$img);
        $stmt = mysqli_query($con,"insert into image (imgdate,imgcontent,imge,name_img)values('$date_f','$desc_f',' $img','$name_f') ");
}
else{

     $stmt = mysqli_query($con,"insert into image (imgdate,imgcontent,name_img)values('$date_f','$desc_f','$name_f') ");

    }
    
            if($stmt)

        {
            header("location:places to travels.php");
        }
        else
        {
             echo '<script> alert(" faild -_- ");</script>';
       }
    
}

 ?>
<head>
		<link rel="stylesheet"  type="text/css" href="ppp.css">
</head>
<html>
    <body>
        
               <br><br> 
       <div align="center">
	<form  class="form-account"  action="photo.php" method="post"
              enctype="multipart/form-data" style="background-color:white ; width:50%; color:black; height:auto" >
						
						<legend style="background-color:#666666; padding:10px;color: white;width:40%"> ADD NOW PICTURE</legend>
						<!-- image table-->
									<!-- image table-->

							<br><br>
						<br>

						<label style="color: black;font-weight:bold;width:30%"> Name</label><br>

							<input type="text" placeholder="enter photo name" name="photo_name" style="width:50%;">
							<br>
							<label style="color:black;font-weight:bold;width:30%">Choose_Picture</label><br>
						        <input type="file" name="userimg" class="button">
									
									    <legend style="padding:10px;font-weight:bold;color: #e63900 ">Date Of Picture</legend><br>

										<input type="date"  name="date"  style="width:15%">
										<br>
											<label style="color:black;font-weight:bold">Description Of Picture</label><br><br>

											<textarea name="text"   rows="8" cols="30"></textarea>
											<br><br>
					


										 <input type="submit" name="send" value="loading" style="background-color:#666666;color:white ; width: 140px;border-radius:1em;">

	                                    </div>
						
	
	
		
	

	</form>
	
           
          

                                  
            
    
    </body></html>