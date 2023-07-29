<!-- connction with data base -->
<?php include_once('includes/connect.php') ;?>
<?php include_once('functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website with php & MySQL</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet"  type="text/css" href="style.css">
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<!-- navbar -->
<div class="container-fluid m-0 p-0  ">

<!-- first child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info p-0 m-0">
  <div class="container-fluid ">
   <img src="./images/cart2.png" alt="" class="logo" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_Items_number();?></sup></a>
        </li>
  
      </ul>
    
    </div>
  </div>
</nav>
<!-- calling functiont  -->
<?php
cart();
?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">
 
<?php 
         if(!isset($_SESSION['username'])){
          echo "
           <li class='nav-item'>
             <a class='nav-link' href='#'>Welcome Guest</a>
           </li>";}
   
           else{
             echo " <li class='nav-item'>
             <a class='nav-link' href='#'> Welcome  ".$_SESSION['username']."</a>
           </li>";
       }
    if(!isset($_SESSION['username'])){
          echo "
           <li class='nav-item'>
           <a class='nav-link' href='./user_area/user_login.php'>Login</a>
                   </li>";}
   
           else{
             echo " <li class='nav-item'>
             <a class='nav-link' href='user_area/user_logout.php'>Logout</a>
   
            </li>";
       }?>
</ul>
</nav>

<!-- third child -->
<div class="bg-light">
 <h3 class="text-center">Hidden Store</h3>
 <p class="text-center">Communication is at the heart of e-commerce and community</p>
</div>
 



<!-- fourth child -->

<div class="container">
<div class="row">

<form action="" method="post">
    <table class="table table-bordered text-center">
        <tbody>
      
            <!-- php to dynamic products -->
        <?php
            
        
            $get_ip_add = getIPAddress();
            $total_price=0;
            $select_query="select* from `cart_details`  where ip_address='$get_ip_add'";
            $result_select=mysqli_query($conn,$select_query);
           if(affected_rows( $result_select)>0){
            echo "
            <thead>
            <tr>
            <th>Product Title</th>
            <th>Product image</th>
            <th>Quantity</th>
            <th>Total price</th>
            <th>Remove</th>
            <th colspan='2'>operations</th>
            </tr>
            </thead>";

            // $row_data=mysqli_fetch_assoc($result_select);
            while($row_data=mysqli_fetch_assoc($result_select)){
              $product_id=$row_data['product_id'];
          
            $select_product="select* from products where product_id='$product_id'";
            $result_product=mysqli_query($conn,$select_product);
            while($row_product_data=mysqli_fetch_assoc($result_product)){
                  // array to store all prices
              $products_price=array($row_product_data['product_price']);
              $price_table=$row_product_data['product_price'];
              $product_title=$row_product_data['product_title'];
              $product_image1=$row_product_data['product_image1'];
              $product_values=array_sum( $products_price);
              $total_price+=(int)$product_values;
          
         
        ?>

        <tr>
            <td><?=  $product_title;?></td>
            <td><img src="./Admin_area/product_images/<?= $product_image1?>" alt="" class="cart_img"></td>
            <td><input type="text" name="qty"  class="form-input w-50" ></td>
           <?php
            $get_ip_add = getIPAddress();
           if(isset($_POST['update_cart'])){
              $quantities=(int) ($_POST['qty']);
          $update_cart="update `cart_details` set  quantity='$quantities' where ip_address = '$get_ip_add '";
        $result_quantity=mysqli_query($conn,$update_cart);
         $total_price=$product_values*$quantities;
            }
            ?>
      
            <td><?=  $price_table;?>/-</td>
            <td><input type="checkbox"  name="remove_item[]" value=<?= $product_id;?>></td>
            <td>
                
                <input type="submit" value="Update Cart" class="bg-info mx-3 p-2 border-0" name="update_cart">
                <input type="submit" name="remove_cart" value="Remove Item" class="bg-info mx-3 p-2 border-0">
               
            </td>
        </tr>

  <?php }}}else{
   echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
  }
  ?>
 </tbody>
</table>




            <!-- subtotal  -->
            <div class="d-flex m-3">
            <?php     
            $get_ip_add = getIPAddress();
                    $select_query="select* from `cart_details`  where ip_address='$get_ip_add'";
                    $result_select=mysqli_query($conn,$select_query);
                if(affected_rows( $result_select)>0){
                    echo "
            <h4>Subtotal : <strong class='text-info'>  $total_price/-  </strong></h4>
             <input type='submit' class= 'bg-info mx-3 p-2 border-0' name='continue_shopping' value='continue shopping'>'
             <button class='bg-secondary p-2 border-0 '><a href='./user_area/check_out.php'  class='text-light text-decoration-none'>Check Out</a></button>";
            }else{
            echo "<input type='submit' class= 'bg-info align-center  px-3 py-2 mx-8   border-0' name='continue_shopping' value='continue shopping'>";
            }

                if(isset($_POST['continue_shopping'])){
                  echo  "<script>window.open('index.php','_self')</script>";
                }
                ?>
</div>
</div>
</div>

</form>



        
<!-- function to remove item -->
<?php
function delete_cart_item(){
    global $conn;
    if(isset($_POST['remove_cart'])){
    foreach($_POST['remove_item'] as $remove_id){
        echo $remove_id;
  
        $delete_query="delete from `cart_details` where product_id= $remove_id ";
       $run_delete=mysqli_query($conn,$delete_query);
    
  
    if($run_delete){
      echo  "<script>window.open('cart.php','_self')</script>";
    }
  }
  }//else{};
  }
echo $remove_item=delete_cart_item();
?>






<!-- last child -->
</div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>