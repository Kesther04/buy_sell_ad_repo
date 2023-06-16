<script src='../../../js/jquery.js'></script>
<script src='../../../js/ajax.js'></script>
<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        require('../class/sel_class.php');
        $sel_ob = new SEL();
        $pageName = $_POST['pn'];
        if (isset($_POST['sort'])) {
            
        
        $arr = array_filter($_POST['sort']);  
        $sort = implode($arr);
        $bort = explode('*',$sort);

       
?>

<div class="ssc-main">

    <?php
            $cort = "";
            foreach ($bort as $key => $value) {
                $cort = implode(array($value));
                $zort = explode('|',$cort);
            
            
                if (isset($zort[1]) AND isset($zort[2])) {
                    $fp = $zort[0];
                    $fnm =  $zort[1];
                    $cid =  $zort[2];
                
    ?>

        
        
        <?php
            
            $sel_tran = $sel_ob->sel_feat_cat($cid,$fnm,$fp);
            if ($sel_tran) {
                // if ( mysqli_num_rows($sel_tran) == 0) {
                //     echo "No Results Found";
                // }else {
    
                while ($row = $sel_tran->fetch_assoc()) {
                    $iid = $row['item_id'];
        ?>

        <?php
            $sel_tron = $sel_ob->sel_catnamegpou($iid,$pageName);
            if ($sel_tron) {
                while ($tow = $sel_tron->fetch_assoc()) {
        ?>

        
        <div class="ssc-main-inner">
            <!-- a trending ad -->
            
           
            
            
            <div class="ssc-main-img"> 
                <!--item img--> 
                
                <div class="inner-scc-main-img">
                    <?php 
                        $usn = str_replace(' ','-',$tow['sel_name']); 
                        $dubUSN = $usn.'-'.$tow['sel_id'];
                    ?>
                    <a href="../../../item_posts/<?php echo $dubUSN.'/'.$tow['item_name']; ?>">
                        <img src="../../../pics/<?php echo $tow['img']; ?>" class="img-ismm" >
                    </a>

                
                    <div class="fst-other-ismm">
                        <!-- number of items -->
                        <?php  
                            $sel_tum = $sel_ob->sel_img_id($tow['id']);
                            echo mysqli_num_rows($sel_tum);
                        ?> 
                    </div>

                    <div class="snd-other-ismm">
                        <!-- save product to view in your saved -->

                        <?php if (!isset($_SESSION['id'])) { ?>
                            <a href="../../../sales_auth/login/login">
                                <img src="../../../images/save.svg" title="save commodity">
                            </a>
                        <?php }else{ ?>
                        
                        <?php
                            $selSave = $sel_ob->sel_save_id($tow['id'],$_SESSION['id']);
                        ?>
                        
                        <?php if ($selSave->num_rows>0) { ?>
                            <form class="sdel" action="../../../saved/del_saved.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $tow['id']; ?>" required readonly>
                                <button><img src="../../../images/save-fill.svg" title="remove from saved"></button>
                            </form>
                            
                        <?php }else{ ?>
                            <form class="sinp" action="../../../saved/input_saved.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $tow['id']; ?>" required readonly>
                                <button><img src="../../../images/save.svg" title="save commodity"></button>
                            </form>
                            
                        <?php } ?>
                        
                        <?php } ?>
                        
                    </div>
                </div>
                
                
            </div>
            

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
                    <img src="../../../images/location.svg"><?php echo str_replace('-',' ',$tow['location']); ?>
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
        </div>


        <?php }}  ?>
            
        <?php  }  }  ?>

    


    <?php } }  ?>

</div>

<?php  }else{ ?>
<div class="ssc-main">
    <?php
        $sel_trend = $sel_ob->sel_catnamegp($pageName);
        if ($sel_trend) {
            while ($tow = $sel_trend->fetch_assoc()) {

    ?>
        <div class="ssc-main-inner">
            <!-- a trending ad -->
            
           
            
            
            <div class="ssc-main-img"> 
                <!--item img--> 
                
                <div class="inner-scc-main-img">
                    <?php 
                        $usn = str_replace(' ','-',$tow['sel_name']); 
                        $dubUSN = $usn.'-'.$tow['sel_id'];
                    ?>
                    <a href="../../../item_posts/<?php echo $dubUSN.'/'.$tow['item_name']; ?>">
                        <img src="../../../pics/<?php echo $tow['img']; ?>" class="img-ismm" >
                    </a>

                
                    <div class="fst-other-ismm">
                        <!-- number of items -->
                        <?php  
                            $sel_tum = $sel_ob->sel_img_id($tow['id']);
                            echo mysqli_num_rows($sel_tum);
                        ?> 
                    </div>

                    <div class="snd-other-ismm">
                        <!-- save product to view in your saved -->

                        <?php if (!isset($_SESSION['id'])) { ?>
                            <a href="../../../sales_auth/login/login">
                                <img src="../../../images/save.svg" title="save commodity">
                            </a>
                        <?php }else{ ?>
                        
                        <?php
                            $selSave = $sel_ob->sel_save_id($tow['id'],$_SESSION['id']);
                        ?>
                        
                        <?php if ($selSave->num_rows>0) { ?>
                            <form class="sdel" action="../../../saved/del_saved.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $tow['id']; ?>" required readonly>
                                <button><img src="../../../images/save-fill.svg" title="remove from saved"></button>
                            </form>
                            
                        <?php }else{ ?>
                            <form class="sinp" action="../../../saved/input_saved.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $tow['id']; ?>" required readonly>
                                <button><img src="../../../images/save.svg" title="save commodity"></button>
                            </form>
                            
                        <?php } ?>
                        
                        <?php } ?>
                        
                    </div>
                </div>
                
                
            </div>
            

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
                    <img src="../../../images/location.svg"><?php echo str_replace('-',' ',$tow['location']); ?>
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
        </div>
    <?php  } }  ?>
</div>
<?php }  ?>

<?php } ?>


