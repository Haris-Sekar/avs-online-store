<?php 
include('./header_admin_withlogin.php');
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
                <a href="./color_group.php"><li>Color Group</li></a><hr>
            <a href="./product_rates.php"><li>Product Rate</li></a><hr>


        </ol>
    </div>
</div>

<div class="addproducts">   

<form action="" method="POST" enctype="multipart/form-data">
        Product Name: <input type="text" name="product_name" placeholder="Enter the Product Name" class="text_feild">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Product Unit:
        <select name="product_unit" class="text_feild">
            <?php 
                $qurey="SELECT * FROM unit_master;";
                $result=mysqli_query($conn,$qurey);
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                    
                        <option value="<?php echo $row['unit']?>"><?php echo $row['unit']?></option>
                    
            <?php }?>
        </select><br><br><br>
        Product&nbsp;&nbsp;  H S N: <input type="number" name="product_hsn" placeholder="Enter the Product HSN" class="text_feild">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Product Brand:
        <select name="product_brand" class="text_feild">
            <?php 
                $qurey="SELECT * FROM brand_register;";
                $result=mysqli_query($conn,$qurey);
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                    
                        <option value="<?php echo $row['brand_name']?>"><?php echo $row['brand_name']?></option>
                    
                        <?php }?>

        </select><br><br><br> Product Group:
        <select name="product_group" class="text_feild">
            <?php 
                $qurey="SELECT * FROM item_group";
                $result=mysqli_query($conn,$qurey);
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                    
                        <option value="<?php echo $row['group_name']?>"><?php echo $row['group_name']?></option>
                    
            <?php }?>   
        </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Item Per Box<input type="number" name="pc_box" id="" class="text_feild" placeholder="Items Per Box"><br>
        <br>
        Upload Product Images:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="file" id="actual-btn" name="img"  required>
        <br><br><input type="submit" value="Add Product" name="submit"><input type="reset" value="Reset">
        </form>
</div>



<script>
    const actualBtn = document.getElementById('actual-btn');

const fileChosen = document.getElementById('file-chosen');

actualBtn.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})
</script>




<?php

if (isset($_POST["submit"]))

 {
     $product_name=$_POST['product_name'];
     $product_unit=$_POST['product_unit'];
     $product_hsn=$_POST['product_hsn'];
     $product_brand=$_POST['product_brand'];
     $product_group=$_POST['product_group'];
     $pcperbox=$_POST['pc_box'];
     $title = rand(0,100000);
    $temp_arr = $title.'-'.$_FILES["img"]["name"];
    $pname = $title.'-'.$_FILES["img"]["name"];
    $tname = $_FILES["img"]["tmp_name"];
    $uploads_dir = 'https://github.com/Haris-Sekar/avs-online-store/assets/images/product_images';
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    $sql = "INSERT INTO `products`(`product_name`, `product_unit`, `product_brand`, `product_group`, `hsn`, `images`,`pcs_per_box`) VALUES('$product_name','$product_unit','$product_brand','$product_group','$product_hsn','$pname','$pcperbox');";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?> <script>alert("Product Added!")</script><?php
    }
    else{
        echo mysqli_error($conn);
    }
    
    
}


?>