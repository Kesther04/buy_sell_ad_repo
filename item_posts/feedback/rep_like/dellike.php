<?php 
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $sname = str_replace('-',' ',$_POST['sname']);
        $rid = $_POST['rid'];
        $sid = $_POST['sid'];
        require("../../../date_la_time.php");
        $likes = 1;


        require('../../../class/del_class.php');
        $del_ob = new DEL();

        require('../../../class/sel_class.php');
        $sel_ob = new SEL();

        require('../../../class/up_class.php');
        $up_ob = new UPD();

        $del_con = $del_ob->del_rep_like($rid,$sid);
        if ($del_con) {
            
            $sel_con = $sel_ob->sel_rep_like($rid);
            if ($sel_con) {
                $mnr = mysqli_num_rows($sel_con);
                
                $up_con = $up_ob->upd_rep_lk_tb($mnr,$rid);
                if ($up_con) {
                    echo "<p style='color:blue;font-weight:bold;'>deleted</p>";
                }
            }
        }else {
            echo "not deleted";
        }

        
    }
   
   

?>
