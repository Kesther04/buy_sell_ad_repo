<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $item_id = $_POST['id'];
        $sid = $_SESSION['id'];
        $sname = $_SESSION['name'];
        require("../date_la_time.php");

        require("../class/ins_class.php");

        $ins_ob = new INS();

        $ins_con = $ins_ob->ins_save($sid,$item_id,$sname,$date,$time);
        if ($ins_con) {
            echo "saved";
        }else {
            echo "not saved";
        }
    }




?>