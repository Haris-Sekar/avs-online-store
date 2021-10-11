<?php 
include('./conn.php');
$id=$_GET['id'];
$sql_delete="DELETE FROM `unit_master` WHERE `id` = '$id'";
$res_delete=mysqli_query($conn,$sql_delete);
if($res_delete){
    header('location: unit_master.php');
}

?>