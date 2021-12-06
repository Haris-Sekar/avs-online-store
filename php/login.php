<?php
include_once('header_login.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body >
<div class="body-login">
    <div class="container">
        <p class="heading">Login in</p>
        <form action="" method="post">
        <div class="box">
            <p>Email or Phone</p>
            <div>
                <input type="text" name="email" id="" placeholder="Enter Your Email or Phone Number" autocomplete="off">
            </div>
        </div>
        <div class="box">
            <p>Password</p>
            <div>
                <input type="password" name="password" id="" placeholder="Enter Your Password">
            </div>
        </div> 
        <input type="submit" class="loginBtn" value="Login" name="submit">
        <p class="text">Dont have an account? <a href="register.php">Sign up</a></p>
        <p class="text"> <a href="#">Forget Password</a></p>
        </form>
    </div>
    </div>
</body>
</html>
<?php 

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    //admin verification
    $admin_sql="SELECT * FROM admin WHERE email='$email' OR mobile_number='$email'";
    $admin_res=mysqli_query($conn,$admin_sql);
    $admin_row=mysqli_fetch_array($admin_res,MYSQLI_ASSOC);
    $admin_pass=$admin_row['password'];
    $sql_login="SELECT * FROM customer_login_details WHERE email='$email' OR phone='$email'";
    $res_login=mysqli_query($conn,$sql_login);
    $row=mysqli_fetch_array($res_login,MYSQLI_ASSOC);
    $con_pass=$row['password'];
    if($password==$admin_pass){
        session_start();
        $email=$admin_row['email'];

        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['success'] = "You have logged in!";
        header("location: admin_home.php");
    }
    else if($con_pass==$password){
            session_start();
            $email=$row['email'];

            $_SESSION['email']=$email;
            $_SESSION['success'] = "You have logged in!";
            header("location: home.php");        
    }
    else{
        echo "<script>alert('Invalid Email id or Password')</script>";
    }



    
}

?>