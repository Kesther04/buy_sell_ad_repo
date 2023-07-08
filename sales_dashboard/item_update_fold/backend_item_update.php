<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $iname = str_replace(' ','-',$_POST['iname']);
    $igroup = str_replace(' ','-',$_POST['igroup']);
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $fn = $_POST['fn'];
    $fp = $_POST['fp'];
    $fpr = $_POST['fpr'];
    require("../../date_la_time.php");
    $price = $_POST['iprice'];
    $desc = $_POST['des'];
    
   
    require("../../class/up_class.php");

    $up_ob = new UPD();

    require("../../class/sel_class.php");

    $sel_ob = new SEL();

    require("../../class/del_class.php");

    $del_ob = new DEL();

    require("../../class/ins_class.php");

    $ins_ob = new INS();

    if ($price == " " OR empty($price)) {
        echo "Fill in the field for price";
    }
    elseif ($desc == " " OR empty($desc)) {
        echo "Fill in the field for description";
    }
    elseif($img = $_FILES['img']['name']){

        $up_nec = $up_ob->upd_item_tb($price,$desc,$id);
        if ($up_nec) {
           

            $filetype = $_FILES['img']['type'];
            $filesize = $_FILES['img']['size'];
    
            //file upload configuration
            $targetDir = "../../pics/";
            $allowTypes = array('jpg','png','jpeg','jfif');
    
            $fileNames = array_filter($img);
    
            

            $insSuccess = $sizeError = "";
            foreach ($img as $key => $value) {
        
                    
                if ($filesize[$key] > 100000000) {
    
                    $sizeError = "<p>FILESIZES ARE TOO LARGE </p>"; 
    
                }else {
                    
                    // File upload path
                    $fileName = basename($img[$key]);
                    $targetFilePath = $targetDir.$fileName;


                    //check whether file type is valid
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                    if (in_array($fileType,$allowTypes)) {
                        
                        //upload file to server
                        if (move_uploaded_file($_FILES['img']["tmp_name"][$key],$targetFilePath)){
                            
                            //Image db insert sql 
                            $insval = "('".$fileName."',NOW()),";
                        }
                    }

                    if (!empty($insval)) {
                        $insval = trim($insval,',');

                        //insert image file name into database
                        
                        // header ("location:item_feature?group=$group&name=$nt&id=$uid");
                        $up_con = $up_ob->up_itm_img($img[0]);
                        if ($up_con) {
                            
                            $ins_img_con = $ins_ob->ins_img_item($id,$fileName,$filesize[$key],$fileType,$date,$time);
                            if ($ins_img_con) {
                                $insSuccess = "<p>IMAGES UPDATED SUCCESSFULLY</p>";

                                $selup = $sel_ob->sel_img_id($id);
                                if ($selup) {
                                    while($row = $selup->fetch_assoc()){
                                        $timen = $row['time'];
                                        if ($row['time']!==$time) {
                                            $del_con = $del_ob->del_img($id,$timen);
                                        }
                                    }
                                }
                            }
                        }
                        
                        
                    }
    
                    
                        
                }
    
     
    
            }
           
            echo $sizeError;
            echo $insSuccess;
            echo "<p>Item Details Updated Successfully";
            // header ("location:item_feature?group=$igroup&name=$iname&id=$uid");
        }else {
            echo "<p>Item Details Not Updated</p>";
        }
    
       

    }else {

        $up_nec = $up_ob->upd_item_tb($price,$desc,$id);
        if ($up_nec) {
            echo "<p>Item Details Updated Successfully</p>";
            // header ("location:item_feature?group=$igroup&name=$iname&id=$uid");
        }else {
            echo "<p>Item Details Not Updated</p>";
        }
    }

    $up_dis = "";
    foreach ($fpr as $key => $value) {
        if ($value == "nil") {
            $up_feat = $up_ob->upd_feat_tb($fp[$key],$fn[$key],$id);
            if ($up_feat) {
                $up_dis = "<p>Features Updated Successfully</p>";
            }
        }else {
            
            $up_feat = $up_ob->upd_feat_tb($value,$fn[$key],$id);
            if ($up_feat) {
                $up_dis = "<p>Features Updated Successfully</p>";
            }
        }
    }
    
    echo $up_dis;
}

?>