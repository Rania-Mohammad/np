<?php

 include_once ('../includes/connect.php');
 include_once ('../functions/common_function.php');
 session_start();
?>
<?php
//1-select from cart id and quantity
//2-select from product-->price
//coount total price

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    $total_price=0;
    $invoice_number=mt_rand();//random number
   // echo     $invoice_number;
    $status="pending";
$user_ip=getIPAddress();
$select_cart_details="select* from `cart_details` where ip_address='$user_ip'";
$result_cart_details=mysqli_query($conn,$select_cart_details);
$count_products=mysqli_num_rows($result_cart_details);
while( $row_data=mysqli_fetch_array($result_cart_details)){
 $product_id=$row_data['product_id'];
 
 $select_product_details="select* from `products` where product_id ='$product_id'";
 $result_product_details=mysqli_query($conn,$select_product_details);

 while($row_product=mysqli_fetch_array($result_product_details)){// 1 value
 $product_price=array($row_product['product_price']);
$product_values=array_sum($product_price);// more than one product
 $total_price+=$product_values;

 
 

}
}
// click add to cart more than  one time
//get product quantity
$select_quantity=mysqli_query($conn,"select* from `cart_details`");
$data=mysqli_fetch_array($select_quantity);
$quantity=$data['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal_price=$total_price;


}else{
$quantity=$quantity;
$subtotal_price=($total_price)*($quantity);

}

$insert_order="insert into `user_order` (user_id,amount_due	,invoice_number,total_products,	order_date,	order_state)
 values($user_id,$subtotal_price,$invoice_number,$count_products,NOW(),'$status') ";
 $result_insert=mysqli_query($conn,$insert_order);
 if($result_insert){
  echo"  <script>alert('order is submitted successfully') </script>";
  echo"  <script>window.open('profile.php','_self') </script>";
 }



 //pending table
 $insert_pending="insert into `order_pending` (user_id	,invoice_number,	product_id	,quantity	,order_state) 
 values($user_id,$invoice_number,$product_id,$quantity,'$status')";
 $result_pending_order=mysqli_query($conn, $insert_pending);

 //empty_cart
 $empty_cart="delete from `cart_details` where ip_address='$user_ip'";
 $result_empty_cart=mysqli_query($conn, $empty_cart);


}





?>