<?php

$id=$_GET['id'];
include('./header_admin_withlogin.php');
$sql_product="SELECT * FROM products WHERE product_id='$id'";
$res_product=mysqli_query($conn,$sql_product);
while($row=mysqli_fetch_array($res_product,MYSQLI_ASSOC)){
    $product_name=$row['product_name'];
    $product_unit=$row['product_unit'];
    $product_brand=$row['product_brand'];
    $product_group=$row['product_group'];
    $product_hsn=$row['hsn'];
    $product_image=$row['images'];

}





if(isset($_POST['pname'])){
    $pname=$_POST['product_name'];
    $sql_update="UPDATE products SET product_name='$pname' WHERE product_id='$id'";
    $res_update=mysqli_query($conn,$sql_update);
    if($res_update){
        header("Refresh: 0");
    }
}
if(isset($_POST['punit'])){
    $punit=$_POST['product_unit'];
    $sql_update="UPDATE products SET product_unit='$punit' WHERE product_id='$id'";
    $res_update=mysqli_query($conn,$sql_update);
    if($res_update){
        header("Refresh: 0");
    }
}
if(isset($_POST['pbrand'])){
    $pbrand=$_POST['product_brand'];
    $sql_update="UPDATE products SET product_brand='$pbrand' WHERE product_id='$id'";
    $res_update=mysqli_query($conn,$sql_update);
    if($res_update){
        header("Refresh: 0");
    }
}
if(isset($_POST['pgroup'])){
    $pgroup=$_POST['product_group'];
    $sql_update="UPDATE products SET product_group='$pgroup' WHERE product_id='$id'";
    $res_update=mysqli_query($conn,$sql_update);
    if($res_update){
        header("Refresh: 0");
    }
}
if(isset($_POST['phsn'])){
    $phsn=$_POST['product_hsn'];
    $sql_update="UPDATE products SET hsn='$phsn' WHERE product_id='$id'";
    $res_update=mysqli_query($conn,$sql_update);
    if($res_update){
        header("Refresh: 0");
    }
}
if (isset($_POST['delete'])) {
    echo "Hi";
    $sql_del="DELETE FROM `products` WHERE product_id='$id'";
    $res_del=mysqli_query($conn,$sql_del);
    if($res_del){
        header("location: products.php");
    }
}
if (isset($_POST['submit'])) {
    $product_name=$_POST['product_name'];
    $product_unit=$_POST['product_unit'];
    $product_brand=$_POST['product_brand'];
    $product_group=$_POST['product_group'];
    $product_hsn=$_POST['product_hsn'];
    $sql_update_all="UPDATE products SET product_name='$product_name', product_unit='$product_unit',product_brand='$product_brand',product_group='$product_group',hsn='$product_hsn' WHERE product_id='$id'";
    $res_update_all=mysqli_query($conn,$sql_update_all);
    if($res_update_all  ){
        header("Refresh: 0");
    }

    

}
?>


<div class="edit_product">
    <form action="" method="post">
        Product Name: <input type="text" value="<?php echo $product_name;?>" name="product_name" class="text_feild"> <input type="submit" value="Update" class="btn-setrates" name="pname"> <br>
        Product Unit: <select name="product_unit" class="text_feild">
            <option value="<?php echo $product_unit;?>"><?php echo $product_unit;?></option>
            <?php 
                $qurey="SELECT * FROM unit_master WHERE unit!= '$product_unit';";
                $result=mysqli_query($conn,$qurey);
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                    
                        <option value="<?php echo $row['unit']?>"><?php echo $row['unit']?></option>
                    
            <?php }?>
        </select>   <input type="submit" value="Update" class="btn-setrates" name="punit"><br>
        Product Brand: <select name="product_brand" class="text_feild2">
            <option value="<?php echo $product_brand;?>"><?php echo $product_brand;?></option>
            <?php 
                $qurey="SELECT * FROM brand_register WHERE brand_name!='$product_brand';";
                $result=mysqli_query($conn,$qurey);
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                    
                        <option value="<?php echo $row['brand_name']?>"><?php echo $row['brand_name']?></option>
                    
                        <?php }?>

        </select><input type="submit" value="Update" class="btn-setrates" name="pbrand"><br>
        Product Group: <select name="product_group" class="text_feild2">
            <option value="<?php echo $product_group;?>"><?php echo $product_group;?></option>
            <?php 
                $qurey="SELECT * FROM item_group WHERE group_name!='$product_group';";
                $result=mysqli_query($conn,$qurey);
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                    
                        <option value="<?php echo $row['group_name']?>"><?php echo $row['group_name']?></option>
                    
                        <?php }?>

        </select><input type="submit" value="Update" class="btn-setrates" name="pgroup"><br>
        Product HSN: <input type="text" value="<?php echo $product_hsn;?>" name="product_hsn" class="text_feild"><input type="submit" value="Update" class="btn-setrates" name="phsn"><br>
        <input type="submit" value="Delete Product" name="delete" class="btn-setrates1">
        <input type="submit" value="Update All" name="submit" class="btn-setrates">
    </form>
</div>


<?php



?>