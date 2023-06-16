<?php
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $id = $_POST['id'];


        require("../../class/del_class.php");

        $del_ob = new DEL();




        $del_con = $del_ob->del_item($id);
        if ($del_con) {
            $del_don = $del_ob->del_item_img($id);
            if ($del_don) {
                $del_eon = $del_ob->del_item_feat($id);
                if ($del_eon) {
                    header("location:../item_upload/item_upload.php");   
                }
            }
        }else {
            header("location:../item_upload/item_upload.php?msg='item not deleted'");
        }
    }

?>