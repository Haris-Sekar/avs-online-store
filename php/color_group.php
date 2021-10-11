<?php
include('./header_admin_withlogin.php');

?>
<form action="" method="post">
    <input type="color" name="color" id="">
    <input type="submit" value="Add" name="submit">
</form>
<?php
    if(isset($_POST['submit'])){
        $color_temp=$_POST['color'];
        echo $color_temp;
        $color=array();
        array_push($color,$color_temp);
        print_r($color);


    }
?>