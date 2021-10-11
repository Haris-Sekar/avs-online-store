<?php

include('./header_withoutlogin.php');
?>
<div class="body-login">
    <div class="container-reg">
        <p class="heading">Sign up</p>
        <form action="" method="post">
        <div class="box">
            <p>Name</p>
            <div>
                <input type="text" name="name" id="" placeholder="Enter Your name" autocomplete="off" require>
            </div>
            <p>Email</p>
            <div>
                <input type="email" name="email" id="" placeholder="Enter Your Email" autocomplete="off" require>
            </div>
            <p>Phone number</p>
            <div>
                <input type="number" name="phone" id="" placeholder="Enter Your phone number" autocomplete="off" require>
            </div>
            <p>Date of Birth</p>
            <div>
                <input type="date" name="dob" id="" placeholder="Enter Your phone number" autocomplete="off" require>
            </div>
            <p>Address</p>
            <div>
                <input type="text" name="address" id="" placeholder="Enter Your address" autocomplete="off" require>
            </div>
        </div>
        <div class="box">
            <p>Password</p>
            <div>
                <input type="password" name="password" id="pass" placeholder="Enter Your Password" require>
            </div>
        </div> 
        <div class="box">
            <p>Confirm Password</p>
            <div>
                <input type="password" name="confirm_password" id="conpass" placeholder="Enter Your Password Again" require>
            </div>
        </div> 
        <input type="submit" name="submit" id="reg" value="Register" class="loginBtn">
        <p class="text">Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>

    </div>
<?php 

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=md5($_POST['password']);
    $address=$_POST['address'];
    $dob=$_POST['dob'];
    $con_password=md5($_POST['confirm_password']);
    if($password!=$con_password){
        echo "<script>Password Doesnt match</script>";
    }
    else{
        $sql_reg="INSERT INTO customer_login_details( `name`, `email`, `phone`, `password`, `address`, `dob`) VALUES ('$name','$email','$phone','$password','$address','$dob')";
        $res_reg=mysqli_query($conn,$sql_reg);
        if(mysqli_error($conn)){
            echo mysqli_error($conn);
        }
        else{
            header('location:login.php');
        }
    }
}

?>