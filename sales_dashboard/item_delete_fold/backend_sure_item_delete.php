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
                    echo "<script>window.location='../item_delete.php'</script>";   
                }
            }
        }else {
            echo "<script>window.location='../item_delete.php?msg=item not deleted'</script>";
        }
    }

?>