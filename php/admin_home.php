<?php
include('./conn.php');
session_start();
if(!isset($_SESSION['email'])){
  $_SESSION['msg'] = "You have to log in first";
  header('location: login.php');
}else{
  $email = $_SESSION['email'];
  $admin_sql="SELECT * FROM admin WHERE email='$email'";
  $admin_res=mysqli_query($conn,$admin_sql);
  if(!$admin_res){
      $_SESSION['msg'] = "You have to log in first";
      header('location: login.php');
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<header>
    <ul class="logo">
        <li><img src="../assets/images/avs logo.png" alt="logo" srcset="" class="img-logo"></li>
        <li><p class="Logo">AVS ENTERPRISES</p></li>
    </ul>
      <input type="checkbox" name="" class="btn" />
      <div class="nav">
        <ol>
          <li><a href="./home.php">Orders</a></li>
          <li><a href="./products.php">Products</a></li>
          <li><a href="#">Page settings</a></li>
          <li><a href="#">Users</a></li>
          <li><a href="./user_account.php">My Account</a></li>
          <li><a href="./logout.php">Logout</a></li>

        </ol>
      </div>
</header>


<div class="dashboard">
    <div class="dashboardboxes">
        <div class="totalsales">
            <span class="txt">Total sales </span><br><span class="txt1"><?php echo '5' ?></span>
        </div>
        <div class="totalsales">  
            <span class="txt">Total Orders </span><br><span class="txt1"><?php echo '5' ?></span>
        </div>
        <div class="totalsales">
            <span class="txt">Total sales </span><br><span class="txt1"><?php echo '5' ?></span>
        </div>
    </div>
</div>

</body>
</html>