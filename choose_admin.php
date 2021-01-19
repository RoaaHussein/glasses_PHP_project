<?php  include("head-page.php");

//$process =$_GET['p'];





?>
<div class="container-admin">
<div class="tab-dynamic">
	
	<div class="content-tab">
		<div class="content-tab-users">
			
<div class="container-user">
	<h2>Users Information</h2>
<div class="users">
	<table>
		<tr>
			<td>#ID</td>
			<td>User Name</td>
		
			<td>Process</td>
		</tr>
		<?php
        $showuser=mysqli_query($con," select* from users");
		$num=mysqli_num_rows($showuser);
		
		if($num>0)
		{
		
		while($result=mysqli_fetch_assoc( $showuser))
		{
		 echo '
		 <tr>
			<td>'.$result['userid'].'</td>
			<td>'.$result['username'].'</td>
		
			
		<td class="process">
			
						 ';



				if($result['ragstatus']==0)
				{echo '<a href="process.php?p=Ac&userid='.$result['userid'].'">Active<i class="fa fa-check fa-5"></i></a>';}
		        else	if($result['ragstatus']==1)
				{echo '<a href="process.php?p=stop&userid='.$result['userid'].'">Stoped<i class="fa fa-check fa-5"></i></a>';}

			 if($result['group_id']==1) 
		 {
		 echo '<a href="process.php?p=Me&userid='.$result['userid'].'">member<i class="fa fa-check fa-5"></i></a>';
		
		 }
else if($result['group_id']==0)
	{echo '<a href="process.php?p=Ad&userid='.$result['userid'].'">Admin<i class="fa fa-check fa-5"></i></a>';}


						echo '			
								</td>
		</tr>';
		 

		
		
		}
		
		}




		?>
		
		

		
	</table>

</div>


<!--================ form Add new User ================-->
