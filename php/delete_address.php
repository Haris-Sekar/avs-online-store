<?php
require('./conn.php');
$id=$_GET['id'];
$sql_delete="DELETE FROM `billing_address` WHERE id='$id' ";
$res_delete=mysqli_query($conn,$sql_delete);
if($res_delete){
    header("location: billing_address.php");
}

?>