<?php
if (is_array($_FILES)) {
    array_map('unlink', glob("images/*"));
    
	if (is_uploaded_file($_FILES['dropImage']['tmp_name'])) {
        $sourcePath = $_FILES['dropImage']['tmp_name'];
        $file=$_FILES['dropImage']['name'];
        $temp=explode(".",$file);
        $new="pig".".".end($temp);
        $targetPath = "images/" . $new;
        if (move_uploaded_file($sourcePath, $targetPath)) {
            print $targetPath;
        }
    }
}
?>