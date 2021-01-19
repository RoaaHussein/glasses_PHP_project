<?php
ob_start();
// session_start();

include ("head-page.php");
require 'connect.php';
require 'item.php';

?>





<?php

	if(isset($_GET['id'])){
	
$result =mysqli_query($con,'select * from image where imgid='.$_GET['id']);
$re =mysqli_fetch_assoc($result);

	$item= new Item();
	$item->id = $re['imgid'];
	$item->name = $re['name_img'] ;
	$item->price =$re['price'];
	$item->Image=$re['imge'];
	$item->quantity =1;
	// cheak product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart']));
for($i=0; $i<count($cart); $i++)
	if($cart[$i]->id==$_GET['id'])
	{
		$index = $i;
		break;
	}
	if($index== -1)
	$_SESSION['cart'][] =$item;

 else{
	$cart[$index]->quantity++;
	$_SESSION['cart'] =$cart;
}}
//delet product
if(isset($_GET['index'])){
	
	$cart= unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart']= $cart; 
	
}

?>


<h6>Your Selected Product</h6>


<div id="cart">
<table  id="table" cellpadding="10"  cellspacing="10"  border="1"  style="background: #fff;border:3px solid black; padding:30px;" border="0" width="60%" align="center"  >
<tr>
<th>Option</th>
<th>Id</th>
<th>Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Sub Total</th>
<th>Image</th>
</tr>

<?php
$cart = unserialize(serialize($_SESSION['cart']));
$s =0;
$index =0;
for($i=0; $i<count($cart); $i++){
	$s+= $cart[$i]->price * $cart[$i]->quantity;
?>
<tr>
<td><a href ="cart.php?index=<?php echo $index; ?> "onclick= "return confirm('Are you sure? ')">Delete</a></td>
<td><?php echo $cart[$i]->id; ?></td>
<td><?php echo $cart[$i]->name; ?></td>
<td><?php echo $cart[$i]->price; ?></td>
<td><?php echo $cart[$i]->quantity; ?></td>
<td><?php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>
<td>  <img src="img/<?php echo $cart[$i]->Image ?>"> </td>
</tr>

<?php 

$index++;


} ?>

<tr>
<td colspan="5" align="center"> <b>Sum</b></td>
<td  align="left"><?php echo $s; ?> </td>
</tr>

</table>
</div>
<br>
<div id="bt">
 <a href="Hom.php"><button type="button">Countinue Shopping</button> </a>
<a href="cheakout.php"><button type="button">Finish Shopping</button> </a>

</div>




