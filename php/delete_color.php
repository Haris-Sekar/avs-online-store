<?php

$name=$_GET['name'];
$src=$_GET['src'];
$col="/".$_GET['col']."/i";
echo $col;
if($src=='grp'){
    if(unlink("../assets/docs/$name.txt")){
    header("location: color_grp_file.php");
    }else{
        echo "err";
    }
}
else if($src=='line'){
    $filename = "../assets/docs/$name.txt";
    $file_out=file($filename);

    foreach($file_out as $key => $file_out1) {
        if(preg_match($col, $file_out1)) {
            unset($file_out[$key]);
        }
    }
    if(file_put_contents($filename,$file_out)){
        file_put_contents($filename,preg_replace('~[\r\n]+~',"\r\n",trim(file_get_contents($filename))));

        header("location: color_grp_file.php?name=$name");
    }

}


?>