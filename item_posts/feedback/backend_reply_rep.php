<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $sname = str_replace('-',' ',$_POST['sname']);
        $cid = $_POST['cid'];
        $sid = $_POST['sid'];
        $reply = htmlspecialchars($_POST['com']);
        $likes = 0;
        $rr = $_POST['rid'];
        require("../../date_la_time.php");

        if (empty($sname)) {
            echo "<p style='color:red;font-weight:bold;'>please input your name</p>";
        }
        elseif (!preg_match("/^[a-zA-Z ]*$/",$sname)) {
            echo "<p style='color:red;font-weight:bold;'>please use only letters for your name</p>";
        }
        elseif (empty($reply)) {
            echo "<p style='color:red;font-weight:bold;'>Place a Reply</p>";
        }else {
            

            require('../../class/ins_class.php');
            $ins_ob = new INS();

            require('../../class/sel_class.php');
            $sel_ob = new SEL();

            require('../../class/up_class.php');
            $up_ob = new UPD();
    
            $ins_con = $ins_ob->ins_reply($cid,$sid,$sname,$reply,$likes,$rr,$date,$time);
            if ($ins_con) {    
                
                

                $sel_con = $sel_ob->sel_reply($cid);
                if ($sel_con) {
                    $mnr = mysqli_num_rows($sel_con);
                    
                    $up_con = $up_ob->upd_fd_tb($mnr,$cid);
                    if ($up_con) {
                        echo "<p style='color:blue;font-weight:bold;'>Reply Uploaded</p>";
                    }
                }

    
            }else{
                echo "<p style='color:red;font-weight:bold;'>Reply not Uploaded</p>";
            }    

           
        }


    }

?>