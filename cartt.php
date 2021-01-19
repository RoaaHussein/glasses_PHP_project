
<?php 
include "head-page.php";  ?>
<form action="cartt.php"  method="get" style="margin-top:210px;">
<div align="center">
<table style="background: #fff;border:1px solid #eee; padding:10px;" border="0" width="80%" >
  

  <tr>
    <th> Delete</th>
    <th> product</th>
    <th> Quantity</th>
    <th>Price</th>
    
  </tr>
  <?php 
  global $connect;

$ip=getIp();

$total=0;
$t_price="select * from cart where ip_add='$ip'";
$run_price=mysqli_query($connect,$t_price);

while ($row_t_price=mysqli_fetch_array($run_price)) {
  
  $pro_id_t=$row_t_price['p_id'];
	
  $price_pro= "select * from image where imgid='$pro_id_t'";
  $run_price_pro=mysqli_query($connect,$price_pro);

  while ($row_price_pro=mysqli_fetch_array($run_price_pro)) {
    
  $qty=$row_price_pro['quantity'];
    $pro_price = array($row_price_pro['price']);

    //array(400,500,....)
     $pro_title =$row_price_pro['name_img'];
  
    $pro_img = $row_price_pro['imge'];

    $pro_price_single =$row_price_pro['price']*$qty;
  

//        $total+=$calc_sum; 
                          
      $pri=array_sum($pro_price);
     $pri = $row_price_pro['price']*$qty;
     $total+=$pri;

 ?>
<tr align="center"> 
  <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id_t; ?>" /></td>
  <td> <div> <?php echo $pro_title; ?></div> <img width="70" src="<?php echo $pro_img;?>"></td>
  <td> <input type="text" name="qty[]" size="5" value="<?php echo   $qty; ?>"></td>

<?php	//echo "<script>alert($qty)</script>"; ?>
  <td> <?php echo $pro_price_single; ?></td>
</tr>
 <?php } }?>
 <tr>
  <th></th>
  <th></th>
  <th></th>
  <th>Full Price :<?php echo $total;  ?>$</th>

 </tr>
 <tr>
  <?php
$login_session=@$_SESSION['login'];
      if($login_session == 1){

      echo '  <td align="center"><button style="border: 1px solid pink; border-radius: 10px; width: 14em; height: 3em; background-color: pink;"><a href="checkout.php"  style="width:15em; text-decoration: none; border-color: pink;
  font-family: tahoma;
  font-size:19px;

color:pink;cursor: pointer;border-radius: 10px;">Finish Shopping</a></button></td>';
      }
      else{

        /*echo '<td align="center"><button style="border: 1px solid pink; border-radius: 10px; width: 14em; height: 3em; background-color: pink;"><a href="login.php"  style="width:15em; text-decoration: none; border-color: pink;
  font-family: tahoma;
  font-size:19px;

color:#fff;cursor: pointer;border-radius: 10px;"> Finish Shopping</a></button></td>';
      */
    }

   ?>

 </tr>



  
  
  </table></div>
<br>

   <center>
<input type="submit" name="update_cart" value="Update Cart"  style="border-radius: 10px;width:10em;background-color: black;width: 14em; height: 3em;color:white" />
  
  
  <button style="border: 1px solid pink; border-radius: 10px; width: 14em; height: 3em; background-color: black;"><a href="create acount.php"  style="width:15em; text-decoration: none; border-color: pink;
  font-family: tahoma;
  font-size:19px;

color:white;cursor: pointer;border-radius: 10px;"> Finish Shopping</a></button>
  
</center>
</form>



  
  
  <?php 
  
  
 function update_Cart(){

global $connect;
 $ip=getIp(); 
if(isset($_GET['update_cart'])){

foreach($_GET['remove'] as $id_remove){

   $delete_pro="delete  from cart where p_id='$id_remove' AND ip_add='$ip'";

   $run_delete=mysqli_query($connect,$delete_pro);

if($run_delete){

  header("location:cartt.php");
}
  
}
}
}
echo @$up_c = update_Cart();
  
  
  

     if(isset($_GET['update_cart'])){
       $q = $_GET['qty'];
     $product_id= "select p_id from cart where ip_add='$ip'";

       $run_pro=mysqli_query($connect,$product_id);
     foreach($_GET['qty'] as $id_qry){
    $result = mysqli_fetch_assoc($run_pro); 
      
                $id = $result['p_id'];
                
        
               
      
      $update_qty =" UPDATE cart SET qty='$id_qry' where p_id='$id'";

      $run_u_qty =mysqli_query($connect,$update_qty);
      }
    
    
      $total=$total * $qty;
       
    
    echo"<script>window.open('cartt.php','_self');</script>";
    }

     



   ?>

<br><br><br><br><br><br><br><br><br><br><br><br>

<?php include "footers.php";  ?>