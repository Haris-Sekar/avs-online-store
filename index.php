<?php 
include('./php/conn.php');
$i=0;
$sql_image="SELECT * FROM home_cover_images;";
$res_image=mysqli_query($conn,$sql_image);
while($row=mysqli_fetch_array($res_image,MYSQLI_ASSOC)){
    $row_img[$i]=$row['image_name'];
    $i++;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./assets/css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVS ENTERPRISES</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>AVS ENTERPRISES</title>
</head>
<body>
<div class="navv">

<header>
    <ul class="logo">
        <li><img src="./assets/images/avs logo.png" alt="logo" srcset="" class="img-logo"></li>
        <li><p class="Logo">AVS ENTERPRISES</p></li>
    </ul>
      <input type="checkbox" name="" class="btn" />
      <div class="nav">
        <ol>
          <li><a href="./index.php">Home</a></li>
          <li><a href="./php/product_display.php">Products</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="./php/login.php">Login</a></li>
        </ol>
      </div>
</header>
</div>
    <div class="body-content">
      <div class="slider">
        <div class="slides">
          <input type="radio" name="radio-btn" id="radio1">
          <input type="radio" name="radio-btn" id="radio2">
          <input type="radio" name="radio-btn" id="radio3">
          <input type="radio" name="radio-btn" id="radio4">
          <div class="slide first">
            <img src="./assets/images/<?php echo $row_img[0];?>" alt="">
          </div>
          <div class="slide">
            <img src="./assets/images/<?php echo $row_img[1];?>" alt="">
          </div>
          <div class="slide">
            <img src="./assets/images/<?php echo $row_img[2];?>" alt="">
          </div>
          <div class="slide">
            <img src="./assets/images/<?php echo $row_img[3];?>" alt="">
          </div>
          <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
          </div>
        </div>
        <div class="navigation-manual">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
          <label for="radio4" class="manual-btn"></label>
        </div>
      </div>
    </div>
    <div class="brands">
      <div class="brand_text">Brands</div>
        <div class="brandsbox">
          <div class="brand1box">
            <div class="brandlogo"><img src="./assets/images/efresh_logo.png" alt=""></div>
            <div class="brandname">EVER FRESH GRAMENTS</div>
            <div class="branddec">We are massive distibutor of this brand inner and outer side of salem</div>
          </div>
          <div class="brand1box">
          <div class="brandlogo"><img src="./assets/images/vetha logo.png" alt=""></div>
            <div class="brandname">SELSUN TRADING</div>
            <div class="branddec">We are massive distibutor of this brand inner and outer side of salem</div>
          </div>
          <div class="brand1box">
          <div class="brandlogo"><img src="./assets/images/anandhalayam.jpg" alt=""></div>
            <div class="brandname">EVER FRESH GRAMENTS</div>
            <div class="branddec">We are massive distibutor of this brand inner and outer side of salem</div>          </div>
        </div>

    </div>
</body>
</html>

<script type="text/javascript">
    var counter = 2;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 3000);
    </script>