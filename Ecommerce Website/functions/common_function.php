<?php
// connect with db
// include_once('includes/connect.php');


//get products
 
 function getProducts(){
  global $conn ;
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
        $select_product="select* from products order by rand() ";
    $result_product=mysqli_query($conn,$select_product);
    while($row_data=mysqli_fetch_assoc($result_product)){
    $product_id=$row_data['product_id'];
    $product_title=$row_data['product_title'];
    $product_description=$row_data['product_description'];
    $product_keywords=$row_data['product_keywords'];
    $product_image1=$row_data['product_image1'];
    $product_price=$row_data['product_price'];
    $category_id=$row_data['category_id'];
    $brand_id=$row_data['brand_id'];


    echo "  <div class='col-md-4 mb-2 px-3'>
                <div class='card'>
              <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
              <h5 class='card-title px-3'>$product_title</h5>
              <div class='card-body mt-0 pt-0'>
                
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/- </p>

                <a href='index.php?add_to_cart= $product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id'  class='btn btn-secondary'>View More</a>
              </div>
            </div>
                </div>";
}
}
}
}
//get all products

function get_all_products(){
  global $conn ;
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
        $select_product="select* from products order by rand()";
    $result_product=mysqli_query($conn,$select_product);
    while($row_data=mysqli_fetch_assoc($result_product)){
    $product_id=$row_data['product_id'];
    $product_title=$row_data['product_title'];
    $product_description=$row_data['product_description'];
    $product_keywords=$row_data['product_keywords'];
    $product_image1=$row_data['product_image1'];
    $product_price=$row_data['product_price'];
    $category_id=$row_data['category_id'];
    $brand_id=$row_data['brand_id'];

    echo "  <div class='col-md-4 mb-2 px-3'>
                <div class='card'>
              <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <h5 class='card-title px-3'>$product_title</h5>
              <div class='card-body mt-0 pt-0'>
                
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/- </p>
                <a href='index.php?add_to_cart= $product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id'  class='btn btn-secondary'>View More</a>
              </div>
            </div>
                </div>";
}
}
}
}

//display a unique category

function get_unique_category(){
    global $conn ;
    if(isset($_GET['category'])){

        $category_id=$_GET['category'];
     $select_product="select* from `products` where category_id=$category_id";
    $result_product=mysqli_query($conn,$select_product);
    //  $affected_rows=mysqli_num_rows($result_product);
    //  if($affected_rows==0){
    //   echo "<h2 class='text-center text-danger'>NO Stock For This Category</h2>";
    //  }
    if(!affected_rows($result_product)){ echo "<h2 class='text-center text-danger'>NO Stock For This Category</h2>";}
      while($row_data=mysqli_fetch_assoc($result_product)){
      $product_id=$row_data['product_id'];
      $product_title=$row_data['product_title'];
      $product_description=$row_data['product_description'];
      $product_keywords=$row_data['product_keywords'];
      $product_image1=$row_data['product_image1'];
      $product_price=$row_data['product_price'];
      $category_id=$row_data['category_id'];
      $brand_id=$row_data['brand_id'];
  
      echo "  <div class='col-md-4 mb-2 px-3'>
                  <div class='card'>
                <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                <h5 class='card-title px-3'>$product_title</h5>
                <div class='card-body mt-0 pt-0'>
                  
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/- </p>
  
                  <a href='index.php?add_to_cart= $product_id' class='btn btn-info'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id'  class='btn btn-secondary'>View More</a>
                </div>
              </div>
                  </div>";
  }
  }
  }
  

//display a unique_brand

