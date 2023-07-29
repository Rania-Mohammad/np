 
  <?php
include_once("../includes/connect.php");
//######### insert category ############
//***************** validation *******
 if(isset($_POST['insert_brand'])){
 $brand_title=htmlspecialchars(htmlentities($_POST['brand_title']));

//select data from database

$select_query="select*  from `brands`where brand_title ='$brand_title'";
$result_select=mysqli_query($conn,$select_query);
$affected_row=mysqli_num_rows($result_select);
//############# not duplicate ############
if($affected_row > 0){
    echo "<script> alert('this Brand is already present inside database') </script>";
}
  else{
    $inser_query="insert into `brands` (brand_title	) values ('$brand_title')";
    $result_insert=mysqli_query($conn,$inser_query);
    if($result_insert){
        echo "<script>alert('Brands has been inserted successfully')</script>";
    }
}
}
?>
 
 
 
 
 <h2 class="text-center">Insert Brands</h2>

 <form action="" method="POST" class="mb-2">
 
 <div class="input-group mb-2 w-90 " >
   <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
   <input type="text" class="form-control"name="brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
 </div>
 
 <div class="input-group mb-2 w-10" >
    <input type="submit" class=" bg-info  border-0 p-2 m-3" name="insert_brand" value="Insert Brands" aria-label="Username" >
    <!-- <button class="  bg-info  border-0 p-2 my-3">Insert brands</button> -->
 </div>
 </div>
 </form>