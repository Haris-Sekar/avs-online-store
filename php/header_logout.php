<?php


include('conn.php');
session_start();
if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: login.php');
}
$email = $_SESSION['email'];
// echo $email;
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/select_search.js"></script>
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
          <li><a href="./home.php">Home</a></li>
          <li><a href="./product_display.php">Products</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="./logout.php">Logout</a></li>
          <li><a href="./user_account.php">My Acount</a></li>
        </ol>
      </div>
</header>

</body>
</html>

