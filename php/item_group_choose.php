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
            <a href="./item_group_choose.php"><li>Item Group</li></a><hr>
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
        $name=$_POST['brand_name'];
        header("location: item_group.php?id=".$name);
    }
    ?>