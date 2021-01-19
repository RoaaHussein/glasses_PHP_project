<?php  include("head-page.php");?>


<div class="container-admin">
<div class="tab-dynamic">
	
	<div class="content-tab">
		<div class="content-tab-users">
			
<div class="container-user">
	<h2 style="font-weight:bold;color:#e60000;font-size:40px">comments INFORMATION</h2>
<div class="users">
	<table>
		<tr>
			<td>#comment_Id</td>
			<td>comment_Date</td>
			<td>comment_Content_</td>
			<td>name the user-of-com</td>
			<td>Process</td>
			
		</tr>
		<?php
        $showuser=mysqli_query($con," select* from comments");
		$num=mysqli_num_rows($showuser);
		
		if($num>0)
		{
		
		while($result=mysqli_fetch_assoc( $showuser))
		{
		 echo '
		 <tr>
			<td>'.$result['com_id'].'</td>
			<td>'.$result['date_of_com'].'</td>
			<td>'.$result['content'].'</td>
			<td>'.$result['user-of-com'].'</td>
			
              <td class="process">
				<a  href="process_f.php?p=delete&com_id='.$result['com_id'].'">Delete<i class="fa fa-times fa-5"> </i></a>
			
				
				
				
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

