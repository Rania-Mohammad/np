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
    <title>user registration </title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>
<body>
   <div class="container">
<h2 class="text-center my-3">New User Registration</h2>
<div class="row align-items-center d-flex justify-content-center">
   <div class="col-lg-12 col-xl-6">
      <form autocomplete="off" action="" method="POST" enctype="multipart/form-data">
         <!-- username field -->
         <div class="form-outline  mb-4">
            <label for="username" class="form-label ">Username</label>
            <input type="text" id="username"id="username" class="form-control"     autocomplete="off"  placeholder="please enter your username" required="required"name="username" >
         </div>
         <!--email field  -->
         <div class="form-outline  mb-4">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" id="user_email" class="form-control" placeholder="please enter your email" autocomplete="off" required="required"name="user_email">
         </div>
         <!--user image  -->
         <div class="form-outline  mb-4">
            <label for="user_image" class="form-label">User Image</label>
            <input type="file" id="user_image" class="form-control" required="required"name="user_image"/>
         </div>
         <!--user password  -->
         <div class="form-outline  mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" id="user_password" class="form-control" placeholder="please enter your password" autocomplete="off" required="required"name="user_password">
         </div>
         <!-- confirm user password  -->
         <div class="form-outline  mb-4">
            <label for="conf_user_password" class="form-label">Confirm Password</label>
            <input type="password" id="conf_user_password" class="form-control" placeholder="confirm password" autocomplete="off" required="required"name="conf_user_password">
         </div>
                <!-- address field -->
                <div class="form-outline  mb-4">
            <label for="user_address" class="form-label ">Address</label>
            <input type="text" id="user_address" class="form-control "autocomplete="off"  placeholder="please enter   your address" required="required" name="user_address" >
         </div>
                <!-- CONTACT field -->
                <div class="form-outline  mb-4">
            <label for="user_contact" class="form-label ">Contact</label>
            <input type="text" id="user_contact" class="form-control "autocomplete="off"  placeholder="please enter your mobile number" required="required" name="user_contact" >
         </div>
         <div lass="mt-4 pt-2 ">
            <input type="submit" name="user_registration" class="border-0 bg-info mb-2 mx-2 px-3 py-2" value="Register">
            <p class="small fw-bold   pt-1">Already have an Account ? <a href="user_login.php" class="text-danger text-decoration-none"> Login</a></p>
         </div>
      </form>
   </div>
</div>

   </div> 
</body>
</html>

<!-- php code -->
<?php 
$user_ip= getIPAddress();
if(isset($_POST['user_registration'])){
   $username=$_POST['username'];
   $user_email=$_POST['user_email'];
   $user_password=$_POST['user_password'];
   $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
   $user_conf_password=$_POST['conf_user_password'];
   $user_address=$_POST['user_address'];
   $user_image=$_FILES['user_image']['name'];
   $user_tmp_image=$_FILES['user_image']['tmp_name'];
   $user_contact=$_POST['user_contact'];
   
 //select query
 $select_user="select* from `user_table`  where  username='$username' and user_email='$user_email'";
   $run_select=mysqli_query($conn,$select_user);
   $count_select=mysqli_num_rows($run_select);
   if($count_select>0){
      echo "<script>alert('this user already present in database ')</script>";
   }
    else if($user_password!=$user_conf_password){
            echo "<script>alert('not match in password ')</script>";
      }
      else{
         //insert query
       move_uploaded_file( $user_tmp_image,"./user_images/ $user_image");
      $insert_user="insert into user_table (username	,user_email	,user_password	,user_image	,user_address	,user_phone	,user_ip	)
      values ( '$username','$user_email','$hash_password',' $user_image','$user_address','$user_contact','$user_ip')";
      $run_insert=mysqli_query($conn,$insert_user);
      echo "<script>alert('new user added successfully ')</script>";
      }
 
   
   }


 
//select cart items
 $select_cart_items="select* from `cart_details` where ip_address= '$user_ip'";
 $result_select_cart_items=mysqli_query($conn,$select_cart_items);
 if(affected_rows($result_select_cart_items)>0){
   $_SESSION['username']= $username;
   echo "<script>alert('you Have items in your cart')</script>";
   // echo "<script>window.open('user_registration.php','_self')</script>";


 }
 else{
   // echo "<script>window.open('../index.php','_self')</script>";

 }
?>