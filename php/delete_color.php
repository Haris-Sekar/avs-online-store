<?php

$name=$_GET['name'];

if(unlink("../assets/docs/$name.txt")){
    header("location: color_grp_file.php");
}else{
    echo "err";
}

?>