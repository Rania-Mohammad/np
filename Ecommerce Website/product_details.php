<!-- connction with data base -->
<?php include_once('includes/connect.php') ;?>
<?php include_once('functions/common_function.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website with php & MySQL</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet"  type="text/css" href="style.css">
</head>
<body>

<!-- navbar -->
<div class="container-fluid m-0 p-0 ">

<!-- first child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info p-0">
  <div class="container-fluid">
   <img src="./images/cart2.png" alt="" class="logo" >
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
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><sup><?php cart_Items_number();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();   ?>/-</a>
      </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" name="search_data_product" class="btn btn-outline-light" value="search">
      </form>
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
 
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_login.php">Login</a>
        </li> -->
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
             <a class='nav-link' href='./user_area/user_logout.php'>Logout</a>
   
            </li>";
       }?>
</ul>
</nav>

<!-- third child -->
<div class="bg-light">
 <h3 class="text-center">Hidden Store</h3>
 <p class="text-center">Communication is at the heart of e-coommerce and community</p>
</div>
 



<!-- fourth child -->

<div class="row">
 
    <div class="col-md-10 " >
<!-- show product -->
<!-- row products -->
          <div class="row">
            <!-- card -->
            <!-- <div class="col-md-4">
            <div class='card'>
              <img src='images/macaroni1.jpg' class='card-img-top' alt='...'>
              <h5 class='card-title px-3'>$product_title</h5>
              <div class='card-body mt-0 pt-0'>
                
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price:/$product_price </p>

                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id'  class='btn btn-secondary'>View More</a>
              </div>
            </div>

            </div> -->

            <!-- related products -->
            <!-- <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center text-info mb-5">Related Products </h4>
                    </div>
                    <div class="col-md-6">
                    <img src='images/macaroni2.jpg' class='card-img-top' alt='...'>

                    </div>
                    <div class="col-md-6">
                    <img src='images/macaroni3.jpg' class='card-img-top' alt='...'>

                    </div>

                </div>

            </div>       -->
  <?php
  
  view_details();
  ?>
            </div>

            </div>

<!-- ************************** sidnav ******************** -->

 
<div class="col-md-2 bg-secondary p-0">
 <!-- sidnav -->
 <ul class="navbar-nav me-auto text-center">
  <!-- brands to be displayed -->
        <li class="nav-item bg-info">
          <a class="nav-link active text-light" aria-current="page" href="/"><h4>Delivery Brands</h4></a>
        </li>
        <!-- view brand in sidenav -->
        <?php
      getBrands();
        ?>
</ul>



<ul class="navbar-nav me-auto text-center">
  <!-- categories to be displayed -->
  <li class="nav-item bg-info">
          <a class="nav-link active text-light" aria-current="page" href="/"><h4>Categories</h4></a>
   </li>
<?php 
getCategory();
?>
</ul>
</div>
 
 





<!-- last child -->
</div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>