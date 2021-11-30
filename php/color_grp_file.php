<?php 

include ('./header_admin_withlogin.php');

$dir="../assets/docs";
$myfiles = array_diff(scandir($dir), array('.', '..')); 


if(isset($_POST['add_col'])) {
    if(!in_array($_POST['new'],$myfiles)){
         $fname=$_POST['new'];
    $file=fopen("../assets/docs/$fname.txt",'a');
    header("Refresh: 0");
    }
   else{
     echo "<script>alert('File Already exits')</script>";
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
            <li><?php print_r( pathinfo( $myfiles[$i], PATHINFO_FILENAME)) ;?> <a href="./delete_color.php?name=<?php print_r( pathinfo( $myfiles[$i], PATHINFO_FILENAME));?>&src=grp"><img src="../assets/images/delete.png" alt="">  </a>   <a href="./color_grp_file.php?name=<?php print_r( pathinfo( $myfiles[$i], PATHINFO_FILENAME));?>"><img src="../assets/images/edit.png" alt=""></a>  </li><hr>
            <?php } }
            else{
                ?>
                    <div id="empty">Feels like nothing in there, <br>Create one!</div>
                <?php
            }
            if(isset($_POST['add_coll'])){
                $name=$_GET['name'];

                $nameq=$_POST['col_name'];
                $col=ltrim($_POST['colr'], '#');
                $filename = "../assets/docs/$name.txt";
                $data="\n".$col."-".$nameq;
                $fp = fopen($filename, 'a');
                if(fwrite($fp,$data)){
                    file_put_contents($filename,preg_replace('~[\r\n]+~',"\r\n",trim(file_get_contents($filename))));
                    header("refresh:0");
                }else{
                    echo "Err";
                }
            }
            ?>
        </ul>
    </div>
    

            
        <?php 
               
        if(isset($_GET['name'])){
            ?>
            <div class="files_dispaly">
            <div class="addcolor">
                <form action="" method="POST">
                    <div class="center">
                        <input type="text" name="col_name" placeholder="Color Code/Name" id="" value="" required><br>
                        <input type="color" name="colr" id="" value="#00b4d8">
                    </div>
                    <input type="submit" value="Add Color" name="add_coll">
                </form>
            </div>
<?php
            $name=$_GET['name'];
            $filename = "../assets/docs/$name.txt";
            $fp = fopen($filename, "r");
            $content = fread($fp, filesize($filename));
            $lines = explode("\n", $content);
            fclose($fp);
            
            
            
            
            ?>
            <div class="colors">
            <?php for ($i=0; $i < count($lines); $i++) { $temp=explode("-",$lines[$i]);?>

                <div style="padding: 10px;"><div class="color_con" style="background-color: #<?php echo $temp[0];?>"><p class="col_name"><?php echo $temp[1];?></div></div><a href="./delete_color.php?name=<?php echo $name; ?>&src=line&col=<?php echo $lines[$i];?>"> <img src="../assets/images/delete_icon.png" alt=""></a>
                <?php }?>

            </div>

        <?php }?>

    </div>
   
</div>
