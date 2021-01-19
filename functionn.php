<?php

$host ="localhost";

$user ="root";

$pass ="";

$dbname="product"; 
$connect = mysqli_connect($host,$user,$pass,$dbname);

//get ip
function getIp(){

  $ip= $_SERVER ['REMOTE_ADDR'];

  if(!empty($_SERVER['HTTP_CLIENT_IP'])){

    $ip = $_SERVER['HTTP_CLIENT_IP'];

  }
  elseif(!empty($SERVER['HTTP_X_FORWARDED_FOR'])){
    
    $ip =@$SERVER['HTTP_X_FORWARDED_FOR'];

  }
  return $ip;
}
function addtocart(){
  if(empty($_SESSION['prod'])){

$_SESSION['quant']=array();
}


array_push($_SESSION['quant'],$_POST['qty']);





}
//cart function
function cart(){
  global $connect;
  if(isset($_GET['add_cart'])){

   $ip=getIp();

   $pro_id=(int)$_GET['add_cart'];

   $get_cart=" select * from cart where ip_add= '$ip' AND p_id='$pro_id'";
     $run_cart=mysqli_query($connect, $get_cart);

     if(mysqli_num_rows($run_cart)> 0){  //to clear not buy towice

          echo '';


     }
     else{

    $insert_cart=" INSERT INTO cart (p_id,ip_add) VALUES ('$pro_id','$ip')";

    $run_i_cart=mysqli_query($connect , $insert_cart);

    if(isset($run_i_cart)){
      echo '<meta http-equiv="refresh" content="2; url=\'cartt.php\' " /> ';}

    }

   

  
     
  }

}
//total item

function total_item(){

  if(isset($_GET['add_cart'])){

      global $connect;

      $ip=getIp();

      $get_total ="select * from cart where ip_add= '$ip'";

      $run_total=mysqli_query($connect, $get_total);

      $total_item=mysqli_num_rows($run_total);


    }


    else{
          global $connect;

      $ip=getIp();

      $get_total ="select * from cart where ip_add= '$ip'";

      $run_total=mysqli_query($connect, $get_total);

      $total_item=mysqli_num_rows($run_total);  
    }

    echo  $total_item;
}
//get total pric
function total_price(){

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
    
    $pro_price = array($row_price_pro['price']);

    //array(400,500,....)

    $values=array_sum($pro_price);
     $total+=$values;


  }

}
 echo $total;
}


?>