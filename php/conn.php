<?php

//clever cloud DB connect Details

// $host='b4qjlowsvqnxh584yjnm-mysql.services.clever-cloud.com:3306';
// $username='uy0caq08nnmiknzz';
// $password='jmC4ecTwJDAGnw5IsTu8';
// $database='b4qjlowsvqnxh584yjnm';

// localhost DB connect Details

$host='localhost';
$username='root';
$password='';
$database='avsenterprises';



$conn=mysqli_connect($host,$username,$password,$database);
if(mysqli_connect_error())
{   
    echo "cannot connect DB";
}
else{
    // echo "sus";
}


?>