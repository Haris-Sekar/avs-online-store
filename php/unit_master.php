<?php

include('./header_admin_withlogin.php');

//sql to fetch the already available data

$unit_sql="SELECT * FROM unit_master";
$unit_res=mysqli_query($conn,$unit_sql);

function delete($id){
    echo 'hi';
}



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
        Unit master
    </p >
    <div class="masterunits">
        <div class="unitdisplaybox">
            Units
            <div class="dbunits">
                <?php $i=1;  while($unit_row=mysqli_fetch_array($unit_res,MYSQLI_ASSOC)){?>
                <?php echo $i.'. '.$unit_row['unit'];?><a href="./delete_unit.php?id=<?php echo $unit_row['id']; ?>"><img src="../assets/images/delete_icon.png" alt=""></a><br>
                <?php $i++; } ?>
            </div>

        </div>
        <div class="unitform">
            <p class="formtitle">Add Units</p> 
            <form action="" method="post">
                Unit name: <input type="text" name="unit" id=""><br>
                    <input type="submit" value="Add" name="submit" >
            </form>

        </div>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $unit=$_POST['unit'];
    $unit_insert_sql="INSERT INTO `unit_master`( `unit`) VALUES  ('$unit')";
    $unit_insert_res=mysqli_query($conn,$unit_insert_sql);
    if(!mysqli_error($conn)){
        header("Refresh:0");
    }
}

?>

