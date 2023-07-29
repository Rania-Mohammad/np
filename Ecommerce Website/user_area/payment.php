<?php

 include_once ('../includes/connect.php');
 include_once ('../functions/common_function.php');
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- style css link -->
     <link rel="stylesheet" href="../style.css" type="text/css">
         <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <style>
        .payment_img{
            width:100%;
            Display:block;
            object-fit: contain;
        }
     </style>
    <title>Document</title>
    </head>
    <body>
        <!-- first child nav -->

        <nav class="navbar navbar-expand-lg navbar-light bg-info p-0">
  <div class="container-fluid">
   <img src="../images/cart2.png" alt="" class="logo" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_Items_number();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price :<?php total_cart_price();   ?>/-</a>
      </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" name="search_data_product" class="btn btn-outline-light" value="search">
      </form>
    </div>
  </div>
</nav>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">
 <?php 
 if(!isset($_SESSION['username'])){
       echo "
        <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
      }

        else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='#'> Welcome ".$_SESSION['username']."</a>
        </li>";
    }
    
 if(!isset($_SESSION['username'])){
       echo "
        <li class='nav-item'>
        <a class='nav-link' href='user_login.php'>Login</a>
                </li>";}

        else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='user_logout.php'>Logout</a>

         </li>";
    }
    ?>
</ul>
</nav>



 <!-- select user with his  ip -->
 <?php
 $user_ip=getIPAddress() ;
 $result_select=mysqli_query($conn,"select* from `user_table` where user_ip='$user_ip'");
 $data=mysqli_fetch_assoc($result_select);
 $user_id=$data['user_id'];
 //echo $user_id;

?>
   <h2 class="text-center text-info">Payment options</h2>
   <div class="row d-flex justify-content-center align-items-center">

       <!-- pay online -->
    <div class="col-md-6">
        <a href="https://www.paypal.com" target="_blank"><img  class="payment_img"src="../images/upi.jpg" ></a>
    </div>
   
        <!-- pay offline -->
    <div class="col-md-6  mx-10">
        <a  href="order.php?user_id=<?= $user_id?>"><h2 class="text-center">Pay Offline</h2></a>
    </div>




   </div>
</body>
</html>