function get_unique_brand(){
    global $conn ;
    if(isset($_GET['brand'])){

        $brand_id=$_GET['brand'];
     $select_product="select* from `products` where brand_id=$brand_id";
    $result_product=mysqli_query($conn,$select_product);
     $affected_rows=mysqli_num_rows($result_product);
     if($affected_rows==0){
      echo "<h2 class='text-center text-danger'>This Brand Not Available For Service</h2>";
     }
      while($row_data=mysqli_fetch_assoc($result_product)){
      $product_id=$row_data['product_id'];
      $product_title=$row_data['product_title'];
      $product_description=$row_data['product_description'];
      $product_keywords=$row_data['product_keywords'];
      $product_image1=$row_data['product_image1'];
      $product_price=$row_data['product_price'];
      $category_id=$row_data['category_id'];
      $brand_id=$row_data['brand_id'];
  
      echo "  <div class='col-md-4 mb-2 px-3'>
                  <div class='card'>
                <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                <h5 class='card-title px-3'>$product_title</h5>
                <div class='card-body mt-0 pt-0'>
                  
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/- </p>
  
                  <a href='index.php?add_to_cart= $product_id' class='btn btn-info'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id'  class='btn btn-secondary'>View More</a>
                </div>
              </div>
                  </div>";
  }
  }
  }
  

// Dispaly brands in sidnav
 function getBrands(){
    global $conn;
    $select_brands="select* from `brands`";
       $result_select=mysqli_query($conn,$select_brands);
     
      //  var_dump($row_data);==>associative array
      
       while($row_data=mysqli_fetch_assoc($result_select)){
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];
        echo "  <li class='nav-item '>
        <a class='nav-link active text-light' aria-current='page' href='index.php?brand=$brand_id'>$brand_title</a>
      </li>";

 }


}

// Dispaly category in sidenav

 function getCategory(){
    global $conn;
    $select_categories="select*from `categories`";
    $result_categ=mysqli_query($conn,$select_categories);
    while($row_data=mysqli_fetch_assoc($result_categ)){
     $category_title=$row_data['category_title'];
     $category_id=$row_data['category_id'];
     echo " 
     <li class='nav-item'>
     <a class='nav-link active text-light' aria-current='page' href='index.php?category=$category_id'>$category_title</a>
   </li>";
    }

}

//function search_product

function search_product(){
  global $conn ;
  if(isset($_GET['search_data_product'])){
    $search_data=$_GET['search_data'];
 
  $search_query="select* from products where product_keywords like '%$search_data%'";
    $result_product=mysqli_query($conn,$search_query);

    if(!affected_rows($result_product)){   echo "<h2 class='text-center text-danger'>No results match ,No products in this category</h2>";}
    while($row_data=mysqli_fetch_assoc($result_product)){
    $product_id=$row_data['product_id'];
    $product_title=$row_data['product_title'];
    $product_description=$row_data['product_description'];
    $product_keywords=$row_data['product_keywords'];
    $product_image1=$row_data['product_image1'];
    $product_price=$row_data['product_price'];
    $category_id=$row_data['category_id'];
    $brand_id=$row_data['brand_id'];

    echo "  <div class='col-md-4 mb-2 px-3'>
                <div class='card'>
              <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
              <h5 class='card-title px-3'>$product_title</h5>
              <div class='card-body mt-0 pt-0'>
                
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/- </p>

                <a href='index.php?add_to_cart= $product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id'  class='btn btn-secondary'>View More</a>
              </div>
            </div>
                </div>";
}
}

}

// affected rows
function affected_rows($result_query){
  $affected_rows=mysqli_num_rows($result_query);
     if($affected_rows>0){
 return mysqli_num_rows($result_query);
     }
}


// function view details


function view_details(){
  global $conn ;
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
      if(isset($_GET['product_id'])){
        $product_id=$_GET['product_id'];
        $select_product="select* from products where product_id= '$product_id'";
    $result_product=mysqli_query($conn,$select_product);
    while($row_data=mysqli_fetch_assoc($result_product)){
    $product_id=$row_data['product_id'];
    $product_title=$row_data['product_title'];
    $product_description=$row_data['product_description'];
    $product_keywords=$row_data['product_keywords'];
    $product_image1=$row_data['product_image1'];
    $product_image2=$row_data['product_image2'];
    $product_image3=$row_data['product_image3'];
    $product_price=$row_data['product_price'];
    $category_id=$row_data['category_id'];
    $brand_id=$row_data['brand_id'];

    echo "  <div class='col-md-4 mb-2 px-3'>
                <div class='card'>
              <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
              <h5 class='card-title px-3'>$product_title</h5>
              <div class='card-body mt-0 pt-0'>
                
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/- </p>
                <a href='index.php?add_to_cart= $product_id' class='btn btn-info'>Add to cart</a>
                <a href='index.php'  class='btn btn-secondary'>Go home</a>
              </div>
            </div>
                </div>

      
                <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>Related Products </h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./Admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>

                    </div>
                    <div class='col-md-6'>
                    <img src='./Admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>

                    </div>

                </div>

            </div> "
                ;
}
}
}
}
}

