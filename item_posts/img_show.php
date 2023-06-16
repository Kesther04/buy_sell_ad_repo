    
    <?php
        require('../../class/sel_class.php');
        $sel_ob = new SEL();
        
        $pageName = basename($_SERVER['PHP_SELF']);   
        $pana = str_replace('.php','', $pageName);
        $foldName = basename(dirname($_SERVER['PHP_SELF']));
        $mfn = explode('-',$foldName);
        
        $sid  = end($mfn);
        $uname = str_ireplace('-'.$sid,'',$foldName);
    ?>

    <?php 

        $sel_con = $sel_ob->sel_item_tb($pana,$sid);
        if ($sel_con) {
            $row = $sel_con->fetch_assoc();
                $id = $row['id'];
            

                $simg = $sel_ob->sel_img_id($id);
                if ($simg) {
                    while ($dow = $simg->fetch_assoc()) {
                        echo "<div class='swiper-slide'><img src='../../pics/".$dow['img']."' width='800'></div>";
                    }
                }
            
        }
    ?>

