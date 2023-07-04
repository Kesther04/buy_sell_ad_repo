
<?php 
session_start();  
if (isset($_GET['items']) AND isset($_GET['pn']) AND isset($_GET['id'])) {  ?>
<div class="ssc-main">
    <?php
        $id = $_GET['id'];
        $pageName = $_GET['pn'];  
        require('../../class/sel_class.php');
        $sel_ob = new SEL();
    ?>
    <?php 
        if ($_GET['items'] == "30000000") { 
            
            $sel_tran = $sel_ob->sel_amt_large_main_id($_GET['items'],$pageName,$id);
            if ($sel_tran) {
                if ( mysqli_num_rows($sel_tran) == 0) {
                    echo "No Results Found";
                }else {
                while ($tow = $sel_tran->fetch_assoc()) {
    ?>
        <?php require("../../two_step_main_commodity.php"); ?>
    <?php  } } } ?> 
    <?php }else {  ?>
    <?php
        $mlam = explode('|',$_GET['items']);
        $lam = $mlam[0];
        $ham = $mlam[1];
        $sel_tran = $sel_ob->sel_amt_sort_main_id($lam,$ham,$pageName,$id);
        if ($sel_tran) {
            if ( mysqli_num_rows($sel_tran) == 0) {
                echo "No Results Found";
            }else {
                
            
            while ($tow = $sel_tran->fetch_assoc()) {
    ?>
        <?php require("../../two_step_main_commodity.php"); ?>
    <?php  } } }  ?>
</div>
<?php  } ?>
<?php } ?>