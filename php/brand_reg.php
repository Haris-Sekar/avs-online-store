<?php

include('./header_admin_withlogin.php');

//sql to fetch the already available data

$unit_sql="SELECT * FROM brand_register";
$unit_res=mysqli_query($conn,$unit_sql);


?>
<div class="products">
<div class="sidemenu">
    <div class="option">
        <ol>
        <a href="./add_products.php"> <li>Add product</li></a><hr>
            <a href="./unit_master.php"> <li>Unit master</li></a><hr>
            <a href="./size_master.php"><li>Size master</li></a><hr>
            <a href="./brand_reg.php"><li>Brand Register</li></a><hr>
            <a href="./item_group.php"><li>Item Group</li></a><hr>
            <a href="./product_rates.php"><li>Product Rate</li></a><hr> 

        </ol>
    </div>
</div>
<div class="unitformbox">
    
    <p class="title">
        Brand master
    </p >
    <div class="masterunits">
        <div class="unitdisplaybox">
            Brands
            <div class="dbunits">
                <?php $i=1;  while($unit_row=mysqli_fetch_array($unit_res,MYSQLI_ASSOC)){?>
                <?php echo $i.'. '.$unit_row['brand_name'];?><a href="./delete_brand.php?id=<?php echo $unit_row['id']; ?>"><img src="../assets/images/delete_icon.png" alt=""></a><br>
                <?php $i++; } ?>
            </div>

        </div>
        <div class="unitform">
            <p class="formtitle">Add Brand</p> 
            <form action="" method="post">
                Brand name: <input type="text" name="name" id=""><br>
                Brand Area: <input type="text" name="area" id=""><br>
                    <input type="submit" value="Add" name="submit" >
            </form>

        </div>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $area=$_POST['area'];
    $unit_insert_sql="INSERT INTO `brand_register`(`brand_name`, `brand_area`)VALUES  ('$name','$area')";
    $unit_insert_res=mysqli_query($conn,$unit_insert_sql);
    if(!mysqli_error($conn)){
        header("Refresh:0");
    }
    else{
        echo mysqli_error($conn);
    }
}

?>

