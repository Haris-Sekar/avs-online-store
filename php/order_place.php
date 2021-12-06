<?php

include('./header_logout.php');
global $total_items;
global $total_amount;
global $total_dis;
global $address_id;

if(isset($_GET['id'])){
    $address_id=$_GET['id'];
    $sql_address="SELECT * FROM billing_address WHERE user_id='$user_id' AND id='$address_id'";
    $res_address=mysqli_query($conn,$sql_address);
    $address=mysqli_fetch_array($res_address);
    $name=$address['name'];
    $add1= $address['address1']." ". $address['address2'];
    $add2= $address['landmark'];
    $city= $address['city'];
    $state=$address['state'];
    $pin=$address['pin'];
    $country= $address['country'];
    $mobile= $address['mobile'];
    $add_type= $address['address_type'];

}
else{
    $sql_address1="SELECT * FROM billing_address WHERE user_id='$user_id'";
    $res_address1=mysqli_query($conn,$sql_address1);
    $address=mysqli_fetch_array($res_address1);
    $name=$address['name'];
    $add1= $address['address1']." ". $address['address2'];
    $add2= $address['landmark'];
    $city= $address['city'];
    $state=$address['state'];
    $pin=$address['pin'];
    $country= $address['country'];
    $mobile= $address['mobile'];
    $add_type= $address['address_type'];
}
$cart_sql="SELECT * FROM cart WHERE user_id='$user_id'";
$cart_res=mysqli_query($conn,$cart_sql);

?>

<div class="bill">
    <div class="shipping_address">
        <p id="review_order">Review your order</p>
        <p id="shipping">Shipping address <a href="./select_address.php">Change Address</a> </p>
        <div class="address1">
            <?php echo $name;?><br>
                    <?php echo $add1;?><br>
                    <?php echo $add2;?>,<br>
                    <?php echo $city.",".$state."-".$pin;?><br>
                    <?php echo $country;?><br>
                    Phone number:<?php echo $mobile;?><br>
                    Address Type: <?php echo $add_type;?><br>
        </div>
        <div class="items">
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
            $brand=$product['product_brand'];
        }
        $rate_id=$cart['rate_id'];
        $sql_rates="SELECT * FROM product_rate WHERE id='$rate_id'";
        $res_rates=mysqli_query($conn,$sql_rates);
        while($rate1=mysqli_fetch_array($res_rates,MYSQLI_ASSOC)){
                $rate=$rate1['rate'];
                $frate=$rate1['frame_rate'];
                $discount=$rate1['discount'];




        }
            $total_items++;
            $total_amount=$total_amount+($rate*$cart['quatity']);        
            $total_dis=$total_dis+$discount;        
        ?>
            <div class="product_details">
                <div><img src="../assets/images/product_images/<?php echo $images;?>" alt=""></div>
                <div id="prd_dec">
                    <?php echo $product_name;?><br>
                    <?php echo $cart['size'].'-'.$cart['quatity']."(".$frate." each)";?><br>
                    <span style="text-decoration: line-through;">Rs.<?php echo $frate*$cart['quatity'];?>/-</span> &nbsp;Rs.<?php echo $rate*$cart['quatity'];?>/- <br>
                    You save <?php echo $discount;?>% <br>
                    Product from <?php echo $brand;?>

                </div>
                <div class="delete"></div>
            </div>
        <?php } ?>

        </div>
    </div>
</div>
<div class="summary">
    <form action="" method="post">
    <input type="submit" value="Place Your Order" name="submit"><br></form>
    <p id="summaryid">Order Summary</p>
    <p id="items">Total Items: <?php echo $total_items;?></p>
    <p id="items">Total Amount: Rs.<?php echo $total_amount;?>/-</p>
    
</div>


<?php
    if(isset($_POST['submit']))
    {
        echo "hisdf00";
        $cart_sql="SELECT * FROM cart WHERE user_id='$user_id'";
        $cart_res=mysqli_query($conn,$cart_sql);
        while($cart=mysqli_fetch_array($cart_res,MYSQLI_ASSOC)){
            $product_id=$cart['product_id'];
            $size=$cart['size'];
            $quantity=$cart['quatity'];
            $rate_id=$cart['rate_id'];
        }
        $order_sql="INSERT INTO `orders`(`user_id`, `product_id`, `rate_id`, `size`, `quantity`, `address_id`, `total_items`, `total_rate`)VALUES('$user_id','$product_id','$rate_id','$size','$quantity','$address_id','$total_items','$total_amount');";
        $order_res=mysqli_query($conn,$order_sql);
        if($order_res){

            $cart_delte_sql="DELETE FROM `cart` WHERE user_id='$user_id'";
            $cart_delte_res=mysqli_query($conn,$cart_delte_sql);

            if($cart_delte_res){
                header("location: order_confirmed.php");
            }else{
                echo mysqli_error($conn);
            }


            
        }        
    }
?>