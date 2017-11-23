<?php
if(is_array($_FILES)) {
    array_map('unlink', glob("images/*"));
    if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $sourcePath = $_FILES['userImage']['tmp_name'];
//echo $sourcePath."<br>";
        $file=$_FILES['userImage']['name'];
        /*$ext = end((explode(".", $file))); # extra () to prevent notice
        echo $ext;
        $targetPath = "images/".$_FILES['userImage']['name'];
        echo $targetPath."<br>";
echo $ext;*/
        $temp=explode(".",$file);
        $new="pig".".".end($temp);
//echo $new;

        $targetPath = "images/".$new;
        if(move_uploaded_file($sourcePath,$targetPath)) {
            ?>
            <img class="image-preview" src="<?php echo $targetPath; ?>" class="upload-preview" />
            <?php
        }
    }
}else{
    header('location:index.php');
}
?>