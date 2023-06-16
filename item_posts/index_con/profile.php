<?php
    require('../../class/sel_class.php');
    $sel_ob = new SEL();
    
    $foldName = basename(dirname($_SERVER['PHP_SELF']));
    $mfn = explode('-',$foldName);
    $sid  = end($mfn);
    $uname = str_ireplace('-'.$sid,'',$foldName);
?>



<?php

    $sel_don = $sel_ob->sel_id_pro($sid);
    if ($sel_don) {
        $dow = $sel_don->fetch_assoc();
?>


<div id="masag-cot">
    <div class="snd-inner-masag-ct">
        <div class="msg">  
            <div id = "pre-inner-masag-cot-back">
                <div class="inner-masag-cot-back" title="back to page">
                    <img src="../../images/arro.svg" width="30" class="sec-img">
                    <img src="../../images/arro-fill.svg" width="30" class="fir-img">
                </div>
            </div>

            <?php if ($dow['des'] == '0') { ?>
                <div style="font-weight:bold;">No Seller detail Provided</div>
            <?php }else{ ?>
                <div style="font-weight:bold;"><?php echo $dow['des']; ?></div>
            <?php } ?>
            
        </div>
    </div>

</div>



<div class='snd-aicp'>
    <!-- contact and profile details about the sales person  -->
    <a href="../../item_posts/<?php echo $foldName; ?>">
        <div class='profile-snd-aicp' >
            <!-- profile of the sales person will be shown here -->
            
            <?php
                
                $let = explode('/',$dow['date']);
                $dlet = $let[0];
                $mlet = $let[1];
                $ylet = $let[2];
                if ($dow['img'] == "0") {
            ?>

                <div class="prof-det-img">
                    <img src="../../images/user.svg">
                </div>
            <?php  }else { ?>

                <div class="prof-det-img">
                    <img src="../../pics/profile/<?php echo  $dow['img']; ?>" >
                </div>
            <?php } ?>
            
            <div class="prof-det-content">

                <span><?php  echo $dow['fullname'];?></span>
                <span id="prof-time-length"><?php require("../time_length.php"); ?></span>

            </div>
        </div>
    </a>

    <div class='btn-snd-aicp'>
        <button id="show-con">SHOW CONTACT</button>
        <button id="hide-con"><?php echo $dow['pnumber']; ?></button>

    </div>
    
</div>

<div class='thd-aicp'>
    <!-- feedback link -->
    <?php require('../feedback/index.php'); ?>
</div>

<?php 
    $sel_eon = $sel_ob->sel_all_item($sid);
    if ($sel_eon) { $bbin =  mysqli_num_rows($sel_eon);
?>

    <div class="fst-inner-fst-pp">  
        <div>Adverts <span id="blue"><?php echo $bbin;  ?></span></div>
        <div id="abt-sel">About Seller</div>
    </div>
    
<?php } ?>

<div class="snd-inner-fst-pp">
    
    <!-- container for selecting ad to view  -->
    <div class="cat-ifm">
        <?php echo '<a href=""><p id="blue">'.'All Categories'.'</p></a>'; ?>
        <?php
            $sel_con = $sel_ob->sel_allgrp_item($sid);
            if ($sel_con) {
                while ($row = $sel_con->fetch_assoc()) {
                $selt = $sel_ob->sel_catnameidgp($sid,$row['group_in_cat']);

                echo '<a href=../index_con/cat_prod?id='.$sid.'&group='.$row['group_in_cat'].'><p>';
                echo str_replace('-',' ',$row['group_in_cat']).' | ';
                if(mysqli_num_rows($selt) == 1){
                    echo  mysqli_num_rows($selt).' ad';
                }else {
                    echo  mysqli_num_rows($selt).' ads';
                } 
                echo '</p></a>';
                }
            }
        ?>
    </div>
    
</div>

<?php  }  ?>