<?php 
include('./header_logout.php');

?>
<div class="body-content">
      <div class="slider">
        <div class="slides">
          <input type="radio" name="radio-btn" id="radio1">
          <input type="radio" name="radio-btn" id="radio2">
          <input type="radio" name="radio-btn" id="radio3">
          <input type="radio" name="radio-btn" id="radio4">
          <div class="slide first">
            <img src="../assets/images/<?php echo $row_img[0];?>" alt="">
          </div>
          <div class="slide">
            <img src="../assets/images/<?php echo $row_img[1];?>" alt="">
          </div>
          <div class="slide">
            <img src="../assets/images/<?php echo $row_img[2];?>" alt="">
          </div>
          <div class="slide">
            <img src="../assets/images/<?php echo $row_img[3];?>" alt="">
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
            <div class="brandlogo"><img src="../assets/images/efresh_logo.png" alt=""></div>
            <div class="brandname">EVER FRESH GRAMENTS</div>
            <div class="branddec">We are massive distibutor of this brand inner and outer side of salem</div>
          </div>
          <div class="brand1box">
          <div class="brandlogo"><img src="../assets/images/vetha logo.png" alt=""></div>
            <div class="brandname">SELSUN TRADING</div>
            <div class="branddec">We are massive distibutor of this brand inner and outer side of salem</div>
          </div>
          <div class="brand1box">
          <div class="brandlogo"><img src="../assets/images/anandhalayam.jpg" alt=""></div>
            <div class="brandname">EVER FRESH GRAMENTS</div>
            <div class="branddec">We are massive distibutor of this brand inner and outer side of salem</div>          </div>
        </div>

    </div>

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