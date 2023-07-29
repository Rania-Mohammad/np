<?php
include_once("../includes/connect.php");
if(isset($_POST['insert_product'])){
$product_title=$_POST['product_title'];
$product_description=$_POST['product_description'];
$product_keywords=$_POST['product_keyword'];
$product_category=$_POST['product_category'];
$product_brand=$_POST['product_brands'];
$product_price=$_POST['product_price'];


$product_image1=$_FILES['product_image1']['name'];
$product_image2=$_FILES['product_image2']['name'];
$product_image3=$_FILES['product_image3']['name'];
$product_status='true';

// catch images with temp_name
$temp_image1=$_FILES['product_image1']['tmp_name'];
$temp_image2=$_FILES['product_image2']['tmp_name'];
$temp_image3=$_FILES['product_image3']['tmp_name'];

// validations
if($product_title=='' or$product_description=='' or $product_keywords=='' or $product_price=='' or
$product_image1=='' or $product_image2=='' or $product_image3==''){
 echo "<script>alert('please Fill All Available fields')</script>";
 exit;
}

else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");
    
    //insert into database
    $insert_products="insert into  `products` (product_title,product_description,product_keywords,category_id,brand_id,
    product_image1,product_image2,product_image3,product_price,date,status) VALUES  ('$product_title','$product_description','$product_keywords' ,'$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',Now(),'$product_status')";

    //pass query
    $result_insert= mysqli_query($conn,$insert_products);
    if($result_insert){
        echo "<script>alert('product inserted successfully')</script>";

    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- css file -->
     <link rel="stylesheet" href="../style.css">
     <!-- awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
    <div class="container mt-3">
    <h1 class="text-center ">Insert Products</h1>
    <!-- form -->
    <form method="POST" action="" enctype="multipart/form-data" >

        <!-- title -->

    <div class="outline mb-4  m-auto w-50 ">
    <label for="product_title" class="form-label">Product Title</label>
    <input type="text"  name="product_title"class="form-control " id="product_title" placeholder="Enter Product Title"
     autocomplete="off" required="required">
    </div>

    <!-- description -->

    <div class="outline mb-4  m-auto w-50 ">
    <label for="product_description" class="form-label">Product Description</label>
    <input type="text"  name="product_description"class="form-control " id="product_description" placeholder="Enter Product description"
     autocomplete="off" required="required">
    </div>

    <!-- keyword -->
    
    <div class="outline mb-4  m-auto w-50 ">
    <label for="product_keyword" class="form-label">Product Keywords</label>
    <input type="text"  name="product_keyword"class="form-control " id="product_keyword" placeholder="Enter Product description"
     autocomplete="off" required="required">
    </div>

    <!-- categories -->
    <div class="outline mb-4  m-auto w-50 ">
    <select name="product_category" id=""  class="form-select">
    <option value=''>select a category</option>
   

    <?php 
 $select_query="select*from `categories`";
 $result_categ=mysqli_query($conn,$select_query);
 while($row_data=mysqli_fetch_assoc($result_categ)){
  $category_title=$row_data['category_title'];
  $category_id=$row_data['category_id'];
 echo"<option value='$category_id'> $category_title</option>";
 }
  ?>
    </select>
</div>
   

    <!-- Brands -->
    <div class="outline mb-4  m-auto w-50 ">
    <select name="product_brands" id=""  class="form-select">
    <option value="">select a Brand</option>
    <?php
       $select_brands="select* from `brands`";
       $result_select=mysqli_query($conn,$select_brands);
        
     
      //  var_dump($row_data);==>associative array
      
       while($row_data=mysqli_fetch_assoc($result_select)){
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];
        echo"<option value='$brand_id'> $brand_title</option>";
    }


?>
 </select>
    </div>

   <!-- image1 -->
   <div class="outline mb-4  m-auto w-50 ">
    <label for="product_image1" class="form-label">Product Image1</label>
    <input type="file"  name="product_image1"class="form-control" id="product_image1"
     autocomplete="off" required="required">
    </div>
   <!-- image2 -->
   <div class="outline mb-4  m-auto w-50 ">
    <label for="product_image2" class="form-label">Product Image 2</label>
    <input type="file"  name="product_image2"class="form-control" id="product_image2"
     autocomplete="off" required="required">
    </div>

   <!-- image3  -->

   <div class="outline mb-4  m-auto w-50 ">
    <label for="product_image3" class="form-label">Product Image 3</label>
    <input type="file"  name="product_image3"class="form-control" id="product_image3"
     autocomplete="off" required="required">
    </div>
    
    <!--price  -->
    
    <div class="outline mb-4  m-auto w-50 ">
    <label for="product_price" class="form-label">Product Price</label>
    <input type="text"  name="product_price"class="form-control " id="product_price" placeholder="Enter Product  price "
     autocomplete="off" required="required">
    </div>

    <!--insert  -->
    
    <div class="outline mb-4  m-auto w-50 ">   
    <input type="submit"  name="insert_product"class="btn btn-info px-3 mb-4 "
    value="Insert Products" required="required">
    </div>

    </form>

    </div>
</body>
</html>