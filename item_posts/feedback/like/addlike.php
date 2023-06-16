<?php 
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $sname = str_replace('-',' ',$_POST['sname']);
        $cid = $_POST['cid'];
        $sid = $_POST['sid'];
        require("../../../date_la_time.php");
        $likes = 1;


        require('../../../class/ins_class.php');
        $ins_ob = new INS();

        require('../../../class/sel_class.php');
        $sel_ob = new SEL();

        require('../../../class/up_class.php');
        $up_ob = new UPD();

        $ins_con = $ins_ob->ins_like($cid,$sid,$sname,$likes,$date,$time);
        if ($ins_con) {
            
            $sel_con = $sel_ob->sel_like($cid);
            if ($sel_con) {
                $mnr = mysqli_num_rows($sel_con);
                
                $up_con = $up_ob->upd_lk_tb($mnr,$cid);
                if ($up_con) {
                    echo "<p style='color:blue;font-weight:bold;'>inserted</p>";
                }
            }
        }else {
            echo "not inserted";
        }

        
    }
   
   

?>
