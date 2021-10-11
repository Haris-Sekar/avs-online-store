<?php 
include('./header_logout.php');

$sql_products="SELECT * FROM products";
$res_products=mysqli_query($conn,$sql_products);
?>


<div class="products_display">
    <?php while($row=mysqli_fetch_array($res_products,MYSQLI_ASSOC)){?>
        <a href="./product_full_disp.php?id=<?php echo $row['product_id'];?>">
    <div class="product_card">
        <div class="img"> <img src="../assets/images/product_images/<?php echo $row['images'];?>" alt=""></div>
        <div class="product_name"><?php $id=$row['product_id'];echo $row['product_name'];?></div>
        <div class="product_group"><?php echo $row['product_group'];?> <br>
        Brand : <?php echo $row['product_brand'];?> <br>
</div>

        <div class="container1">
            <div class="inner1">
            <span class="scroll">scroll for more</span>

                <?php 
                $sql_rates="SELECT * FROM `product_rate` WHERE product_id='$id'";
                $res_rates=mysqli_query($conn,$sql_rates);
  
                while($row1=mysqli_fetch_array($res_rates,MYSQLI_ASSOC)){?>
                <div class="floatLeft1">
                    <span class="size"><?php echo $row1['size']; ?></span>
                    <span class="rate"> <span id="rs"> Rs.</span><?php  echo round($row1['rate']); ?></span>
                    <span class="frate"><?php echo $row1['frame_rate'];?></span>
                    <span class="disc"><?php echo "-".$row1['discount']."%";?></span><br>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    </a>
    <?php } ?>
</div>

