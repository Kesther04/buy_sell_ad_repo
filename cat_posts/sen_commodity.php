<div class="ssc-main">
    <?php
        $sel_trend = $sel_ob->sel_namenogp($pageName);
        if ($sel_trend) {
            while ($tow = $sel_trend->fetch_assoc()) {
    
    ?>
        <?php 
            $usn = str_replace(' ','-',$tow['sel_name']); 
            $dubUSN = $usn.'-'.$tow['sel_id'];
        ?>
        <div class="ssc-main-inner">
            <!-- a trending ad -->
            
            <a href="../../item_posts/<?php echo $dubUSN.'/'.$tow['item_name']; ?>">
            <div class="ssc-main-img"> 
                <!--item img--> 
                
                <div class="inner-scc-main-img">
                    
                    
                    
                    <img src="../../pics/<?php echo $tow['img']; ?>" class="img-ismm" >
                    
                    
                    <div class="fst-other-ismm">
                        <!-- number of items -->
                        <?php  
                            $sel_tum = $sel_ob->sel_img_id($tow['id']);
                            echo mysqli_num_rows($sel_tum);
                        ?> 
                    </div>

                    

                </div>
                
                
            </div>
            </a>

           
            
            
            <a href="../../item_posts/<?php echo $dubUSN.'/'.$tow['item_name']; ?>">
            <div class="ssc-main-content">
                
                <div class="price-smc"> 
                    <!--item price--> 
                    <?php echo 'N'.number_format($tow['price'],3); ?>
                </div>

                <div class="des-smc"> 
                    <!--description--> 
                    <?php echo str_replace('-',' ',$tow['des']); ?>
                    
                </div>

                <div class="loc-smc"> 
                    <!--location--> 
                    <img src="../../images/location.svg"><?php echo str_replace('-',' ',$tow['location']); ?>
                </div>

                <div class="cond-smc">
                    <!-- condition -->
                    <?php
                        $sel_ftit = $sel_ob->sel_feat_csid($tow['id'],'condition');
                        if ($sel_ftit) {
                            $funo = $sel_ftit->fetch_assoc();

                            if (!isset($funo['feature_prop'])) {
                                echo "Stable Condition";
                            }else{
                                echo $funo['feature_prop'];
                            }
                        }

                    ?>
                </div>
            </div>
            </a>
        </div>
    <?php  } }  ?>
</div>