<?php

include('./header_logout.php');

?>
<div class="security">
    <div class="head">
        Login & Security
    </div>
    <form action="" method="post">
        <div class="name">
            Name: <input type="text" name="name" id="" value="<?php echo $user_name;?>" autocomplete="off"> <input type="submit" value="Change" name="change_name">
        </div>
        <div class="email">
            E-mail: <input type="email" name="email" id="" value="<?php echo $email;?>" autocomplete="off"> <input type="submit" value="Change" name="change_email">
        </div>
        <div class="mob">
            Mobile: <input type="number" name="mob" id="" value="<?php echo $user_phone;?>" autocomplete="off"> <input type="submit" value="Change" name="change_mob">
        </div>
        <div class="password">
            Password: <input type="password" name="pass" id="" value="<?php echo "************";?>" autocomplete="off"> <input type="submit" value="Change" name="change_password">
        </div>
    </form>
    <a href="./user_account.php"><button>Done</button></a>
</div>

<?php
if(isset($_POST['change_name'])){
    $name=$_POST['name'];
    $sql_change_name="UPDATE `customer_login_details` SET `name`='$name' WHERE id='$user_id'";
    $res_change_name=mysqli_query($conn,$sql_change_name);
    if($res_change_name){
        header("Refresh: 0");
    }
}
if(isset($_POST['change_email'])){
    $user_email=$_POST['email'];
    $sql_change_email="UPDATE `customer_login_details` SET `email`='$user_email' WHERE id='$user_id'";
    $res_change_email=mysqli_query($conn,$sql_change_email);
    if($res_change_email){
        session_destroy();
        header("Refresh: 0");
    }
}
if(isset($_POST['change_mob'])){
    $user_mob=$_POST['mob'];
    $sql_change_mob="UPDATE `customer_login_details` SET `phone`='$user_mob' WHERE id='$user_id'";
    $res_change_mob=mysqli_query($conn,$sql_change_mob);
    if($res_change_mob){
        header("Refresh: 0");
    }
}
if(isset($_POST['change_password'])){
    $user_pass=md5($_POST['email']);
    $sql_change_pass="UPDATE `customer_login_details` SET `password`='$user_pass' WHERE id='$user_id'";
    $res_change_pass=mysqli_query($conn,$sql_change_pass);
    if($res_change_pass){
        header("Refresh: 0");
    }
}


?>