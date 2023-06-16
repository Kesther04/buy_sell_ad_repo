<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $date = date("d-m-y");
    $hr = date("h")+1;
    $time = date("$hr:i:s.a");


    require("../../class/ins_class.php");

    $ins_ob = new INS();

   
    if (isset($_POST['uid'])) {
        //file upload configuration
        $targetDir = "../../pics/";
        $allowTypes = array('jpg','png','jpeg','jfif');

        // $statusMsg = $errorMsg = $insval = $errorUpload = $errorUploadType = '';

        $fileNames = array_filter($_FILES['img']['name']);
        if (!empty($fileNames)) {
            foreach ($_FILES['img']['name'] as $key => $value) {
                // File upload path
                 $fileName = basename($_FILES['img']['name'][$key]);
                
                
                $targetFilePath = $targetDir.$fileName;

                //check whether file type is valid
                 $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                if (in_array($fileType,$allowTypes)) {
                    //upload file to server

                    if (move_uploaded_file($_FILES['img']["tmp_name"][$key],$targetFilePath)) {
                        //Image db insert sql 
                        $insval = "('".$fileName."',NOW()),";

                    }else {
                        $errorUpload = $_FILES['img']['name'][$key].' | ';
                    }
                    
                }
                

                if (!empty($insval)) {
                    $insval = trim($insval,',');

                    //insert image file name into database

                    $item_id = 1;
                    $ins_img_con = $ins_ob->ins_img_item($item_id,$fileName,0,$fileType,$date,$time);
                    if ($ins_img_con) {
                         "Files are uploaded successfully";
                    }else {
                         "Sorry there was an error uploading your file";
                    }
                    
                }
            }

        }
    }
}

?>