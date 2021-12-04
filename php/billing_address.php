<?php 
include('./header_logout.php');

$sql_address="SELECT * FROM billing_address WHERE user_id='$user_id'";
$res_address=mysqli_query($conn,$sql_address);

?>

<div class="address">
    <div class="tit">Your Addresses:</div>
    <div class="address_list">
        <a href="./add_address.php">
            <div class="new">
                <img src="../assets/images/plus.png" alt=""> <br> Add Address
            </div>
        </a>
        <?php  while($address=mysqli_fetch_array($res_address,MYSQLI_ASSOC)){?>
            <div class="ext">
                <?php echo $address['name'];?><br>
                <?php echo $address['address1']." ". $address['address2'];?><br>
                <?php echo $address['landmark'];?>,<br>
                <?php echo $address['city'].",".$address['state']."-".$address['pin'];?><br>
                <?php echo $address['country'];?><br>
                Phone number:<?php echo $address['mobile'];?><br>
                Address Type: <?php echo $address['address_type'];?><br>
                <a href="./delete_address.php?id=<?php echo $address['id'];?>" id="delete">Delete</a>
            </div>
        <?php  }?>
    </div>
</div>