<?php
const db_host='localhost';
const db_username='root';
const db_password='';
// using function mysqli==> take 4 args
$conn=mysqli_connect(db_host,db_username,db_password,'Mystore');
if(!$conn){
    die(mysqli_error($conn));
}else{
}



?>