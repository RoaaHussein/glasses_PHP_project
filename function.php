<?php

$host ="localhost";

$user ="root";

$pass ="";

$dbname="women shop"; 
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
      echo '<meta http-equiv="refresh" content="2; url=\'menu.php\' " /> ';}

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

  $price_pro= "select * from products where p_id='$pro_id_t'";

  $run_price_pro=mysqli_query($connect,$price_pro);

  while ($row_price_pro=mysqli_fetch_array($run_price_pro)) {
    
    $pro_price = array($row_price_pro['p_price']);

    //array(400,500,....)

    $values=array_sum($pro_price);
     $total+=$values;


  }

}
 echo $total;
}
function fget_cat(){

global $connect;
	$get_cart="select * from category";

	$run_cat=mysqli_query($connect,$get_cart);

	while($row_cat=mysqli_fetch_array($run_cat))
	{
			echo'<a href="menu.php?cat='.$row_cat['c_id'].'">'.$row_cat['c_name'].'</a>';

	}
}

//get product

function get_pro(){
	global $connect;
if(! isset($_GET['cat'])){
		$get_pro="select * from products";
	$run_pro=mysqli_query($connect,$get_pro);

	while($row_pro=mysqli_fetch_array($run_pro)){


	
		 echo'
		   <div  id="serves" style="margin-left:1%;margin-top:-9%" >  
        <div class="items" >
            <div class="item-box"  >
  <a href="details.php?id='.$row_pro['p_id'].'"><img src="admin/images/'. $row_pro['p_img'] .'" alt="Avatar" class="image"  height="270px"/></a>
  <a href="details.php?id='.$row_pro['p_id'].'"><div class="overlay"></a>
    <div class="text">
	<a href="details.php?id='.$row_pro['p_id'].'"><h5>just'. $row_pro['p_price'] .'</h5></a> 
	<button ><a href="menu.php?add_cart='.$row_pro['p_id'].'">Add To Cart</a></button>
	</div>
  </div>
   <p>  '. $row_pro['p_desc'] .'</p>   
   
</div>
         
        </div>
        </div> 
		
		';
		
		
	}
	}
}
function get_pro_home(){
	global $connect;
if(! isset($_GET['cat'])){
		$get_pro="select * from products limit 8";
	$run_pro=mysqli_query($connect,$get_pro);

	while($row_pro=mysqli_fetch_array($run_pro)){


		 echo'
		   <div  id="serves" style="margin-left:1%;margin-top:-9%" >  
        <div class="items" >
            <div class="item-box"  >
  <a href="details.php?id='.$row_pro['p_id'].'"><img src="admin/images/'. $row_pro['p_img'] .'" alt="Avatar" class="image"  height="270px"/></a>
  <a href="details.php?id='.$row_pro['p_id'].'"><div class="overlay"></a>
    <div class="text">
	<a href="details.php?id='.$row_pro['p_id'].'"><h5>just'. $row_pro['p_price'] .'</h5></a> 
	<button ><a href="menu.php?add_cart='.$row_pro['p_id'].'">Add To Cart</a></button>
	</div>
  </div>
   <p>  '. $row_pro['p_desc'] .'</p>   
   
</div>
         
        </div>
        </div> 
		
		';
	}
	}
}



//get product by category

function get_pro_cat(){

	global $connect;
	if(isset($_GET['cat'])){

$cat=(int)$_GET['cat'];

$get_pro_cat="select * from products where p_category = '$cat' ";

$run_pro_cat=mysqli_query($connect,$get_pro_cat);

if(mysqli_num_rows($run_pro_cat)>0){

    while ($row_pro_cat=mysqli_fetch_array($run_pro_cat)) {
      
  echo'
		   <div  id="serves" style="margin-left:1%">  
        <div class="items" >
            <div class="item-box"  >
  <a href="details.php?id='.$row_pro_cat['p_id'].'"><img src="admin/images/'. $row_pro_cat['p_img'] .'" alt="Avatar" class="image"  height="270px"/></a>
  <a href="details.php?id='.$row_pro_cat['p_id'].'"><div class="overlay"></a>
    <div class="text">
	<a href="details.php?id='.$row_pro_cat['p_id'].'"><h5>just'. $row_pro_cat['p_price'] .'</h5></a> 
	<button ><a href="menu.php?add_cart='.$row_pro_cat['p_id'].'">Add To Cart</a></button>
	</div>
  </div>
   <p>  '. $row_pro_cat['p_desc'] .'</p>   
   
</div>
         
        </div>
        </div> 
		
		';
		
    }

}
else{
	echo'<div class="error">Sorry!It doesnt find product to display.</div>';
	}
}
}





function get_pro_search(){

global $connect;

if( isset($_GET['search'])){
	$searchArea1=@$_GET['searchArea'];

	$get_pro_search="select * from products where p_key_word LIKE '% $searchArea1 %' ";

	$run_pro_search=mysqli_query($connect,$get_pro_search);

	if(mysqli_num_rows($run_pro_search)>0){


while ($row_pro=mysqli_fetch_array($run_pro_search)) {
		
	 echo'
		   <div  id="serves" style="margin-left:1%;margin-top:-9%" >  
       <div class="items" >
            <div class="item-box"  >
  <a href="details.php?id='.$row_pro['p_id'].'"><img src="admin/images/'. $row_pro['p_img'] .'" alt="Avatar" class="image"  height="270px"/></a>
  <a href="details.php?id='.$row_pro['p_id'].'"><div class="overlay"></a>
    <div class="text">
	<a href="details.php?id='.$row_pro['p_id'].'"><h5>just'. $row_pro['p_price'] .'</h5></a> 
	<button ><a href="menu.php?add_cart='.$row_pro['p_id'].'">Add To Cart</a></button>
	</div>
  </div>
   <p>  '. $row_pro['p_desc'] .'</p>   
   
</div>
         
        </div>
        </div> 
		
		';
	}

	}
	
else {
	echo '<div class="error">not found</div>';
}
}

}

?>