// get ip address for user

    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
 

//function add to cart
 function cart(){
  global $conn;
  if(isset($_GET['add_to_cart'])){
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="select* from `cart_details`  where  ip_address='$get_ip_add'  and  product_id= '$get_product_id'";
    $result_select=mysqli_query($conn,$select_query);

    if(affected_rows($result_select)){

      echo "<script>alert('this item is already present inside  this cart') </script>";
      echo "<script>window.open('index.php','_self')</script>";
    } else{
      $insert_query="insert into cart_details (product_id,ip_address,quantity) values ('$get_product_id','$get_ip_add',0)";
      $result_select=mysqli_query($conn,$insert_query);

      echo "<script>alert('product added to cart successfully') </script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
}

}


//function cart number items

function cart_Items_number(){
  global $conn;
  if(isset($_GET['add_to_cart'])){
    $get_ip_add = getIPAddress();
    $select_query="select* from `cart_details`  where  ip_address='$get_ip_add'";
    $result_select=mysqli_query($conn,$select_query);
   $count_cart_items=affected_rows($result_select);
    
    } else{
      global $conn;
      $get_ip_add = getIPAddress();
      $select_query="select* from `cart_details`  where  ip_address='$get_ip_add'";
      $result_select=mysqli_query($conn,$select_query);
     $count_cart_items=affected_rows($result_select);
}
echo $count_cart_items;

  }

//function total cart price
function total_cart_price(){
  $get_ip_add = getIPAddress();
  global $conn;
   
  $total_price=0;
  $select_query="select* from `cart_details`  where  ip_address='$get_ip_add'";
  $result_select=mysqli_query($conn,$select_query);
 
  // $row_data=mysqli_fetch_assoc($result_select);
  while($row_data=mysqli_fetch_assoc($result_select)){
    $product_id=$row_data['product_id'];

  $select_product="select* from products where product_id='$product_id'";
  $result_product=mysqli_query($conn,$select_product);
  while($row_product_data=mysqli_fetch_assoc($result_product)){
        // array to store all prices
    $products_price=array($row_product_data['product_price']);
    $product_values=array_sum( $products_price);
    $total_price+=$product_values;

  }

  }
echo   $total_price;
}

//function to add product to cart design
//  function show_cart_design(){
// $get_ip_add = getIPAddress();
// $total_price=0;
// $select_query="select* from `cart_details`  where ip_address='$get_ip_add'";
// $result_select=mysqli_query($conn,$select_query);

// // $row_data=mysqli_fetch_assoc($result_select);
// while($row_data=mysqli_fetch_assoc($result_select)){
//   $product_id=$row_data['product_id'];

// $select_product="select* from products where product_id='$product_id'";
// $result_product=mysqli_query($conn,$select_product);
// while($row_product_data=mysqli_fetch_assoc($result_product)){
//       // array to store all prices////////////////////////////////////  ??????????????????????????????  ///////////////////////////////
//   $products_price=array($row_product_data['product_price']);
//   $price_table=$row_product_data['product_price'];
//   $product_title=$row_product_data['product_title'];
//   $product_image1=$row_product_data['product_image1'];
//   $product_values=array_sum( $products_price);
//   $total_price+=(int)$product_values;
// }}
//  }

// function to remove item from cart
// function delete_cart_item(){
//   global $conn;
//   if(isset($_POST['remove_cart'])){
//   foreach($_POST['remove_item'] as $remove_id){
//       echo $remove_id;

//       $delete_query="delete from `cart_details` where product_id= $remove_id ";
//      $run_delete=mysqli_query($conn,$delete_query);
  

//   if($run_delete){
//     echo  "<script>window.open('cart.php','_self')</script>";
//   }
// }
// }
// }
 


?>