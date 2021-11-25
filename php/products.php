<?php 
include('./header_admin_withlogin.php');

$sql_products="SELECT * FROM products";
$res_products=mysqli_query($conn,$sql_products);
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
            <a href="./color_grp_file.php"><li>Color Group</li></a><hr>    
            <a href="./product_rates.php"><li>Product Rate</li></a><hr>


        </ol>
    </div>
</div>


<div class="products_display">
    <?php while($row=mysqli_fetch_array($res_products,MYSQLI_ASSOC)){?>
    <div class="product_card">
        <div class="img"> <img src="../assets/images/product_images/<?php echo $row['images'];?>" alt=""></div>
        <div class="product_name"><?php echo $row['product_name'];?></div>
        <div class="product_group"><?php echo $row['product_group'];?> <br>
        Unit : <?php echo $row['product_unit'];?> <br>
        Brand : <?php echo $row['product_brand'];?><br>
        HSN : <?php echo $row['hsn']; ?> </div>
        <div class="btns"><a href="edit_product.php?id=<?php echo $row['product_id'];?>"><button id="pro">Edit Product</button></a> <a href="setrates_products.php?id=<?php echo $row['product_id'];?>"><button id="rate1">View/Edit Rates</button></a></div>

    </div>

    <?php } ?>
</div>
