<?php  include("head-page.php");?>


<div class="container-admin">
<div class="tab-dynamic">
	
	<div class="content-tab">
		<div class="content-tab-users">
			
<div class="container-user">
	<h2 style="font-weight:bold;color:#e60000;font-size:40px">IMAGE INFORMATION</h2>
<div class="users">
	<table>
		<tr>
			<td>#Image_Id</td>
			<td>Image_Date</td>
			<td>ImageContent_</td>
			<td>Name_Image</td>
			<td>Process</td>
			
		</tr>
		<?php
        $showuser=mysqli_query($con," select* from image");
		$num=mysqli_num_rows($showuser);
		
		if($num>0)
		{
		
		while($result=mysqli_fetch_assoc( $showuser))
		{
		 echo '
		 <tr>
			<td>'.$result['imgid'].'</td>
			<td>'.$result['imgdate'].'</td>
			<td>'.$result['imgcontent'].'</td>
			<td>'.$result['name_img'].'</td>
			
              <td class="process">
				<a  href="process_f.php?p=delete&imgid='.$result['imgid'].'">Delete<i class="fa fa-times fa-5"> </i></a>
				<a  href="updateimage.php?p=update&imgid='.$result['imgid'].'">update</a>
				
				
				
						 ';
		
						echo '			
								</td>
		</tr>';
		 

		
		
		}
		
		}




		?>
		
		

		
	</table>

</div>


<!--================ form Add new User ================-->

