<div class='feature-prod'>
    <!-- the feature of the commodity provided -->
    <?php 
        
        $sel_con = $sel_ob->sel_item_tb($pana,$sid);
        if ($sel_con) {
            $row = $sel_con->fetch_assoc();
            $id = $row['id'];
            $det = explode('/',$row['date']);
            $ddet = $det[0];
            $mdet = $det[1];
            $ydet = $det[2];
    ?>
        <div class='fst-inner-feat-prod'>
            <div class='fst-inner-fifp'>
                
                <!-- <span> status of commodity was posted Promoted</span> -->

                <span><!-- how long ago  commodity was posted -->Posted
                    <?php

                      
                        if (strstr($row['time'],'.am')) {
                            $rtime = str_replace('.am','',$row['time']);
                            $ret = explode(':',$rtime);
                            $hret = $ret[0];
                            $mret = $ret[1];
                            $sret = $ret[2];
                            $apm = '.am';
                          
                           
                            require('../active.php');
                        }else {
                            $rtime = str_replace('.pm','',$row['time']);
                            $ret = explode(':',$rtime);
                            $hret = $ret[0];
                            $mret = $ret[1];
                            $sret = $ret[2];
                            $apm = '.pm';
                            
                            require('../active.php');
                        }
                    ?>   
                </span>

                <span><!-- div to show the location of sales person --><img src="../../images/location.svg"><?php echo $row['location']; ?></span>
            </div>
            
            <div class='snd-inner-fifp'>
                <!-- views on this commodity -->
                <span class="fst-sif"><?php  require("../save.php"); ?></span>
                <span>
                    <img src="../../images/eye-fill.svg"><?php  require("../views.php"); ?>
                </span>
            </div>
        </div>
    
        <div class='snd-inner-feat-prod'>
            
            <?php
                $sel_don = $sel_ob->sel_feat_id($id);
                    if ($sel_don) {
                        while($dow = $sel_don->fetch_assoc()){       
            ?>
                
                <div class='inner-sifp'>
                    <span><?php echo $dow['feature_name']; ?></span><?php echo $dow['feature_prop'];?>
                </div>
                
                
            <?php } } ?>

        </div>

        <div class="thr-inner-feat-prod">
            <div class="inner-tifp">
                <?php  echo $row['des']; ?>
            </div>
        </div>

    <?php } ?>

</div>