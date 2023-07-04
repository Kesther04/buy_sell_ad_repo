<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $item_id = $_POST['id'];
        $sid = $_SESSION['id'];
        $sname = $_SESSION['name'];

        require("../class/del_class.php");

        $del_ob = new DEL();

        $del_con = $del_ob->del_save($item_id,$sid);
        if ($del_con) {
            echo "deleted";
        }else {
            echo "not deleted";
        }
    }
    




?>