<?php 
include("./header_logout.php");

$cart_sql="SELECT * FROM cart WHERE user_id='$user_id'";
$cart_res=mysqli_query($conn,$cart_sql);
    
?>
<div class="place_order">
   <a href="./order_place.php"> <button>Place Your order</button></a>
</div>
<div class="cart">
    <?php while($cart=mysqli_fetch_array($cart_res)){
        $id=$cart['product_id'];
        $sql_product="SELECT * FROM products WHERE product_id='$id'";
        $res_product=mysqli_query($conn,$sql_product);
        while($product=mysqli_fetch_array($res_product)){
            $product_name=$product['product_name'];
            $images=$product['images'];
            $product_group=$product['product_group'];
            $per_box=$product['pcs_per_box'];
            $name=$product['color_group'];
        }
        $rate_id=$cart['rate_id'];
        $sql_rates="SELECT * FROM product_rate WHERE id='$rate_id'";
        $res_rates=mysqli_query($conn,$sql_rates);
        while($rate1=mysqli_fetch_array($res_rates,MYSQLI_ASSOC)){
                $rate=$rate1['rate'];
                $frate=$rate1['frame_rate'];
                $discount=$rate1['discount'];
        }
            
        
        ?>

        <div class="cart_items">
            <p class="delete"><img src="../assets/images/delete_icon.png" alt=""></p>

            <p id="img"><img src="../assets/images/product_images/<?php echo $images;?>" alt=""></p>
            <p id="product_name"><?php echo $product_name;?></p>
            <p id="product_group"><?php echo $product_group;?></p>
            <p id="size"><?php echo $cart['size']."-".$cart['quatity']." Pcs";?></p>
            <span id="rss">Rs.</span><span class="rate_disp"> <?php echo $rate;?>/-</span><span class="frate">Rs.<?php echo $frate;?>/</span>
            </div>
    <?php } ?>
</div>
<div class="place_order">
   <a href="./order_place.php"> <button>Place Your order</button></a>
</div>