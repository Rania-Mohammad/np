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
    <title>user login </title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <style>
      body{
         overflow-x:hidden;
      }
   </style>
</head>
<body>
   <div class="container">
<h2 class="text-center my-3"> User Login</h2>
<div class="row align-items-center d-flex justify-content-center">
   <div class="col-lg-12 col-xl-6">
      <form action="" method="POST">
         <!-- username field -->
         <div class="form-outline  mb-4">
            <label for="username" class="form-label ">Username</label>
            <input type="text" id="username"id="username" class="form-control "autocomplete="off" placeholder="please enter your username" required="required"name="username" >
         </div>
         
        
         <!--user password  -->
         <div class="form-outline  mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" id="user_password" class="form-control" placeholder="please enter your password" autocomplete="off" required="required"name="user_password">
         
            
         <div lass="mt-4 pt-2 ">
            <input type="submit" name="user_login" class="border-0 bg-info mb-2 m-2 px-3 py-2" value="Login">
            <p class="small fw-bold   pt-1">You Don't have Account ? <a href="user_registration.php" class="text-danger text-decoration-none"> Register</a></p>
         </div>
      </form>
   </div>
</div>

   </div> 
</body>
</html>


<?php
if(isset($_POST['user_login'])){
   $username=$_POST['username'];
   $user_password=$_POST['user_password'];
   $user_ip=getIPAddress();
 $select_user="select* from `user_table` where username= '$username'";
$run_select_user=mysqli_query($conn,$select_user);

//select cart item
$select_cart_item="select* from `cart_details` where ip_address='$user_ip'";
$run_cart=mysqli_query($conn,$select_cart_item);
$row_count=mysqli_num_rows($run_select_user);//user
$count_cart=mysqli_num_rows($run_cart);//cart item for this user
$row_data=mysqli_fetch_assoc($run_select_user);
if(affected_rows($run_select_user)>0){
   $_SESSION['username']= $username;

   if(password_verify($user_password,$row_data['user_password'])){
      if($row_count==1 and $count_cart==0 ){
         $_SESSION['username']= $username;

      echo"<script>alert('login successfully')</script>";
      echo"<script>window.open('profile.php','_self')</script>";

      }else{
         $_SESSION['username']= $username;

         echo"<script>alert('login successfully')</script>";
         echo"<script>window.open('payment.php','_self')</script>";
      }
}else{
   echo"<script>alert('Invalid Account')</script>";
}
}
// else{
//    echo"<script>alert('Invalid Account')</script>";
// }



}




?>