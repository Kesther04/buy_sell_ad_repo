<?php 

    $sess = $_SESSION['USER'];
    $date = date("d-m-Y");
    $hr = date("h")+1;
    $time = date("$hr:i:s.a");
    $views = 1;


    require('../../class/ins_class.php');
    $ins_ob = new INS();

    $sel_con = $sel_ob->sel_item_tb($pana,$sid);
    if ($sel_con) {
        $sow = $sel_con->fetch_assoc();
        $item_id = $sow['id'];


        $sel_vi = $sel_ob->sel_vw_tb($item_id);
            
        

        $sel_view = $sel_ob->sel_view_sess_tb($item_id,$_SESSION['id']);
        if ($sel_view->num_rows>=0) {
            $cwow = $sel_view->fetch_assoc();
            
            if (!isset($cwow['user_id'])) {
                $ins_con = $ins_ob->ins_view($item_id,$pana,$sess,$_SESSION['id'],$views,$date,$time);
                if ($ins_con) {
                    $sel_view_table = $sel_ob->sel_vw_tb($item_id);
                    if ($sel_view_table) {
                        if (mysqli_num_rows($sel_view_table) == 1) {
                            echo mysqli_num_rows($sel_view_table).' view';    
                        }else {
                            echo mysqli_num_rows($sel_view_table).' views';
                        }
                    }
                }

            }
            elseif(mysqli_num_rows($sel_vi) >= '1000'){
    
                $ken = mysqli_num_rows($sel_vi);
                $sken = str_replace('000','',$ken);
                echo $sken.'K views';
                
            }
            elseif(mysqli_num_rows($sel_vi) >= '1000000'){
    
                $ken = mysqli_num_rows($sel_vi);
                $sken = str_replace('000000','',$ken);
                echo $sken[$i].'M views';
                
            }
            elseif(mysqli_num_rows($sel_vi) >= '1000000000'){
    
                $ken = mysqli_num_rows($sel_vi);
                $sken = str_replace('000000000','',$ken);
                echo $sken[$i].'B views';
                
            }else{
                $sel_view_table = $sel_ob->sel_vw_tb($item_id);
                if ($sel_view_table) {
                    if (mysqli_num_rows($sel_view_table) == 1) {
                        echo mysqli_num_rows($sel_view_table).' view';    
                    }else {
                        echo mysqli_num_rows($sel_view_table).' views';
                    }
                    
                }
            }
            
        }
    }
    
   


?>