<?php 
require('./conn.php');
$id=$_GET['id'];
$prod=$_GET['product'];
$sql_delete="DELETE FROM `product_rate` WHERE id='$id' ";
$res_delete=mysqli_query($conn,$sql_delete);
if($res_delete){
    header("location: setrates_products.php?id=$prod");
}
?>