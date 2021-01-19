<?php 

include("head-page.php");

?>

<!--========================== users page ==================== -->
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
			<td>Email</td>
			<td>password</td>
			<td>Full name</td>
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
			<td>'.$result['mail'].'</td>
			<td>'.$result['password'].'</td>
			<td>'.$result['fullname'].'</td>
			
		<td class="process">
				<a   href="process.php?p=delete&userid='.$result['userid'].'">Delete<i class="fa fa-times fa-5"> </i></a>
				<a  href="process.php?p=Edit&userid='.$result['userid'].'">Edit<i class="fa fa-pencil fa-5"> </i></a>
				<a  href="process.php?p=select&userid='.$result['userid'].'">select<i class="fa fa-pencil fa-5"> </i></a>
						 ';
			 if($result['group_id']==0) 
		 {
		 echo '<a href="process.php?p=Ap&userid='.$result['userid'].'">Ap<i class="fa fa-check fa-5"></i></a>';
		 
		 }
						echo '			
								</td>
		</tr>';
		 

		
		
		}
		
		}




		?>
		
		

		
	</table>

</div>


<!--================ form Add new User ================-->
<a  href="#">Add new user</a>
	