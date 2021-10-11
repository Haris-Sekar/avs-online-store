<?php 
include('./header_admin_withlogin.php');
?> 
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    
<script src="../assets/js/select_search.js"></script>
<style>
  .text_feild{
    width: 400px;
  }
</style>
</head>

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

<div class="product_search">
  <form action="" method="POST">
      Products:
        <select name="product_unit" class="text_feild" id="product_id">
          <option value="null">Select a product</option>
            <?php 
                $qurey="SELECT * FROM products;";
                $result=mysqli_query($conn,$qurey);
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                    
                        <option value="<?php echo $row['product_id']?>"><?php echo $row['product_name']?></option>
                    
            <?php }?>
        </select>
        <button onclick="products()" class="btn-setrates" >View/Set rates</button>
                  
  </form>
</div>



<script>
  function products(){
    var desination=document.getElementById('product_id').value;
      window.location='setrates_products.php?id=' + desination;
}
</script>