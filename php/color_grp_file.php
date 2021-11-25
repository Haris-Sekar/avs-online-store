<?php 

include ('./header_admin_withlogin.php');

$dir="../assets/docs";
$myfiles = array_diff(scandir($dir), array('.', '..')); 


if(isset($_GET['name'])){
    // display($_GET['name']);
}
if(isset($_POST['add_col'])) {
    if(!in_array($_POST['new'],$myfiles)){
         
        echo "<script>alert('File Already exits')</script>";

    }
   else{
    $fname=$_POST['new'];
    $file=fopen("../assets/docs/$fname.txt",'a');
    header("Refresh: 0");
}
}
?>

<div class="files">
    <div class="file_name_display" id="style-2">
        <h3>Color Groups</h3>
        <ul>
            <li>
                <form action="" method="post">
                <div> <input type="text" name="new" id="" required autocomplete="off" placeholder="New Color Group"></div>
                    <div><input type="submit" value="" name="add_col"></div>
                </form>
            </li>
            <?php
            if($myfiles){
                for($i=2;$i<count($myfiles)+2;$i++){?>
            <li><?php print_r( pathinfo( $myfiles[$i], PATHINFO_FILENAME)) ;?> <a href="./delete_color.php?name=<?php print_r( pathinfo( $myfiles[$i], PATHINFO_FILENAME));?>"><img src="../assets/images/delete.png" alt="">  </a>   <a href="./color_grp_file.php?name=<?php print_r( pathinfo( $myfiles[$i], PATHINFO_FILENAME));?>"><img src="../assets/images/edit.png" alt=""></a>  </li><hr>
            <?php } }
            else{
                ?>
                    <div id="empty">Feels like nothing in there, <br>Create one!</div>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="files_dispaly">
        <?php if(isset($_GET['name'])){
            
        }?>
    </div>
   
</div>
