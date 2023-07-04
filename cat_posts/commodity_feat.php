
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

        
        <?php require("../three_step_main_commodity.php"); ?>


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
        <?php require("../three_step_main_commodity.php"); ?>
    <?php  } }  ?>
</div>
<?php }  ?>

<?php } ?>


