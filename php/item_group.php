<?php
include('./header_admin_withlogin.php');

//sql to fetch the already available data





?>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="../assets/js/select_search.js"></script>
</head>

<div class="products">
<div class="sidemenu">
    <div class="option">
        <ol><a href="./add_products.php"> <li>Add product</li></a><hr>
            <a href="./unit_master.php"> <li>Unit master</li></a><hr>
            <a href="./size_master.php"><li>Size master</li></a><hr>
            <a href="./brand_reg.php"><li>Brand Register</li></a><hr>
            <a href="./item_group.php"><li>Item Group</li></a><hr>
            <a href="./product_rates.php"><li>Product Rate</li></a><hr>


        </ol>
    </div>
</div>
<div class="brandselection">
    <form action="" method="post">
        <label>Brand Name:</label>
        <select name="brand_name" class="text-feild" style="width:205px;">
            <?php 
                $qurey="SELECT * FROM brand_register;";
                $result=mysqli_query($conn,$qurey);
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                    
                        <option value="<?php echo $row['brand_name']?>"><?php echo $row['brand_name']?></option>
                    
            <?php }?>
        </select><input type="submit" value="Search" name="search">

    </form>
</div>


<?php 

    if(isset($_POST['search'])){
        $brand_name=$_POST['brand_name'];
        $unit_sql="SELECT * FROM item_group WHERE brand_name='$brand_name'";
        $unit_res=mysqli_query($conn,$unit_sql);
?>
        <div class="unitformbox">
            <p class="title">
                Product Group
            </p >
            <div class="masterunits">
                <div class="unitdisplaybox">
                Product Group
                    <div class="dbunits">
                        <?php $i=1;  while($unit_row=mysqli_fetch_array($unit_res,MYSQLI_ASSOC)){?>
                        <?php echo $i.'. '.$unit_row['group_name'];?><a href="./delete_itemgroup.php?id=<?php echo $unit_row['id']; ?>"><img src="../assets/images/delete_icon.png" alt=""></a><br>
                        <?php $i++; } ?>
                    </div>

                </div>
                <div class="unitform">
                    <p class="formtitle">Add Group</p> 
                    <form action="" method="post">
                        New Group: <input type="name" name="group" id="" required><br>
                        <input type="name" name="brand" value="<?php echo $brand_name;?>" required hidden><br>
                            <input type="submit" value="Add" name="submit" >
                    </form>

                </div>
            </div>
        </div>


        <?php
    }
?>


<?php
if(isset($_POST['submit'])){
    $group=$_POST['group'];
    $brand_name=$_POST['brand'];
    $unit_insert_sql="INSERT INTO `item_group`(`group_name`, `brand_name`) VALUES  ('$group','$brand_name')";
    $unit_insert_res=mysqli_query($conn,$unit_insert_sql);
    if(!mysqli_error($conn)){
        header("Refresh:0");
    }
}

?>

                                                                                                                       