<?php
    require('../../class/sel_class.php');
    $sel_ob = new SEL();
    
    $sid = $_GET['id'];
    $group = $_GET['group'];
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

            <div style="font-weight:bold;"><?php echo $dow['des']; ?></div>
        </div>
    </div>

</div>

<div class='snd-aicp'>
    <!-- contact and profile details about the sales person  -->
    <?php
        $dfull = str_replace(' ','-',$dow['fullname']);
        $dfold = $dfull.'-'.$dow['id'];
    ?>
    <a href="../../item_posts/<?php echo $dfold; ?>">
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
        <?php  
            $dfnm = str_replace(' ','-',$dow['fullname']);
            $fold = $dfnm.'-'.$sid;
        ?>
        <?php echo '<a href="../../item_posts/'.$fold.'/"><p>'.'All Categories'.'</p></a>'; ?>
        <?php
            $sel_con = $sel_ob->sel_allgrp_item($sid);
            if ($sel_con) {
                while ($row = $sel_con->fetch_assoc()) {
                    $selt = $sel_ob->sel_catnameidgp($sid,$row['group_in_cat']);
                    if ($row['group_in_cat'] == $group ) {

                        echo '<a href=../index_con/cat_prod?id='.$sid.'&group='.$row['group_in_cat'].'><p id="blue">';
                        echo str_replace('-',' ',$row['group_in_cat']).' | ';
                        if(mysqli_num_rows($selt) == 1){
                        echo  mysqli_num_rows($selt).' ad';
                        }else {
                        echo  mysqli_num_rows($selt).' ads';
                        } 
                        echo '</p></a>';
                    }else {
                        
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
            }
        ?>
    </div>
    
</div>

<div class="inner-fst-mcpc">

    <div class="price-neg">
        <h2>Price</h2>

        <div class="opt-price-neg">
        <input type="number" name="" id="min" placeholder="Min"> - <input type="number" name="" id="max" placeholder="Max">

        <input type="radio" name="sort" id="fsort">
        </div>

        <div class="def-price-neg">
        <input type="hidden" name="pn" class="pn" value="<?php echo $group; ?>" required readonly>
        <input type="hidden" name="id" class="cidn" value="<?php echo $_GET['id']; ?>" required readonly>

        <div class="inner-def-price-neg">
            <input type="radio" name="sort" id="asort" value="0|10000"><span>Under 10K</span>
        </div>
        
        <div class="inner-def-price-neg">
            <input type="radio" name="sort" id="bsort" value="10000|100000"><span>10 - 100K</span>
        </div>
        
        <div class="inner-def-price-neg">
            <input type="radio" name="sort" id="csort" value="100000|5000000"><span>100K - 5M</span>
        </div>  
        
        <div class="inner-def-price-neg">
            <input type="radio" name="sort" id="dsort" value="5000000|30000000"><span>5 - 30M</span>
        </div>
        
        <div class="inner-def-price-neg">
            <input type="radio" name="sort" id="esort" value="30000000"><span>Above 30M</span>
        </div>
        
        </div>
    </div>
</div>

<form  class="dis-feat" action="commodity_feat.php" method="post">
<?php
    $sel_cat = $sel_ob->cat_tbin_cat($group);
    if ($sel_cat) {
    while ($scow = $sel_cat->fetch_assoc()) {
?>
    <?php  if ($scow['feature_prop'] == "***") { ?>
    <?php echo ""; ?>
    <?php }else{ ?>
    <div class="inner-fst-mcpc">
        
        <div class="feat-sel">
        <?php 
            echo '<h2>'.$scow['feature_name'].'</h2>'; 
        ?>

        <div class="inner-feat-sel">
            
            <input type="hidden" name="pn" class="pn" value="<?php echo $group; ?>" required readonly>
            <input type="hidden" name="id" class="cidn" value="<?php echo $_GET['id']; ?>" required readonly>
            <?php
                $prock = $scow['feature_prop'];
                $kes = explode("_",$prock);
            
                foreach ($kes as $key => $value) {

                if ($value == "YEAR89-CU") {
                    $yr = date("Y");
                    for ($i=1989; $i <= $yr; $i++) { 
                    echo 
                    '<div class="main-inner-feat-sel">
                        <input type="checkbox" name="sort[]" value="'.$i.'|'.$scow['feature_name'].'|'.$scow['id'].'*'.'">'.
                        $i.
                        '</div>';
                    }
                    
                }
                elseif($value == "NUM1-INF"){

                    for ($a=2; $a <= 10; $a++) { 
                    echo 
                    '<div class="main-inner-feat-sel">
                        <input type="checkbox" name="sort[]" value="'.$a.'|'.$scow['feature_name'].'|'.$scow['id'].'*'.'">'.
                        $a.
                        '</div>';
                    }
                    
                }else {
                    echo 
                    '<div class="main-inner-feat-sel">
                        <input type="checkbox" name="sort[]" value="'.$value.'|'.$scow['feature_name'].'|'.$scow['id'].'*'.'">'.
                        $value.
                    '</div>';
                }
                }
            ?>

            
        </div>

        
        </div>
    </div>
    <?php } ?>
<?php }} ?>

</form>

<?php  }  ?>