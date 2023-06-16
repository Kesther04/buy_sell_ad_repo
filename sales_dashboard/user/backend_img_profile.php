<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $id = $_POST['id'];
    $img = $_FILES['image']['name'];
    $filesize = $_FILES['image']['size'];
    $filetype = $_FILES['image']['type'];
    $temp = $_FILES['image']['tmp_name'];

    require("../../class/up_class.php");

    $up_ob = new UPD();

    
    if ($filesize > 10000000000) {

        header ("location:profile?msg='File_size_is_too_large'");
        
    }
    elseif ($_FILES['image']['type']!=="image/png" AND $_FILES['image']['type']!=="image/jpg" AND $_FILES['image']['type']!=="image/jpeg" AND $_FILES['image']['type']!=="image/jfif") {
    
        header ("location:profile?msg='Invalid_File_Type'");

    }else {
        move_uploaded_file($temp, "../../pics/profile/".$_FILES['image']['name']);
        $up_con = $up_ob->upd_sel_img_tb($img,$id);
        if ($up_con) {
            header ("location:profile");
        }else {
            header ("location:profile?msg='Not Updated'");
        }
    }
}
    

?>