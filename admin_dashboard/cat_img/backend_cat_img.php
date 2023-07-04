<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $icat = str_replace(' ','-',$_POST['icat']);
    $imcat = str_replace(' ','-',$_POST['micat']);
    

    require("../../class/up_class.php");

    $up_ob = new UPD();

    if (empty($_FILES['imgic']['name']) AND empty($_FILES['imggic']['name'])) {
        //if images for the categories are not uploaded
        $ic_img = $_POST['ano_imgic'];
        $gic_img = $_POST['ano_imggic'];

        if ($ic_img == '0' AND $gic_img == '0') {
            //if both images are equal to zero
            echo 'Upload Images';
        }
        elseif ($ic_img == '0') {
            //if only the item category image is equal to zero
            echo 'Upload Image for the item category';
        }
        elseif ($gic_img == '0') {
            //if only the main item category image is equal to zero 
            echo 'Upload Image for the Main item category'; 
        }else {
            //if none is equal to zero
            //move_uploaded_file($tempIc, "../../pack_image/".$ic_img);
            $up_con = $up_ob->upd_sel_img_cat_main_tb($ic_img,$icat);
            if ($up_con) {
                //move_uploaded_file($tempGic, "../../pack_image/".$gic_img);
                $up_don = $up_ob->upd_sel_img_cat_tb($gic_img,$imcat);
                if ($up_don) {
                    echo "All Images updated";
                }else {
                    echo "item Category image not updated";
                }
               
            }else {
                echo "Images not updated";
            }
        }
    }
    elseif (empty($_FILES['imgic']['name']) AND !empty($_FILES['imggic']['name'])) {
        $ic_img = $_POST['ano_imgic'];
        $gic_img = $_FILES['imggic']['name'];
        $filesizeGic = $_FILES['imggic']['size'];
        $filetypeGic = $_FILES['imggic']['type'];
        $tempGic = $_FILES['imggic']['tmp_name'];

        if ($ic_img == '0') {
            //if only the item category image is equal to zero
            echo 'Upload Image for the item category';
        }else {
            //if not equal to zero
            if ($filesizeGic > 10000000000) {

                echo 'File size is too large';
                
            }
            elseif ($filetypeGic!=="image/png" AND $filetypeGic!=="image/jpg" AND $filetypeGic!=="image/jpeg" AND $filetypeGic!=="image/jfif") {
            
                echo 'Invalid File Type';
        
            }else {
                move_uploaded_file($tempGic, "../../pack_image/".$gic_img);
                $up_con = $up_ob->upd_sel_img_cat_tb($gic_img,$imcat);
                if ($up_con) {
                    echo "Images updated";
                }else {
                    echo "Images not updated";
                }
            }
        }
        
    }
    elseif (!empty($_FILES['imgic']['name']) AND empty($_FILES['imggic']['name'])) {
        $ic_img = $_FILES['imgic']['name'];
        $filesizeIc = $_FILES['imgic']['size'];
        $filetypeIc = $_FILES['imgic']['type'];
        $tempIc = $_FILES['imgic']['tmp_name'];
        $gic_img = $_POST['ano_imggic'];

        if ($gic_img == '0') {
            //if only the item category image is equal to zero
            echo 'Upload Image for the Main item category';
        }else {
            //if not equal to zero
            if ($filesizeIc > 10000000000) {

                echo 'File size is too large';
                
            }
            elseif ($filetypeIc!=="image/png" AND $filetypeIc!=="image/jpg" AND $filetypeIc!=="image/jpeg" AND $filetypeIc!=="image/jfif") {
            
                echo 'Invalid File Type';
        
            }else {
                move_uploaded_file($tempIc, "../../pack_image/".$ic_img);
                $up_con = $up_ob->upd_sel_img_cat_main_tb($ic_img,$icat);
                if ($up_con) {
                    echo "Images updated";
                }else {
                    echo "Images not updated";
                }
            }
        }
    }else {
        $ic_img = $_FILES['imgic']['name'];
        $filesizeIc = $_FILES['imgic']['size'];
        $filetypeIc = $_FILES['imgic']['type'];
        $tempIc = $_FILES['imgic']['tmp_name'];

        $gic_img = $_FILES['imggic']['name'];
        $filesizeGic = $_FILES['imggic']['size'];
        $filetypeGic = $_FILES['imggic']['type'];
        $tempGic = $_FILES['imggic']['tmp_name'];

        if ($filesizeIc > 10000000000) {

            echo 'File size of  Item Category is too large';
            
        }
        elseif ($filesizeGic > 10000000000) {

            echo 'File size of Main Item Category is too large';
            
        }
        elseif ($filesizeGic > 10000000000 AND $filesizeIc > 10000000000) {

            echo 'File sizes are too large';
            
        }
        elseif ($filetypeIc!=="image/png" AND $filetypeIc!=="image/jpg" AND $filetypeIc!=="image/jpeg" AND $filetypeIc!=="image/jfif") {
        
            echo 'Invalid File Type for  item category';
    
        }
        elseif ($filetypeGic!=="image/png" AND $filetypeGic!=="image/jpg" AND $filetypeGic!=="image/jpeg" AND $filetypeGic!=="image/jfif") {
        
            echo 'Invalid File Type for Main item category';
    
        }
        elseif ($filetypeIc!=="image/png" AND $filetypeIc!=="image/jpg" AND $filetypeIc!=="image/jpeg" AND $filetypeIc!=="image/jfif" AND $filetypeGic!=="image/png" AND $filetypeGic!=="image/jpg" AND $filetypeGic!=="image/jpeg" AND $filetypeGic!=="image/jfif") {
        
            echo 'Invalid File Types';
    
        }else {
            move_uploaded_file($tempIc, "../../pack_image/".$ic_img);
            $up_con = $up_ob->upd_sel_img_cat_main_tb($ic_img,$icat);
            if ($up_con) {
                move_uploaded_file($tempGic, "../../pack_image/".$gic_img);
                $up_don = $up_ob->upd_sel_img_cat_tb($gic_img,$imcat);
                if ($up_don) {
                    echo "All Images updated";
                }else {
                    echo "item Category image not updated";
                }
               
            }else {
                echo "Images not updated";
            }
        }
        
       
    }
        
}

?>